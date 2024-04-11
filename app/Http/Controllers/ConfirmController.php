<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ConfirmController extends Controller
{
    public function index()
    {
        $citizen_data = Session::get('citizen_data');
        // Clear session
        Session::forget(['citizen_data', 'policySelected', 'policiesConfirm']);
        return view('app.confirm.index');
    }
    public function verifyCitizen(Request $request)
    {
        // ตรวจสอบว่ามีเลขบัตรประชาชนถูกส่งมาหรือไม่
        $request->validate([
            'citizen_id' => 'required|numeric' // กำหนดให้เป็นตัวเลขและไม่สามารถเว้นว่างได้
        ]);

        // รับค่าเลขบัตรประชาชนจากฟอร์ม
        $citizenId = $request->input('citizen_id');


        // ทำการเชื่อมต่อ API
        $response = Http::post('https://sabajai-app.vercel.app/api/auth/user', [
            'citizen_id' => $citizenId
        ]);

        // ตรวจสอบว่ามีการเชื่อมต่อ API สำเร็จหรือไม่
        if ($response->successful()) {
            // ดึงข้อมูลจาก response
            $data = $response->json();
            if(empty($data['user']['policies'])) {
                return redirect()->back()->with('error', 'ไม่พบข้อมูลในระบบ');
            }
            Session::put('citizen_data', $data);
            // คืนค่า JSON กลับไป
            // return response()->json($data);
            return redirect()->route('confirm-select');
        } else {
            // หากเชื่อมต่อ API ไม่สำเร็จ
            return response()->json(['error' => 'Failed to connect to API'], 500);
        }
    }
    public function select()
    {
        $citizen_data = Session::get('citizen_data');
        if (empty($citizen_data)) {
            return redirect()->route('confirm-index');
        }
        // dd($citizen_data);
        $policies = $citizen_data['user']['policies'];
        return view('app.confirm.select' , compact('policies'));
    }
    public function policySelected(Request $request) {
        $request->validate([
            'policySelected' => 'required|numeric' // กำหนดให้เป็นตัวเลขและไม่สามารถเว้นว่างได้
        ]);
        $policySelected = $request->input('policySelected');
        Session::put('policySelected', $policySelected);

        return redirect()->route('confirm-policy');
    }

    public function policy() {
        $citizen_data = Session::get('citizen_data');
        if (empty($citizen_data)) {
            return redirect()->route('confirm-index');
        }
        return view('app.confirm.policy');
    }

    public function policyConfirm(Request $request) {
        $policiesConfirm = $request->input('policiesConfirm');
        Session::put('policiesConfirm', $policiesConfirm);
        return redirect()->route('confirm-success');
    }

    public function success() {
        $citizen_data = Session::get('citizen_data');
        if (empty($citizen_data)) {
            return redirect()->route('confirm-index');
        }
        return view('app.confirm.success');
    }
}
