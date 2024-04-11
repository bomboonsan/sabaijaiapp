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
        <div class="min-h-screen bg-red-900 flex flex-col items-center justify-center">
            <h1 class="text-5xl text-white font-bold mb-8 animate-pulse">
                สบายใจมันนี่
            </h1>
            <p class="text-white text-lg mb-8">
                มุ่งมั่นที่จะทำให้คุณไปได้ไกลกว่าอย่างมีความสุข ตอบโจทย์ทุกไลฟ์สไตล์ในแบบที่เป็นคุณ
            </p>
            <a class="bg-white text-red-900 font-bold py-2 px-4 rounded" href="{{ route('loan-index') }}">
                สมัครสินชื่อ
            </a>
            <div class="my-2"></div>
            <a class="bg-white text-red-900 font-bold py-2 px-4 rounded" href="{{ route('confirm-index') }}">
                ยืนยันตัวตน
            </a>
        </div>
        <script src="{{ asset('js/preline.js') }}"></script>
    </body>
</html>
