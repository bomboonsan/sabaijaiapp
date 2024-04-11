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

        <x-layouts.applyloan>
            <div class="text-center">
                {{-- <div class="educationIcon">
                    <a href="{{ route('loan-form1') }}" >
                        <img src="{{ asset('images/educationIcon.png') }}" alt="educationIcon" />
                        <p class="text-center">
                            สินเชื่อ<br/>
                            เพื่อการศึกษา
                        </p>
                    </a>
                </div>
                <div class="my-3"></div> --}}
                <form action="{{ route('loan-createForm') }}" method="POST"  class="educationIcon">
                    @csrf
                    <button type="submit">
                        <img src="{{ asset('images/educationIcon.png') }}" alt="educationIcon" />
                        <p class="text-center">
                            สินเชื่อ<br/>
                            เพื่อการศึกษา
                        </p>
                    </button>
                </form>
                <div class="my-3"></div>
                @if (session('applyloan'))
                <div class="mt-10">
                    <a href="{{ route('loan-form1') }}" class="educationBtn">แก้ไข หรือ กรอกใบสมัครต่อ</a>
                </div>
                <div class="mt-5">
                    <a href="{{ route('loan-form1') }}" class="educationBtn">แนบเอกสารเพิ่มเติม</a>
                </div>
                @endif
            </div>
        </x-layouts.applyloan>
        <script src="{{ asset('js/preline.js') }}"></script>
    </body>
</html>
