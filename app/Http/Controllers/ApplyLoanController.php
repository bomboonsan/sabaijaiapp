<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use App\Models\Accounts;

use Carbon\Carbon;

class ApplyLoanController extends Controller
{
    public function index()
    {
        // Session::forget('applyloan');
        $data = Session::get('applyloan');
        if ($data) {
            return view('app.applyloan.index', ['data' => $data]);
        } else {
            return view('app.applyloan.index');
        }
    }

    public function createForm(Request $request)
    {
        $accounts = Accounts::all();
        $apply_all_id = $accounts->pluck('apply_id')->toArray();
        $apply_id_unique = rand(1000000, 9999999);
        // if apply_id_unique is not in apply_all_id
        if( in_array($apply_id_unique, $apply_all_id) ){
            $apply_id_unique = rand(1000000, 9999999);
        } else {
            $apply_id_unique = $apply_id_unique;
        }

        //

        $request->session()->put('applyloan', [
            'apply_id' => $apply_id_unique
        ]);

        return redirect()->route('loan-form1');
    }

    public function form1()
    {
        // Session::forget('form1');
        $data = Session::get('applyloan');
        if ($data) {
            return view('app.applyloan.form1', ['data' => $data]);
        } else {
            return view('app.applyloan.form1');
        }
    }
    public function form1Submit(Request $request)
    {
        // $request->session()->put('applyloan', $request->all());
        $request->session()->put('applyloan', array_merge($request->session()->get('applyloan'), $request->all()));
        return redirect()->route('loan-form2');
    }
    public function form2()
    {
        $data = Session::get('applyloan');
        Session::forget('comfirm_phone');

        if ($data) {
            return view('app.applyloan.form2', ['data' => $data]);
        } else {
            return view('app.applyloan.form2');
        }
    }

    public function formOtpemail()
    {
        $data = Session::get('applyloan');
        Session::forget('comfirm_phone');

        if ($data) {
            return view('app.applyloan.otpemail', ['data' => $data]);
        } else {
            return view('app.applyloan.otpemail');
        }
    }


    public function form2Submit(Request $request)
    {
        // merge old data applyloan with request->all()
        $request->session()->put('applyloan', array_merge($request->session()->get('applyloan'), $request->all()));

        $comfirm_phone = $request->session()->get('comfirm_phone');
        if($comfirm_phone != 'true'){
            return redirect()->route('loan-form2');
        }
        return redirect()->route('loan-form3');
    }
    public function form3()
    {
        $data = Session::get('applyloan');
        if(empty($data['first_name'])){
            return redirect()->route('loan-form1');
        }
        if ($data) {
            return view('app.applyloan.form3', ['data' => $data]);
        } else {
            return view('app.applyloan.form3');
        }
    }
    public function form3Submit(Request $request)
    {
        $dataSession = Session::get('applyloan');

        // ************************************************
        // START KYC
        // ************************************************


        // APPMAN AUTH
        $response = Http::asForm()->post('https://mac-portal.appmanteam.com/auth/realms/mac-portal/protocol/openid-connect/token', [
            'grant_type' => 'client_credentials',
            'client_id' => 'sabaijaimoney-case-keeper-service-account',
            'client_secret' => 'a063eb0d-3395-4b01-a634-9c78f6756832',
        ]);
        $resultAuth = $response->json();
        $access_token = $resultAuth['access_token'];

        // APPMAN KYC

        $kycBody = [
            "caseType" => [
                "key" => "cc",
                "code" => "00899",
                "translations" => [
                    "en" => ["label" => "Criminal Check"],
                    "th" => ["label" => "Criminal Check"],
                    "id" => ["label" => "Criminal Check"]
                ]
            ],
            "proprietors" => [
                [
                    "expiryDuration" => "P30D",
                    "notifyDuration" => "P5D",
                    "proprietorType" => "insured",
                    // "citizenId" => "1-1999-00368-344",
                    // "citizenId" => $dataSession['id_card'],
                    "citizenId" => "",
                    // "firstName" => $dataSession['first_name'],
                    "firstName" => "",
                    // "lastName" => $dataSession['last_name'],
                    "lastName" => "",
                    // "dateOfBirth" => "1993-10-30",
                    "dateOfBirth" => "",
                    "notifyType" => "sms",
                    "phoneNumber" => $dataSession['telephone'],
                    "verifications" => [
                        [
                            "expiryDuration" => "P40D",
                            "notifyType" => "email",
                            "notifyInterval" => "P40D",
                            "frontIdCardConfig" => [
                                "required" => true,
                                "attempts" => 5,
                                "threshHold" => 0.1,
                                "dependenciesRequired" => false,
                                "isEditable" => false,
                                "validations" => ["comparison"]
                            ],
                            "passportConfig" => ["required" => true, "attempts" => 3, "threshHold" => 0.9, "dependenciesRequired" => false, "isEditable" => false],
                            "backIdCardConfig" => ["required" => true, "attempts" => 5, "threshHold" => 0.9, "dependenciesRequired" => false, "isEditable" => false],
                            "idFaceRecognitionConfig" => ["required" => true, "attempts" => 5, "threshHold" => 0.9, "dependenciesRequired" => false, "livenessCount" => 1],
                            "amloConfig" => ["required" => false],
                            "dopaConfig" => ["required" => true],
                            "dipChipConfig" => ["required" => false],
                            "bankruptcyConfig" => ["required" => false],
                            "sanctionConfig" => ["required" => false],
                            "criminalCheckConfig" => ["required" => false],
                            "employmentVerificationConfig" => ["required" => false]
                        ]
                    ]
                ]
            ],
            "remark" => null,
            "attachMeetingRoom" => false
        ];

        $response = Http::withToken($access_token)->post(
            'https://mac-portal.appmanteam.com/api/v2/case-keeper/cases', $kycBody
        );
        $resultKYC = $response->json();
        $KycID = $resultKYC['proprietors'][0]['verificationRef'];
        $fullUrlKyc = 'https://sabaijaimoney.mac.appmanteam.com/apps/identity-verification/'.$KycID.'?redirect=https://sabaijaiapp.bomboonsan.com/loan/form4';
        // dd($fullUrlKyc);



        // merge old data applyloan with request->all()
        $request->session()->put('applyloan', array_merge($request->session()->get('applyloan'), $request->all()));

        // add session key kyc_id to session applyloan
        $dataSession['ref_appman'] = $KycID;
        $request->session()->put('applyloan', array_merge($request->session()->get('applyloan'), $dataSession));

        return redirect($fullUrlKyc);

        // ************************************************
        // END KYC
        // ************************************************

        // return redirect()->route('loan-form4');
    }
    public function form4()
    {
        $data = Session::get('applyloan');
        if ($data) {
            return view('app.applyloan.form4', ['data' => $data]);
        } else {
            return view('app.applyloan.form4');
        }
    }
    public function form4Submit(Request $request)
    {
        // merge old data applyloan with request->all()
        $request->session()->put('applyloan', array_merge($request->session()->get('applyloan'), $request->all()));

        return redirect()->route('loan-form5');
    }
    public function form5()
    {
        $data = Session::get('applyloan');
        if ($data) {
            return view('app.applyloan.form5', ['data' => $data]);
        } else {
            return view('app.applyloan.form5');
        }
    }
    public function form5Submit(Request $request)
    {
        // merge old data applyloan with request->all()
        $request->session()->put('applyloan', array_merge($request->session()->get('applyloan'), $request->all()));

        return redirect()->route('loan-form6');
    }
    public function form6()
    {
        $data = Session::get('applyloan');
        $nature_employment = $data['nature_employment'];
        $groupt1 = array('1', '2', '3', '4','5','6','7','16');
        $groupt2 = array('8', '9', '10', '11');
        $groupt3 = array('12');
        $groupt4 = array('13', '14', '15','17','18');
        // if ($nature_employment == '1') {
        if (in_array($nature_employment, $groupt1)) {
            return view('app.applyloan.form6-type1', ['data' => $data]);
        }
        if (in_array($nature_employment, $groupt2)) {
            return view('app.applyloan.form6-type2', ['data' => $data]);
        }
        if (in_array($nature_employment, $groupt3)) {
            return view('app.applyloan.form6-type3', ['data' => $data]);
        }
        if (in_array($nature_employment, $groupt4)) {
            return view('app.applyloan.form6-type4', ['data' => $data]);
        } else {
            return view('app.applyloan.form6-type4', ['data' => $data]);
        }


        // return view('app.applyloan.form6-type4');
    }
    public function form6Submit(Request $request)
    {
        // merge old data applyloan with request->all()
        $request->session()->put('applyloan', array_merge($request->session()->get('applyloan'), $request->all()));

        return redirect()->route('loan-form7');
    }
    public function form7()
    {
        $data = Session::get('applyloan');
        if ($data) {
            return view('app.applyloan.form7', ['data' => $data]);
        } else {
            return view('app.applyloan.form7');
        }
    }
    public function form7Submit(Request $request)
    {
        // merge old data applyloan with request->all()
        $request->session()->put('applyloan', array_merge($request->session()->get('applyloan'), $request->all()));

        return redirect()->route('loan-form8');
    }
    public function form8()
    {
        $data = Session::get('applyloan');
        if ($data) {
            return view('app.applyloan.form8', ['data' => $data]);
        } else {
            return view('app.applyloan.form8');
        }
    }
    // public function form8Submit(Request $request)
    public function form9Submit(Request $request)
    {
        // merge old data applyloan with request->all()
        $request->session()->put('applyloan', array_merge($request->session()->get('applyloan'), $request->all()));

        return redirect()->route('loan-form9');
    }
    public function form9()
    {
        $data = Session::get('applyloan');
        if ($data) {
            return view('app.applyloan.form9', ['data' => $data]);
        } else {
            return view('app.applyloan.form9');
        }
    }
    // public function form9Submit(Request $request)
    public function form8Submit(Request $request)
    {
        $dataSession = Session::get('applyloan');

        $arr_consent = array(
            "tc_1" => $dataSession['tc_1'],
            "tc_2" => $dataSession['tc_2'],
            "tc_3" => $dataSession['tc_3'],
            "tc_4" => $dataSession['tc_4'],
            "tc_5" => $dataSession['tc_5'],
        );
        $json_consent = json_encode($arr_consent);

        $arr_address = array(
            "address" => $dataSession['address'] ?? '',
            "district" => $dataSession['district'] ?? '',
            "amphoe" => $dataSession['amphoe'] ?? '',
            "province" => $dataSession['province'] ?? '',
            "zipcode" => $dataSession['zipcode'] ?? '',
        );
        $json_address = json_encode($arr_address);

        $arr_address_present = array(
            "address_present" => $dataSession['address_present'] ?? '',
            "district_present" => $dataSession['district_present'] ?? '',
            "amphoe_present" => $dataSession['amphoe_present'] ?? '',
            "province_present" => $dataSession['province_present'] ?? '',
            "zipcode_present" => $dataSession['zipcode_present'] ?? '',
        );
        $json_address_present = json_encode($arr_address_present);

        $arr_address_delivery = array(
            "address_delivery" => $dataSession['address_delivery'] ?? '',
            "district_delivery" => $dataSession['district_delivery'] ?? '',
            "amphoe_delivery" => $dataSession['amphoe_delivery'] ?? '',
            "province_delivery" => $dataSession['province_delivery'] ?? '',
            "zipcode_delivery" => $dataSession['zipcode_delivery'] ?? '',
        );
        $json_address_delivery = json_encode($arr_address_delivery);

        $arr_occupation_detail = array(
            "work_name" => $dataSession['work_name'] ?? '',
            "source_income" => $dataSession['source_income'] ?? '',
            "description_work" => $dataSession['description_work'] ?? '',
            "year_work" => $dataSession['year_work'] ?? '',
            "month_work" => $dataSession['month_work'] ?? '',
            "work_tel" => $dataSession['work_tel'] ?? '',
            "salary_date" => $dataSession['salary_date'] ?? '',
            "pay_date" => $dataSession['pay_date'] ?? '',
            "district_work" => $dataSession['district_work'] ?? '',
            "amphoe_work" => $dataSession['amphoe_work'] ?? '',
            "province_work" => $dataSession['province_work'] ?? '',
            "zipcode_work" => $dataSession['zipcode_work'] ?? '',
        );
        $json_occupation_detail = json_encode($arr_occupation_detail);

        $arr_documents = array(
            "latest_payslip" => $dataSession['latest_payslip'] ?? '',
            "salary_statement" => $dataSession['salary_statement'] ?? '',
            "transcript" => $dataSession['transcript'] ?? '',
        );
        $json_documents = json_encode($arr_documents);

        $data = [
            'apply_id' => $dataSession['apply_id'],
            'gender' => $dataSession['gender'],
            'first_name' => $dataSession['first_name'],
            'last_name' => $dataSession['last_name'],
            'id_card' => $dataSession['id_card'],
            'education_level' => $dataSession['education_level'] ?? '',
            'education_lavel_year' => $dataSession['education_lavel_year']  ?? '',
            'education_sublevel' => $dataSession['education_sublevel'] ?? '',
            'education_year' => $dataSession['education_year'] ?? '',
            'faculty' => $dataSession['faculty'] ?? '',
            'university' => $dataSession['university'] ?? '',
            'amount' => $dataSession['amount'] ?? '',
            'telephone' => $dataSession['telephone'] ?? '',
            'telOtp' => $dataSession['tel-otp'] ?? '',
            'email' => $dataSession['email'] ?? '',
            'email-otp' => $dataSession['email-otp'] ?? '',
            'consent' => $json_consent ?? '',
            'consent_time' => Carbon::now()->format('Y-m-d H:i:s'),
            'address' => $json_address ?? '',
            'address_present' => $json_address_present ?? '',
            'address_delivery' => $json_address_delivery ?? '',
            'accommodation_type' => $dataSession['accommodation_type'] ?? '',
            'residence_status' => $dataSession['residence_status'] ?? '',
            'main_occupation' => $dataSession['main_occupation'] ?? '',
            'nature_employment' => $dataSession['nature_employment'] ?? '',
            'type_business' => $dataSession['type_business'] ?? '',
            'main_income_per_month' => $dataSession['main_income_per_month'] ?? '',
            'additional_career' => $dataSession['additional_career'] ?? '',
            'additional_career_income_per_month' => $dataSession['additional_career_income_per_month'] ?? '',
            'number_institutions' => $dataSession['number_institutions'] ?? '',
            'debt_burden_per_month' => $dataSession['debt_burden_per_month'] ?? '',
            'marital_status' => $dataSession['marital_status'] ?? '',
            'person_under_patronage' => $dataSession['person_under_patronage'] ?? '',
            'occupation_detail' => $json_occupation_detail ?? '',
            'reference_name' => $dataSession['reference_name'] ?? '',
            'reference_type' => $dataSession['reference_type'] ?? '',
            'reference_tel' => $dataSession['reference_tel'] ?? '',
            'documents' => $json_documents ?? '',
        ];


        $apply_exit = Accounts::where('apply_id', $data['apply_id'])->first();

        // dd($data);

        if ($apply_exit) {
            Accounts::where('apply_id', $data['apply_id'])->update($data);
        } else {
            Accounts::create($data);
        }



        return redirect()->route('loan-success');
    }
    public function success()
    {
        $data = Session::get('applyloan');
        if ($data) {
            return view('app.applyloan.success', ['data' => $data]);
        }
        return view('app.applyloan.success');
    }
}
