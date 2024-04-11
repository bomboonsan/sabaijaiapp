<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class KycController extends Controller
{
    public function kycAppmanApi()
    {
        $response = Http::asForm()->post('https://mac-portal.appmanteam.com/auth/realms/mac-portal/protocol/openid-connect/token', [
            'grant_type' => 'client_credentials',
            'client_id' => 'sabaijaimoney-case-keeper-service-account',
            'client_secret' => 'a063eb0d-3395-4b01-a634-9c78f6756832',
        ]);

        // เก็บผลลัพธ์ไว้ในตัวแปร $result
        $resultAuth = $response->json();

        dd($resultAuth);

    }
}
