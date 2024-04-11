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
            <p class="text-center md:text-lg">
                34 อาคาร B ชั้น 2 ห้องเลขที่ B204 <br/>
                อาคารซี.พี. ทาวเวอร์ 3 พญาไท กรุงเทพ 10400 <br/>
                โทรศัพท์: 0994523532
            </p>
            <hr class="my-5" />
            <p class="text-center text-2xl uppercase mb-3">
                โปรดเลือกกรมธรรม์ที่ท่านต้องการแบ่งชำระ
            </p>
            <form action="{{ route('confirm-selected') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-y-3">
                @foreach($policies as $policy)
                    @if($loop->first)
                    <div class="flex items-center">
                        <input type="radio" value="{{ $policy['number'] }}" name="policySelected" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-red-600 focus:ring-red-500" id="{{ $policy['number'] }}" checked>
                        <label for="{{ $policy['number'] }}" class="pl-2 ml-2 text-lg">กรรมธรรม์ที่ {{ $policy['number'] }}</label>
                    </div>
                    @else
                    <div class="flex items-center">
                        <input type="radio" value="{{ $policy['number'] }}" name="policySelected" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-red-600 focus:ring-red-500" id="{{ $policy['number'] }}">
                        <label for="{{ $policy['number'] }}" class="pl-2 ml-2 text-lg">กรรมธรรม์ที่ {{ $policy['number'] }}</label>
                    </div>
                    @endif

                @endforeach
                </div>
                <div class="text-center mt-20">
                    <button class="btn-submit" type="submit">ยืนยัน</button>
                </div>
            </form>


        </x-layouts.confirm>
        <script src="{{ asset('js/preline.js') }}"></script>
    </body>
</html>
