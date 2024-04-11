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
                <h1 class="text-2xl font-medium text-educationColor text-center mb-5 text-[#ef3026]">
                    สรุปข้อมูลการขอสินเชื่อ
                </h1>
                <form class="education-form" action="{{ route('loan-form9submit') }}" method="POST">
                    @csrf
                    <div class="mb-1 flex justify-between items-center">
                        <div class="">
                            จำนวนเงินที่ขอสินเชื่อ
                        </div>
                        <div class="">
                            @if(isset($data['amount'])) {{ $data['amount'] }} @else ไม่ระบุ @endif บาท
                        </div>
                    </div>
                    <div class="mb-1 flex justify-between items-center">
                        <div class="">
                            ระยะเวลาผ่อน
                        </div>
                        <div class="">
                            x บาท
                        </div>
                    </div>
                    <div class="mb-1 flex justify-between items-center">
                        <div class="">
                            ยอดชำระ/เดือน
                        </div>
                        <div class="">
                            x บาท
                        </div>
                    </div>
                    <div class="mb-1 flex justify-between items-center">
                        <div class="">
                            วันที่กำหนดชำระ
                        </div>
                        <div class="">
                            x บาท
                        </div>
                    </div>

                    <p>
                        หากต้องการเปลี่ยนแปลงแก้ไขข้อมูลการขอสินเชื่อข้างต้น
                        ให้ กด ”กลับไป” เพื่อทำการแก้ไข
                    </p>

                    <div class="text-sm mt-10">
                        <p class="text-center">
                            **รายละเอียดข้างต้นเป็นการกู้ตลอดหลักสูตร อย่างไรก็ตามหากท่านไม่ประสงค์ที่จะต่อสัญญาฉบับถัดไป ท่านสามารถยกเลิกได้**
                        </p>
                    </div>

                    <div class="text-lg mt-10">
                        <p class="text-center">
                            โปรดแอดไลน์ เพื่อรับทราบผลการอนุมัติของท่าน
                        </p>
                    </div>

                    {{-- SUBMIT --}}

                    <div class="flex justify-center items-center gap-5">
                        <a href="{{ route('loan-form8') }}" class="bg-[#ef3026]/50 text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ย้อนกลับ</a>
                        <button class="bg-[#ef3026] text-white py-3 px-5 rounded-lg">ส่งใบสมัครและแอดไลน์</button>
                    </div>


                </form>
            </div>
        </x-layouts.applyloan>
        <script src="{{ asset('js/preline.js') }}"></script>
    </body>
</html>
