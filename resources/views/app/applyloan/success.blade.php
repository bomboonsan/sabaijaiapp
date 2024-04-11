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
                <h1 class="text-2xl font-medium text-center mb-5 text-[#00C300]">
                    ส่งใบสมัครสำเร็จ !!
                </h1>
                <div class="text-center">
                    <img class="mx-auto" width="150" src="{{ asset('images/line-at-logo-png-8.png') }}" alt="">

                    <p class="text-[#2E51A2] font-medium text-lg my-3">
                        โปรดแอดไลน์ เพื่อรับทราบผล<br/>
                        และรับแจ้งเตือนค่างวดของท่าน
                    </p>

                    <a href="#" class="inline-block py-1 px-4 bg-[#00c201] text-white text-lg rounded-lg">คลิกเพื่อแอดไลน์</a>
                </div>

            </div>
        </x-layouts.applyloan>
        <script src="{{ asset('js/preline.js') }}"></script>
    </body>
</html>
