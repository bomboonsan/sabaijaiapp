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

            <div class="text-center">
            <img class="block mx-auto mb-10" src="{{ asset('images/checked.png') }}" alt="checked" />
            </div>
            <h1 class="text-center text-4xl uppercase mb-3">
            สำเร็จ !!!
            </h1>
            <p class="text-center text-2xl uppercase mb-3">
                ท่านสามารถดูสัญญาจากลิ้งค์<br/>
                ในไลน์ที่บริษัทจัดส่งให้
            </p>

            <div class="text-center mt-10 mb-5">
            <a href="https://lin.ee/wXcZnEG" target="_blank" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-[#f21b10] hover:bg-red-600">
                กลับสู่หน้าไลน์
            </a>
            </div>

            <p class="text-center uppercase mb-3">
            โปรดสมัครสมาชิกในไลน์(สำหรับลูกค้าใหม่)<br/> เพื่อรับการแจ้งเตือนค่างวดและรับใบเสร็จการชำระ
            </p>

        </x-layouts.confirm>
        <script src="{{ asset('js/preline.js') }}"></script>
    </body>
</html>
