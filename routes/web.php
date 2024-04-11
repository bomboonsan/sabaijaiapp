<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplyLoanController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\OtpController;

use App\Http\Controllers\BackendUsersController;

use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/confirm', [ConfirmController::class, 'index'])->name('confirm-index');
Route::get('/confirm/select', [ConfirmController::class, 'select'])->name('confirm-select');
Route::get('/confirm/policy', [ConfirmController::class, 'policy'])->name('confirm-policy');
Route::get('/confirm/success', [ConfirmController::class, 'success'])->name('confirm-success');
Route::post('/verifyCitizen', [ConfirmController::class, 'verifyCitizen'])->name('confirm-verifyCitizen');
Route::post('/confirm/selected', [ConfirmController::class, 'policySelected'])->name('confirm-selected');
Route::post('/confirm/policy', [ConfirmController::class, 'policyConfirm'])->name('confirm-policyConfirm');

Route::get('/loan', [ApplyLoanController::class, 'index'])->name('loan-index');
Route::post('/loan/createform', [ApplyLoanController::class, 'createForm'])->name('loan-createForm');
Route::get('/loan/form1', [ApplyLoanController::class, 'form1'])->name('loan-form1');
Route::post('/loan/form1', [ApplyLoanController::class, 'form1submit'])->name('loan-form1submit');
Route::get('/loan/form2', [ApplyLoanController::class, 'form2'])->name('loan-form2');
Route::post('/loan/form2', [ApplyLoanController::class, 'form2submit'])->name('loan-form2submit');
Route::get('/loan/form3', [ApplyLoanController::class, 'form3'])->name('loan-form3');
Route::post('/loan/form3', [ApplyLoanController::class, 'form3submit'])->name('loan-form3submit');
Route::get('/loan/form4', [ApplyLoanController::class, 'form4'])->name('loan-form4');
Route::post('/loan/form4', [ApplyLoanController::class, 'form4submit'])->name('loan-form4submit');
Route::get('/loan/form5', [ApplyLoanController::class, 'form5'])->name('loan-form5');
Route::post('/loan/form5', [ApplyLoanController::class, 'form5submit'])->name('loan-form5submit');
Route::get('/loan/form6', [ApplyLoanController::class, 'form6'])->name('loan-form6');
Route::post('/loan/form6', [ApplyLoanController::class, 'form6submit'])->name('loan-form6submit');
Route::get('/loan/form7', [ApplyLoanController::class, 'form7'])->name('loan-form7');
Route::post('/loan/form7', [ApplyLoanController::class, 'form7submit'])->name('loan-form7submit');
Route::get('/loan/form8', [ApplyLoanController::class, 'form8'])->name('loan-form8');
Route::post('/loan/form8', [ApplyLoanController::class, 'form8submit'])->name('loan-form8submit');
Route::get('/loan/form9', [ApplyLoanController::class, 'form9'])->name('loan-form9');
Route::post('/loan/form9', [ApplyLoanController::class, 'form9submit'])->name('loan-form9submit');
Route::get('/loan/success', [ApplyLoanController::class, 'success'])->name('loan-success');

Route::get('/loan/otpemail', [ApplyLoanController::class, 'formOtpemail'])->name('loan-otpemail');

Route::post('/send-otp', [OtpController::class, 'sendOTP'])->name('send_otp');
Route::post('/verify-otp', [OtpController::class, 'verifyOTP'])->name('verify_otp');
Route::post('/send-email-otp', [OtpController::class, 'sendEmailOTP'])->name('send_email_otp');


Route::get('send-mail', function () {

    $data = [
        'otp_number' => '123456',
    ];


    Mail::to('bomboonsan.python@outlook.com')->send(new \App\Mail\OtpEmail($data));

    return 'Email sent at ' . now();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/upload', function () {
        return view('upload');
    })->name('upload');

    Route::get('/backend/users', [BackendUsersController::class, 'index'])->name('backend-users');
});
