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
                    กรอกข้อมูลด้านอาชีพหลัก
                </h1>
                <form class="education-form"><form class="education-form" action="{{ route('loan-form6submit') }}" method="POST">
                    @csrf

                    <div>
                        <label htmlFor="work_name">ชื่อธุรกิจ/ชื่อที่ทำงาน</label>
                        <div id="work_name" class="flex gap-3">
                            <input class="flex-1" type="text" name="work_name" @if(isset($data['work_name'])) value="{{ $data['work_name'] }}" @endif required />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="type_business_detail">ลักษณะธุรกิจ</label>
                        <select id="type_business_detail" class="w-full" name="type_business_detail" required>
                            <option value="บริษัท">บริษัท</option>
                            <option value="หจก.">หจก.</option>
                            <option value="มีหน้าร้านออนไลน์และไม่จดทะเบียน">มีหน้าร้านออนไลน์และไม่จดทะเบียน</option>
                            <option value="มีหน้าร้านออนไลน์และจดทะเบียน">มีหน้าร้านออนไลน์และจดทะเบียน</option>
                            <option value="มีหน้าร้านที่ไม่ใช่ออนไลน์และไม่จดทะเบียน">มีหน้าร้านที่ไม่ใช่ออนไลน์และไม่จดทะเบียน</option>
                            <option value="มีหน้าร้านที่ไม่ใช่ออนไลน์และจดทะเบียน">มีหน้าร้านที่ไม่ใช่ออนไลน์และจดทะเบียน</option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="monthly_profit">กำไรต่อเดือน</label>
                        <div id="monthly_profit" class="flex gap-3">
                            <input class="flex-1" type="number" name="monthly_profit" min="0" @if(isset($data['monthly_profit'])) value="{{ $data['monthly_profit'] }}" @endif required />
                        </div>
                    </div>

                    ระยะเวลากิจการส่วนตัวนับตั้งแต่คุณดำเนินการ
                    <div class="flex gap-3 items-end">
                        <div class="flex-auto">
                            <div class="flex items-center gap-3">
                                <input id="year_work" class="flex-1 w-full" type="number" name="year_work"  @if(isset($data['year_work'])) value="{{ $data['year_work'] }}" @endif required />
                                <label htmlFor="year_work">ปี</label>
                            </div>
                        </div>
                        <div class="flex-auto">
                            <div class="flex items-center gap-3">
                                <input id="month_work" class="flex-1 w-full" type="number" name="month_work"  @if(isset($data['month_work'])) value="{{ $data['month_work'] }}" @endif  />
                                <label htmlFor="month_work">เดือน</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label htmlFor="number_of_employees">จำนวนพนักงาน</label>
                        <div id="number_of_employees" class="flex gap-3">
                            <input class="flex-1" type="number" name="number_of_employees" min="0" @if(isset($data['number_of_employees'])) value="{{ $data['number_of_employees'] }}" @endif required />
                        </div>
                    </div>
                    <div>
                        <label htmlFor="pay_date">วันที่ต้องการชำระค่างวด</label>
                        <select id="pay_date" class="w-full" name="pay_date" required>
                            @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}" @if(isset($data['pay_date']) && $data['pay_date'] == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <h2 class="text-2xl font-medium text-educationColor text-center mb-0 text-[#ef3026]">ที่ทำงานของอาชีพหลัก</h2>

                    <div>
                        <label htmlFor="district_work">แขวง/ตำบล</label>
                        <div class="flex gap-3">
                            <input id="district_work" class="flex-1 w-full" type="text" name="district_work" @if(isset($data['district_work'])) value="{{ $data['district_work'] }}" @endif required />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="amphoe_work">เขต/อำเภอ</label>
                        <div class="flex gap-3">
                            <input id="amphoe_work" class="flex-1 w-full" type="text" name="amphoe_work" @if(isset($data['amphoe_work'])) value="{{ $data['amphoe_work'] }}" @endif required />
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <div class="flex-1">
                            <label htmlFor="province_work">จังหวัด</label>
                            <input id="province_work" class="flex-1 w-full" type="text" name="province_work" @if(isset($data['province_work'])) value="{{ $data['province_work'] }}" @endif required />
                        </div>
                        <div class="flex-1">
                            <label htmlFor="zipcode_work">รหัสไปรษณีย์</label>
                            <input id="zipcode_work" class="flex-1 w-full" type="text" name="zipcode_work" @if(isset($data['zipcode_work'])) value="{{ $data['zipcode_work'] }}" @endif required />
                        </div>
                    </div>



                    {{-- SUBMIT --}}

                    <div class="flex justify-center items-center gap-5">
                        <a href="{{ route('loan-form5') }}" class="bg-[#ef3026]/50 text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ย้อนกลับ</a>
                        <button class="bg-[#ef3026] text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ยืนยัน</button>
                    </div>


                </form>
            </div>
        </x-layouts.applyloan>
        <script src="{{ asset('js/preline.js') }}"></script>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
        <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
        <link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
        <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
        <script>
            $.Thailand({
                $district: $('#district_work'), // input ของตำบล
                $amphoe: $('#amphoe_work'), // input ของอำเภอ
                $province: $('#province_work'), // input ของจังหวัด
                $zipcode: $('#zipcode_work'), // input ของรหัสไปรษณีย์
            });
        </script>
    </body>
</html>
