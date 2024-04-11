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
                <form class="education-form" action="{{ route('send_email_otp') }}" method="POST">
                    @csrf


                    <h2 class="text-2xl font-medium text-educationColor text-center mb-0 text-[#ef3026]">กรอกและยืนยันอีเมล</h2>
                    <h3 class="text-lg font-medium text-educationColor text-center -mt-3 mb-5 text-[#ef3026]">สำหรับรับสัญญาเงินกู้และตารางการผ่อนชำระ</h3>

                    <div class="w-full mb-10">
                        <div class="text-center mb-1">1.กรุณากรอกอีเมลของท่าน</div>
                        <div class="text-center"><input type="email" id="email" name="email" class="block mx-auto w-[250px] border-gray-200 rounded-md" @if(isset($data['email'])) value="{{ $data['email'] }}" @endif required></div>
                    </div>


                    <div class="flex justify-center items-center gap-5">
                        <a href="{{ route('loan-form1') }}" class="bg-[#ef3026]/50 text-white py-3 px-5 rounded-lg">ย้อนกลับ</a>
                        <button class="bg-[#ef3026] text-white py-3 px-5 rounded-lg">ส่งข้อมูล</button>
                    </div>
                </form>
            </div>
        </x-layouts.applyloan>
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/preline.js') }}"></script>

    </body>
</html>
