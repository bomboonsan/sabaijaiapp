<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>สบายใจมันนี่</title>
        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="">
        <x-layouts.confirm>
            <img class="logo" src="{{ asset('images/logo.webp') }}" alt="sabaijai logo" />
            <p class="text-center text-3xl uppercase mb-3">บริษัท สบายใจมันนี่ จำกัด</p>
            <p class="text-center  md:text-lg">
                34 อาคาร B ชั้น 2 ห้องเลขที่ B204 <br/>
                อาคารซี.พี. ทาวเวอร์ 3 พญาไท กรุงเทพ 10400 <br/>
                โทรศัพท์: 0994523532
            </p>
            <hr class="my-5" />
            <p class="text-center text-lg">
                กรุณากรอกเลขบัตรประชาชน 13 หลัก เพื่อยืนยันเข้าระบบ
            </p>
            <form action="{{ route('confirm-verifyCitizen') }}" method="POST">
                @csrf
                <input class="input-citizenid" type="text" placeholder="XXXXXXXXXXXX" name="citizen_id" />

                <div class="text-center mt-20">
                    <button class="btn-submit" type="submit">ยืนยัน</button>
                    @if(session('error'))
                        <p class="text-red-500">{{ session('error') }}</p>
                    @endif
                </div>
            </form>
        </x-layouts.confirm>
        <script src="{{ asset('js/preline.js') }}"></script>
    </body>
</html>
