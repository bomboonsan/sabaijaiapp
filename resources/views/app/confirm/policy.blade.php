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
            <p class="text-center text-xl text-black font-medium uppercase mb-3">คำขอยกเลิกประกันภัย-รถยนต์</p>
            <img class="w-full" src="{{ asset('images/mockupContract.png') }}" alt="mockup" />

            <form action="{{ route('confirm-policyConfirm') }}" method="POST">
                @csrf
                <div class="flex">
                <input type="checkbox" name="policyConfirm" class="shrink-0 mt-0.5 border-red-500 rounded text-red-600 focus:ring-red-500 disabled:opacity-50 disabled:pointer-events-none" id="hs-default-checkbox">
                <label for="hs-default-checkbox" class="ml-3 pl-3 text-black">ข้าพเจ้า ได้อ่าน รับทราบ เข้าใจ และตกลงยินยอม ตามรายละเอียดข้อความในสัญญาฉบับนี้ทุกประการ</label>
                </div>
                <div class="text-center mt-20">
                    <button class="btn-submit" type="submit">ยืนยัน</button>
                </div>
            </form>


        </x-layouts.confirm>
        <script src="{{ asset('js/preline.js') }}"></script>
    </body>
</html>
