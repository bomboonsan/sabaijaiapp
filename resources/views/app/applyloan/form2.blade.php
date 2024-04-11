@section('apply_id', $data['apply_id'] ?? '')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>สบายใจมันนี่</title>
        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body>

        <x-layouts.applyloan>
            <div class="p-5 md:p-10">
                <h1 class="text-2xl font-medium text-educationColor text-center mb-5 text-[#ef3026]">กรอกและยืนยันเบอร์มือถือ</h1>
                <form class="education-form" action="{{ route('loan-form2submit') }}" method="POST">
                    @csrf

                    <div class="w-full mb-10">
                        <div class="text-center mb-1">1.กรุณากรอกเบอร์มือถือ</div>
                        <div class="text-center"><input type="tel" id="telephone" name="telephone" class="block mx-auto w-[250px] border-gray-200 rounded-md" pattern="[0-9]{10}" @if(isset($data['telephone'])) value="{{ $data['telephone'] }}" @endif required /></div>
                        <div class="text-center mt-3">
                            <button class="bg-[#ef3026] text-white py-1 px-5 rounded-lg min-w-[150px] text-center" name="send-tel-otp" type="button" id="sendTelOtpBtn"  @if(isset($data['send-tel-otp'])) value="{{ $data['send-tel-otp'] }}" @endif>ขอ OTP</button>
                        </div>
                    </div>

                    <div class="w-full mb-10">
                        <div class="text-center mb-1">2.กรุณากรอกยืนยัน SMS OTP</div>
                        <div class="flex justify-center space-x-3" data-hs-pin-input>
                            <div class="text-center"><input type="text" id="telOtp" name="tel-otp" class="block mx-auto w-[150px] border-gray-200 rounded-md" @if(isset($data['tel-otp'])) value="{{ $data['tel-otp'] }}" @endif required /></div>
                        </div>
                        <div class="text-center mt-3">
                            <button class="bg-[#ef3026] text-white py-1 px-5 rounded-lg min-w-[150px] text-center" type="button" id="verifyTelOtpBtn">ยืนยัน</button>
                        </div>
                    </div>


                    <h2 class="text-2xl font-medium text-educationColor text-center mb-0 text-[#ef3026]">กรอกและยืนยันอีเมล</h2>
                    <h3 class="text-lg font-medium text-educationColor text-center -mt-3 mb-5 text-[#ef3026]">สำหรับรับสัญญาเงินกู้และตารางการผ่อนชำระ</h3>

                    <div class="w-full mb-2">
                        <div class="text-center mb-1">1.กรุณากรอกอีเมลของท่าน</div>
                        <div class="text-center"><input type="email" id="email" name="email" class="block mx-auto w-[250px] border-gray-200 rounded-md" @if(isset($data['email'])) value="{{ $data['email'] }}" @endif required></div>
                        {{-- <div class="text-center mt-3">
                            <button class="bg-[#ef3026] text-white py-1 px-5 rounded-lg" type="button" id="sendEmailOtpBtn min-w-[150px] text-center">ขอ OTP</button>
                        </div> --}}
                    </div>

                    <div class="w-full mb-10">
                        <div class="text-center mb-1">2.กรุณากรอกอีเมลอีกครั้ง</div>
                        <div class="flex justify-center space-x-3" data-hs-pin-input>
                            <div class="text-center"><input type="text" name="email-confire" class="block mx-auto w-[250px] border-gray-200 rounded-md" @if(isset($data['email-confire'])) value="{{ $data['email-confire'] }}" @endif required /></div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="button" class="bg-[#ef3026] text-white py-1 px-5 rounded-lg min-w-[150px] text-center" id="confirmEmail">ยืนยัน</button>
                        </div>
                    </div>

                    {{-- <div class="w-full mb-10">
                        <div class="text-center mb-1">2.กรุณากรอกยืนยัน OTP ที่ท่านได้รับทางอีเมล</div>
                        <div class="flex justify-center space-x-3" data-hs-pin-input>
                            <div class="text-center"><input type="text" name="email-otp" class="block mx-auto w-[150px] border-gray-200 rounded-md" @if(isset($data['email-otp'])) value="{{ $data['email-otp'] }}" @endif required /></div>
                        </div>
                        <div class="text-center mt-3">
                            <button class="bg-[#ef3026] text-white py-1 px-5 rounded-lg min-w-[150px] text-center">ยืนยัน</button>
                        </div>
                    </div> --}}


                    <div class="flex justify-center items-center gap-5">
                        <a href="{{ route('loan-form1') }}" class="bg-[#ef3026]/50 text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ย้อนกลับ</a>
                        <button class="bg-[#ef3026] text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ต่อไป</button>
                    </div>
                </form>
            </div>
        </x-layouts.applyloan>
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/preline.js') }}"></script>
        <script src="{{ asset('js/pin-input.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function(){

                $('#sendTelOtpBtn').click(function(){
                    var telephone = $('#telephone').val();
                    if(telephone.length != 10) {
                        return
                    }
                    if(telephone[0] != '0') {
                        return
                    }
                    $.ajax({
                        url: "{{ route('send_otp') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'telephone': telephone
                        },
                        success: function(response){
                            console.log(response);

                            Swal.fire({
                                title: "ส่ง OTP ไปที่เบอร์โทรศัพท์ของท่านแล้ว",
                                icon: "success"
                            });

                            $('#sendTelOtpBtn').attr('disabled', true).addClass('disabled');

                            $('#otpForm').hide();
                            $('#otpVerification').show();
                        },
                        error: function(xhr, status, error){
                            console.error(xhr.responseText);
                            alert('Failed to send OTP!');
                        }
                    });
                });

                $('#verifyTelOtpBtn').click(function(){
                    let phone_otp = $('#telOtp').val();
                    $.ajax({
                        url: "{{ route('verify_otp') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'phone_otp': phone_otp
                        },
                        success: function(response){
                            // console.log(response);
                            // $('#otpResult').html('<p>' + response.message + '</p>').show();
                            document.getElementById('telOtp').type = 'password';
                            Swal.fire({
                                title: "ยืนยันเบอร์โทรศัพท์สำเร็จ",
                                icon: "success"
                            });
                            $('#verifyTelOtpBtn').attr('disabled', true).addClass('disabled');
                        },
                        error: function(xhr, status, error){
                            // console.error(xhr.responseText);
                            // alert('Failed to verify OTP!');
                            $('#telOtp').val('');
                            Swal.fire({
                                title: "รหัส OTP ไม่ถูกต้อง",
                                icon: "warning"
                            });
                        }
                    });
                });

                $('#sendEmailOtpBtn').click(function(){
                    var email = $('#email').val();
                    $.ajax({
                        url: "{{ route('send_email_otp') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'email': email
                        },
                        success: function(response){
                            console.log(response);
                            $('#otpForm').hide();
                            $('#otpVerification').show();
                        },
                        error: function(xhr, status, error){
                            console.error(xhr.responseText);
                            alert('Failed to send OTP!');
                        }
                    });
                });


            });
        </script>
    </body>
</html>
