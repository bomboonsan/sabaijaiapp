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
                    กรอกข้อมูลที่อยู่ <br class="block md:hidden" />
                    ที่อยู่ตามบัตรประชาชน
                </h1>
                <form class="education-form" action="{{ route('loan-form4submit') }}" method="POST">
                    @csrf

                    <div>
                        <label htmlFor="address">บ้านเลขที่/ชื่อหมู่บ้าน-คอนโด/ถนน</label>
                        <div class="flex gap-3">
                            <input class="flex-1" type="text" name="address" id="address" @if(isset($data['address'])) value="{{ $data['address'] }}" @endif />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="district">แขวง/ตำบล</label>
                        <div class="flex gap-3">
                            <input id="district" class="flex-1 w-full" type="text" name="district" @if(isset($data['district'])) value="{{ $data['district'] }}" @endif />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="amphoe">เขต/อำเภอ</label>
                        <div class="flex gap-3">
                            <input id="amphoe" class="flex-1 w-full" type="text" name="amphoe" @if(isset($data['amphoe'])) value="{{ $data['amphoe'] }}" @endif />
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <div class="flex-1">
                            <label htmlFor="province">จังหวัด</label>
                            <input id="province" class="flex-1 w-full" type="text" name="province" @if(isset($data['province'])) value="{{ $data['province'] }}" @endif />
                        </div>
                        <div class="flex-1">
                            <label htmlFor="zipcode">รหัสไปรษณีย์</label>
                            <input id="zipcode" class="flex-1 w-full" type="text" name="zipcode" @if(isset($data['zipcode'])) value="{{ $data['zipcode'] }}" @endif />
                        </div>
                    </div>

                    {{-- Q --}}

                    <div class="text-center py-5">
                        <p class="text-lg font-medium">
                            ที่อยู่ปัจจุบันเป็นที่เดียวกับที่อยู่ตามบัตรประชาชน ใช่หรือไม่ ?
                        </p>
                        <div class="flex justify-center gap-7 mt-2">
                            <div class="inline-flex">
                                <input type="radio" name="is_address_present" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-red-600 focus:ring-red-500" id="accept-1" @if(isset($data['is_address_delivery']) && $data['is_address_present'] == 'on') checked @endif>
                                <label for="accept-1" class="text-bold font-medium ml-2">ใช่ เป็นที่เดียวกัน </label>
                            </div>
                            <div class="inline-flex">
                                <input type="radio" name="is_address_present" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-red-600 focus:ring-red-500" id="deny-1"  @if(isset($data['is_address_delivery']) && $data['is_address_present'] == 'off') checked @endif>
                                <label for="deny-1" class="text-bold font-medium ml-2">ไม่ใช่ กรุณากรอกเพิ่มเติม</label>
                            </div>
                        </div>
                    </div>

                    {{--  --}}

                    <h2 class="text-2xl font-medium text-educationColor text-center mb-0 text-[#ef3026]">ที่อยู่ปัจจุบัน</h2>


                    <div>
                        <label htmlFor="address_present">บ้านเลขที่/ชื่อหมู่บ้าน-คอนโด/ถนน</label>
                        <div class="flex gap-3">
                            <input class="flex-1" type="text" name="address_present" id="address_present" @if(isset($data['address_present'])) value="{{ $data['address_present'] }}" @endif />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="district">แขวง/ตำบล</label>
                        <div class="flex gap-3">
                            <input id="district_present" class="flex-1 w-full" type="text" name="district_present" @if(isset($data['district_present'])) value="{{ $data['district_present'] }}" @endif />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="amphoe">เขต/อำเภอ</label>
                        <div class="flex gap-3">
                            <input id="amphoe_present" class="flex-1 w-full" type="text" name="amphoe_present" @if(isset($data['amphoe_present'])) value="{{ $data['amphoe_present'] }}" @endif />
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <div class="flex-1">
                            <label htmlFor="province">จังหวัด</label>
                            <input id="province_present" class="flex-1 w-full" type="text" name="province_present" @if(isset($data['province_present'])) value="{{ $data['province_present'] }}" @endif />
                        </div>
                        <div class="flex-1">
                            <label htmlFor="zipcode">รหัสไปรษณีย์</label>
                            <input id="zipcode_present" class="flex-1 w-full" type="text" name="zipcode_present" @if(isset($data['zipcode_present'])) value="{{ $data['zipcode_present'] }}" @endif />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="accommodation_type">ประเภทที่พักอาศัย </label>
                        <select id="accommodation_type" class="w-full" name="accommodation_type" require>
                            <option value="">เลือก</option>
                            <option value="แฟลต,อพาร์ทเม้นท์ม,ห้องแถว">แฟลต,อพาร์ทเม้นท์ม,ห้องแถว</option>
                            <option value="คอนโดมิเนียม">คอนโดมิเนียม</option>
                            <option value="ทาวเฮ้าส์,ทาวน์โฮม">ทาวเฮ้าส์,ทาวน์โฮม</option>
                            <option value="อาคารพาณิชย์">อาคารพาณิชย์</option>
                            <option value="บ้านเดี่ยว">บ้านเดี่ยว</option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="residence_status">สถานะที่พักอาศัย</label>
                        <select id="residence_status" class="w-full" name="residence_status" require>
                            <option value="">เลือก</option>
                            <option value="เจ้าของบ้านและที่ดิน">เช่า</option>
                            <option value="บ้านของตนเองมีภาระหนี้">บ้านของตนเองมีภาระหนี้</option>
                            <option value="บ้านของตนเองปลอดหนี้">บ้านของตนเองปลอดหนี้</option>
                            <option value="บ้านพักสวัสดิการ">บ้านพักสวัสดิการ</option>
                            <option value="บ้านบิดามารดา">บ้านบิดามารดา</option>
                            <option value="อาศัยอยู่กับญาติ">อาศัยอยู่กับญาติ</option>
                            <option value="อาศัยอยู่กับเพื่อน">อาศัยอยู่กับเพื่อน</option>
                        </select>
                    </div>

                    {{-- Q --}}

                    <div class="text-center py-5">
                        <p class="text-lg font-medium">
                            ที่อยู่จัดส่งเอกสารเป็นที่เดียวกับที่อยู่ปัจจุบัน ใช่หรือไม่ ?
                        </p>
                        <div class="flex justify-center gap-7 mt-2">
                            <div class="inline-flex">
                                <input type="radio" name="is_address_delivery" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-red-600 focus:ring-red-500" id="accept-3" @if(isset($data['is_address_delivery']) && $data['is_address_delivery'] == 'on') checked @endif>
                                <label for="accept-3" class="text-bold font-medium ml-2">ใช่ เป็นที่เดียวกัน </label>
                            </div>
                            <div class="inline-flex">
                                <input type="radio" name="is_address_delivery" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-red-600 focus:ring-red-500" id="deny-3" @if(isset($data['is_address_delivery']) && $data['is_address_delivery'] == 'off') checked @endif>
                                <label for="deny-3" class="text-bold font-medium ml-2">ไม่ใช่ กรุณากรอกเพิ่มเติม</label>
                            </div>
                        </div>
                    </div>

                    {{--  --}}

                    <h2 class="text-2xl font-medium text-educationColor text-center mb-0 text-[#ef3026]">ที่อยู่จัดส่งเอกสาร</h2>


                    <div>
                        <label htmlFor="address_delivery">บ้านเลขที่/ชื่อหมู่บ้าน-คอนโด/ถนน</label>
                        <div class="flex gap-3">
                            <input class="flex-1" type="text" name="address_delivery" id="address_delivery" @if(isset($data['address_delivery'])) value="{{ $data['address_delivery'] }}" @endif />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="district">แขวง/ตำบล</label>
                        <div class="flex gap-3">
                            <input id="district_delivery" class="flex-1 w-full" type="text" name="district_delivery" @if(isset($data['district_delivery'])) value="{{ $data['district_delivery'] }}" @endif />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="amphoe">เขต/อำเภอ</label>
                        <div class="flex gap-3">
                            <input id="amphoe_delivery" class="flex-1 w-full" type="text" name="amphoe_delivery" @if(isset($data['amphoe_delivery'])) value="{{ $data['amphoe_delivery'] }}" @endif />
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <div class="flex-1">
                            <label htmlFor="province">จังหวัด</label>
                            <input id="province_delivery" class="flex-1 w-full" type="text" name="province_delivery" @if(isset($data['province_delivery'])) value="{{ $data['province_delivery'] }}" @endif />
                        </div>
                        <div class="flex-1">
                            <label htmlFor="zipcode">รหัสไปรษณีย์</label>
                            <input id="zipcode_delivery" class="flex-1 w-full" type="text" name="zipcode_delivery" @if(isset($data['zipcode_delivery'])) value="{{ $data['zipcode_delivery'] }}" @endif />
                        </div>
                    </div>

                    {{-- SUBMIT --}}

                    <div class="flex justify-center items-center gap-5">
                        <a href="{{ route('loan-form3') }}" class="bg-[#ef3026]/50 text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ย้อนกลับ</a>
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
                $district: $('#district'), // input ของตำบล
                $amphoe: $('#amphoe'), // input ของอำเภอ
                $province: $('#province'), // input ของจังหวัด
                $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
            });


            $.Thailand({
                $district: $('#district_present'), // input ของตำบล
                $amphoe: $('#amphoe_present'), // input ของอำเภอ
                $province: $('#province_present'), // input ของจังหวัด
                $zipcode: $('#zipcode_present'), // input ของรหัสไปรษณีย์
            });

            $.Thailand({
                $district: $('#district_delivery'), // input ของตำบล
                $amphoe: $('#amphoe_delivery'), // input ของอำเภอ
                $province: $('#province_delivery'), // input ของจังหวัด
                $zipcode: $('#zipcode_delivery'), // input ของรหัสไปรษณีย์
            });

            // if checked #accept-2 add value form district to district_present
            $('#accept-1').on('click', function() {
                if ($(this).is(':checked')) {
                    $('#address_present').val($('#address').val());
                    $('#district_present').val($('#district').val());
                    $('#amphoe_present').val($('#amphoe').val());
                    $('#province_present').val($('#province').val());
                    $('#zipcode_present').val($('#zipcode').val());
                }
            });
            $('#accept-3').on('click', function() {
                if ($(this).is(':checked')) {
                    $('#address_delivery').val($('#address').val());
                    $('#district_delivery').val($('#district').val());
                    $('#amphoe_delivery').val($('#amphoe').val());
                    $('#province_delivery').val($('#province').val());
                    $('#zipcode_delivery').val($('#zipcode').val());
                }
            });
        </script>
    </body>
</html>
