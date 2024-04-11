<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Mail;
use App\Mail\Otpmail;
use App\Mail\OtpEmail;

class OtpController extends Controller
{
    public function sendOTP(Request $request)
    {

        $data = Session::get('applyloan');
        $customer_name = $data['first_name'] . ' ' . $data['last_name'];

        $telephone = $request->input('telephone');

        // สุ่มค่า OTP
        $otp = mt_rand(100000, 999999);

        // เก็บค่า OTP ใน Session
        $request->session()->put('phone_otp', $otp);

        $request->session()->put('applyloan', array_merge($request->session()->get('applyloan'), $request->all()));

        // // ส่ง OTP ไปยังหมายเลขโทรศัพท์ที่ระบุ

        $data = [
            "sender" => "SBJ Money",
            "msisdn" => [$telephone],
            "message" => 'รหัส (OTP) สำหรับใช้บริการกับบริษัท สบายใจมันนี่ จำกัด คือ ' . $otp, // นำค่า OTP ที่สุ่มได้มาใช้
        ];

        $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC90aHNtcy5jb21cL2xvZ2luIiwiaWF0IjoxNjgxOTgwNDAxLCJuYmYiOjE2ODE5ODA0MDEsImp0aSI6Im9QWHA3aThuQjNsYjdGSksiLCJzdWIiOjEwOTQ5NywicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.JAXGQnqq8QOZDwQZ5rU8a72X7980B73e7CrEvFAiGEU')->post(
            'https://thsms.com/api/send-sms', $data
        );



        return $response->json();
    }

    public function verifyOTP(Request $request)
    {
        $userOTP = $request->input('phone_otp');

        // ดึงค่า OTP ที่เก็บไว้ใน Session
        $sessionOTP = $request->session()->get('phone_otp');

        if ($userOTP == $sessionOTP) {
            // OTP ถูกต้อง
            // ทำสิ่งที่คุณต้องการ เช่น ลงทะเบียนผู้ใช้หรือเข้าสู่ระบบ
            $request->session()->put('comfirm_phone', 'true');
            return response()->json(['message' => 'OTP ถูกต้อง']);
        } else {
            // OTP ไม่ถูกต้อง
            return response()->json(['message' => 'OTP ไม่ถูกต้อง'], 422);
        }
    }

    public function sendEmailOTP(Request $request)
    {
        $email = $request->input('email');

        $data = [
            'otp_number' => '123456',
        ];


        $mailSent = Mail::to('bomboonsan.python@outlook.com')->send(new \App\Mail\OtpEMail($data));

        // Mail::to($email)->send(new \App\Mail\OtpMail($data));

        // return response()->json(['message' => 'OTP ถูกส่งไปยังอีเมลของคุณ']);
        if($mailSent) {
            return response()->json(['message' => 'OTP ถูกส่งไปยังอีเมลของคุณ']);
        } else {
            // ส่วนนี้เป็นส่วนของข้อผิดพลาด
            // คุณสามารถเพิ่มการดูสาเหตุของข้อผิดพลาดได้ตามความเหมาะสม
            return response()->json(['message' => 'มีปัญหาในการส่งอีเมล OTP']);
        }
    }


    public function sendmailGunOTP(Request $request)
    {
        $email = $request->input('email');

        $response = Http::post("https://api.mailgun.net/v3/sabaijaiapp.bomboonsan.com/messages", [
            'auth' => ['api', 'f2c552f075b6a05b7495031a2f3e34f2-4c205c86-cc4a33e6'],
            'form_params' => [
                'from' => 'bomboonsan@gmail.com',
                'to' => $email,
                'subject' => 'Sample Email',
                'html' => view('emails.otp')->render(),
            ],
        ]);

        if ($response->successful()) {
            return "Email sent successfully!";
        } else {
            return $response;
        }
    }
}
