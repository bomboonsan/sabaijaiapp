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
                    กรอกรายได้และค่าใช้จ่าย
                </h1>
                <form class="education-form" action="{{ route('loan-form5submit') }}" method="POST">
                    @csrf
                    <div>
                        <label htmlFor="main_occupation">อาชีพหลัก</label>
                        <select id="main_occupation" class="w-full" name="main_occupation" required>
                            <option value="">เลือก</option>
                            <option value="1" @if(isset($data['main_occupation']) && $data['main_occupation'] == '1') selected @endif>เจ้าของธุรกิจที่มีลูกจ้าง</option>
                            <option value="2" @if(isset($data['main_occupation']) && $data['main_occupation'] == '2') selected @endif>เจ้าของธุรกิจที่ไม่มีลูกจ้าง หรือ อาชีพอิสระ</option>
                            <option value="3" @if(isset($data['main_occupation']) && $data['main_occupation'] == '3') selected @endif>รวมกลุ่มกันเพื่อผลิตสินค้า/บริการ</option>
                            <option value="4" @if(isset($data['main_occupation']) && $data['main_occupation'] == '4') selected @endif>ผู้ช่วยธุรกิจในครัวเรือน (ไม่ได้รับค่าจ้าง)</option>
                            <option value="5" @if(isset($data['main_occupation']) && $data['main_occupation'] == '5') selected @endif>ข้าราชการบำนาญ</option>
                            <option value="6" @if(isset($data['main_occupation']) && $data['main_occupation'] == '6') selected @endif>นักการเมือง</option>
                            <option value="7" @if(isset($data['main_occupation']) && $data['main_occupation'] == '7') selected @endif>อัยการ/ตุลาการ/ผู้พิพากษา</option>
                            <option value="8" @if(isset($data['main_occupation']) && $data['main_occupation'] == '8') selected @endif>นักกฎหมายและผู้ใช้วิชาชีพทางกฎหมาย</option>
                            <option value="9" @if(isset($data['main_occupation']) && $data['main_occupation'] == '9') selected @endif>ทหาร/ตำรวจ</option>
                            <option value="10" @if(isset($data['main_occupation']) && $data['main_occupation'] == '10') selected @endif>ครู อาจารย์ และผู้ประกอบอาชีพการศึกษา (ยกเว้นติวเตอร์)</option>
                            <option value="11" @if(isset($data['main_occupation']) && $data['main_occupation'] == '11') selected @endif>แพทย์</option>
                            <option value="12" @if(isset($data['main_occupation']) && $data['main_occupation'] == '12') selected @endif>พยาบาล และผู้ประกอบการอาชีพที่เกี่ยวกับการแพทย์</option>
                            <option value="13" @if(isset($data['main_occupation']) && $data['main_occupation'] == '13') selected @endif>ข้าราชการอื่นๆ (ที่ไม่ใช่ข้อก่อนหน้า)</option>
                            <option value="14" @if(isset($data['main_occupation']) && $data['main_occupation'] == '14') selected @endif>วิศวกร/สถาปนิก</option>
                            <option value="15" @if(isset($data['main_occupation']) && $data['main_occupation'] == '15') selected @endif>นักบิน/ผู้ช่วยนักบิน/แอร์โฮสเตส/สจ๊วต</option>
                            <option value="16" @if(isset($data['main_occupation']) && $data['main_occupation'] == '16') selected @endif>พนักงานประจำ , พนักงานรัฐวิสาหกิจ</option>
                            <option value="17" @if(isset($data['main_occupation']) && $data['main_occupation'] == '17') selected @endif>ลูกจ้างชั่วคราว , พนักงานสัญญาจ้าง</option>
                            <option value="18" @if(isset($data['main_occupation']) && $data['main_occupation'] == '18') selected @endif>บุคคลในวงการบันเทิง</option>
                            <option value="19" @if(isset($data['main_occupation']) && $data['main_occupation'] == '19') selected @endif>บุคคลในวงการกีฬา</option>
                            <option value="20" @if(isset($data['main_occupation']) && $data['main_occupation'] == '20') selected @endif>ผู้เกษียณที่ไม่ได้รับบำนาญ</option>
                            <option value="21" @if(isset($data['main_occupation']) && $data['main_occupation'] == '21') selected @endif>อื่นๆ </option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="nature_employment">ลักษณะการจ้างงาน</label>
                        <select id="nature_employment" class="w-full" name="nature_employment" required>
                            <option value="">เลือก</option>
                            <option value="1" @if(isset($data['nature_employment']) && $data['nature_employment'] == '1') selected @endif>ข้าราชการ</option>
                            <option value="2" @if(isset($data['nature_employment']) && $data['nature_employment'] == '2') selected @endif>พนักงานราชการ และลูกจ้างประจำอื่นๆของรัฐ</option>
                            <option value="3" @if(isset($data['nature_employment']) && $data['nature_employment'] == '3') selected @endif>ลูกจ้างชั่วคราว ของรัฐ</option>
                            <option value="4" @if(isset($data['nature_employment']) && $data['nature_employment'] == '4') selected @endif>ลูกจ้างประจำของรัฐวิสาหกิจและหน่วยงานที่เกี่ยวข้องกับภาครัฐ</option>
                            <option value="5" @if(isset($data['nature_employment']) && $data['nature_employment'] == '5') selected @endif>ลูกจ้างชั่วคราวของรัฐวิสาหกิจและหน่วยงานที่เกี่ยวข้องกับภาครัฐ</option>
                            <option value="6" @if(isset($data['nature_employment']) && $data['nature_employment'] == '6') selected @endif>ลูกจ้างประจำของเอกชน</option>
                            <option value="7" @if(isset($data['nature_employment']) && $data['nature_employment'] == '7') selected @endif>ลูกจ้างชั่วคราวของเอกชน</option>
                            <option value="8" @if(isset($data['nature_employment']) && $data['nature_employment'] == '8') selected @endif>งานส่วนตัว นายจ้าง</option>
                            <option value="9" @if(isset($data['nature_employment']) && $data['nature_employment'] == '9') selected @endif>งานส่วนตัว ผู้ประกอบธุรกิจของตัวเอง</option>
                            <option value="10" @if(isset($data['nature_employment']) && $data['nature_employment'] == '10') selected @endif>งานส่วนตัว สมาชิกของการรวมกลุ่มผู้ผลิต</option>
                            <option value="11" @if(isset($data['nature_employment']) && $data['nature_employment'] == '11') selected @endif>งานส่วนตัว ผู้ช่วยธุรกิจในครัวเรือน</option>
                            <option value="12" @if(isset($data['nature_employment']) && $data['nature_employment'] == '12') selected @endif>ผู้มีงานทำอื่นๆ</option>
                            <option value="13" @if(isset($data['nature_employment']) && $data['nature_employment'] == '13') selected @endif>ผู้ว่างงาน</option>
                            <option value="14" @if(isset($data['nature_employment']) && $data['nature_employment'] == '14') selected @endif>ทำงานบ้าน</option>
                            <option value="15" @if(isset($data['nature_employment']) && $data['nature_employment'] == '15') selected @endif>เรียนหนังสือ</option>
                            <option value="16" @if(isset($data['nature_employment']) && $data['nature_employment'] == '16') selected @endif>ผู้เกษียณรับบำนาญ</option>
                            <option value="17" @if(isset($data['nature_employment']) && $data['nature_employment'] == '17') selected @endif>ผู้เกษียณที่ไม่ได้รับบำนาญ</option>
                            <option value="18" @if(isset($data['nature_employment']) && $data['nature_employment'] == '18') selected @endif>ผู้ที่ไม่อยู่ในกำลังแรงงานอื่นๆ</option>
                        </select>
                    </div>

                    <script>
                        document.getElementById("main_occupation").addEventListener("input", function() {
                            var mainOccupationValue = this.value;
                            var natureEmploymentSelect = document.getElementById("nature_employment");

                            // // ล้างตัวเลือกทั้งหมดใน dropdown list "ลักษณะการจ้างงาน"
                            // natureEmploymentSelect.innerHTML = "<option value=''>เลือก</option>";

                            // เลือกตัวเลือกที่ต้องการให้แสดงโดยใช้ค่าจาก dropdown list "อาชีพหลัก"
                            switch (mainOccupationValue) {
                                case '1':
                                    selectsOption(['8'])
                                    break;
                                case '2':
                                    selectsOption(['9'])
                                    break;
                                case '3':
                                    selectsOption(['10'])
                                    break;
                                case '4':
                                    selectsOption(['11'])
                                    break;
                                case '5':
                                    selectsOption(['16'])
                                    break;
                                case '6':
                                    selectsOption(null)
                                    break;
                                case '7':
                                    selectsOption(['1'])
                                    break;
                                case '8':
                                    selectsOption(['1', '2', '3', '4', '5', '6', '7', '9', '10', '11'])
                                    break;
                                case '9':
                                    selectsOption(['1'])
                                    break;
                                case '10':
                                    selectsOption(['1', '2', '3', '4', '5', '6', '7'])
                                    break;
                                case '11':
                                    selectsOption(['1', '2', '3', '4', '5', '6', '7', '9', '10', '11'])
                                    break;
                                case '12':
                                    selectsOption(['1', '2', '3', '4', '5', '6', '7'])
                                    break;
                                case '13':
                                    selectsOption(['1', '2', '3', '4', '5', '6', '7'])
                                    break;
                                case '14':
                                    selectsOption(['1', '2', '3', '4', '5', '6', '7', '9', '10', '11'])
                                    break;
                                case '15':
                                    selectsOption(['1', '2', '3', '4', '5', '6', '7'])
                                    break;
                                case '16':
                                    selectsOption(['1', '2', '3', '4', '5', '6', '7'])
                                    break;
                                case '17':
                                    selectsOption(['1', '2', '3', '4', '5', '6', '7'])
                                    break;
                                case '18':
                                    selectsOption(['12'])
                                    break;
                                case '19':
                                    selectsOption(['12'])
                                    break;
                                case '20':
                                    selectsOption(['17'])
                                    break;
                                case '21':
                                    selectsOption(null)
                                    break;
                                default:
                                    selectsOption(null)
                                    break;
                            }
                        });


                        function selectsOption(selectOptions) {
                            var natureEmploymentSelect = document.getElementById("nature_employment");

                            // บังคับให้ dropdown list "nature_employment" มีค่าเป็น ""
                            natureEmploymentSelect.value = "";

                            // ล้างคลาส hidden ทั้งหมดในตัวเลือก
                            for (var i = 0; i < natureEmploymentSelect.options.length; i++) {
                                var option = natureEmploymentSelect.options[i];
                                option.classList.remove("hidden");
                            }

                            // ตรวจสอบค่า selectOptions ว่ามีค่าหรือไม่
                            if (selectOptions != null) {
                                // ลบคลาส hidden จากตัวเลือกที่ไม่ตรงกับ selectOptions
                                for (var i = 0; i < natureEmploymentSelect.options.length; i++) {
                                    var option = natureEmploymentSelect.options[i];
                                    if (selectOptions.indexOf(option.value) === -1) {
                                        option.classList.add("hidden");
                                    }
                                }
                            }
                        }
                    </script>

                    <div>
                        <label htmlFor="type_business">ประเภทธุรกิจขององค์กรหรือหน่วยงานที่ทำงานอยู่</label>
                        <select id="type_business" class="w-full" name="type_business" required>
                            <option value="">เลือก</option>
                            <option value="เกษตร" @if(isset($data['type_business']) && $data['type_business'] == 'เกษตร') selected @endif>เกษตร</option>
                            <option value="อุตสาหกรรมการผลิต" @if(isset($data['type_business']) && $data['type_business'] == 'อุตสาหกรรมการผลิต') selected @endif>อุตสาหกรรมการผลิต</option>
                            <option value="ก่อสร้าง" @if(isset($data['type_business']) && $data['type_business'] == 'ก่อสร้าง') selected @endif>ก่อสร้าง</option>
                            <option value="การค้า" @if(isset($data['type_business']) && $data['type_business'] == 'การค้า') selected @endif>การค้า</option>
                            <option value="บริการที่เกี่ยวกับการท่องเที่ยว" @if(isset($data['type_business']) && $data['type_business'] == 'บริการที่เกี่ยวกับการท่องเที่ยว') selected @endif>บริการที่เกี่ยวกับการท่องเที่ยว</option>
                            <option value="บริการทางการเงิน" @if(isset($data['type_business']) && $data['type_business'] == 'บริการทางการเงิน') selected @endif>บริการทางการเงิน</option>
                            <option value="บริการอสังหาริมทรัพย์" @if(isset($data['type_business']) && $data['type_business'] == 'บริการอสังหาริมทรัพย์') selected @endif>บริการอสังหาริมทรัพย์</option>
                            <option value="บริการอื่นๆ" @if(isset($data['type_business']) && $data['type_business'] == 'บริการอื่นๆ') selected @endif>บริการอื่นๆ</option>
                            <option value="องค์กรไม่แสวงหากำไร" @if(isset($data['type_business']) && $data['type_business'] == 'องค์กรไม่แสวงหากำไร') selected @endif>องค์กรไม่แสวงหากำไร</option>
                            <option value="การบริหารราชการ" @if(isset($data['type_business']) && $data['type_business'] == 'การบริหารราชการ') selected @endif>การบริหารราชการ</option>
                            <option value="อื่นๆ" @if(isset($data['type_business']) && $data['type_business'] == 'อื่นๆ') selected @endif>อื่นๆ</option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="main_income_per_month">รายได้หลักรวมต่อเดือน</label>
                        <div id="main_income_per_month" class="flex gap-3">
                            <input class="flex-1" type="number" name="main_income_per_month" value="{{ isset($data['main_income_per_month']) ? $data['main_income_per_month'] : '' }}" />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="additional_career">อาชีพเสริม (ถ้ามี)</label>
                        <select id="additional_career" class="w-full" name="additional_career">
                            <option value="">เลือก</option>
                            <option value="1" @if(isset($data['additional_career']) && $data['additional_career'] == '1') selected @endif>เจ้าของธุรกิจที่มีลูกจ้าง</option>
                            <option value="2" @if(isset($data['additional_career']) && $data['additional_career'] == '2') selected @endif>เจ้าของธุรกิจที่ไม่มีลูกจ้าง หรือ อาชีพอิสระ</option>
                            <option value="3" @if(isset($data['additional_career']) && $data['additional_career'] == '3') selected @endif>รวมกลุ่มกันเพื่อผลิตสินค้า/บริการ</option>
                            <option value="4" @if(isset($data['additional_career']) && $data['additional_career'] == '4') selected @endif>ผู้ช่วยธุรกิจในครัวเรือน (ไม่ได้รับค่าจ้าง)</option>
                            <option value="5" @if(isset($data['additional_career']) && $data['additional_career'] == '5') selected @endif>ข้าราชการบำนาญ</option>
                            <option value="6" @if(isset($data['additional_career']) && $data['additional_career'] == '6') selected @endif>นักการเมือง</option>
                            <option value="7" @if(isset($data['additional_career']) && $data['additional_career'] == '7') selected @endif>อัยการ/ตุลาการ/ผู้พิพากษา</option>
                            <option value="8" @if(isset($data['additional_career']) && $data['additional_career'] == '8') selected @endif>นักกฎหมายและผู้ใช้วิชาชีพทางกฎหมาย</option>
                            <option value="9" @if(isset($data['additional_career']) && $data['additional_career'] == '9') selected @endif>ทหาร/ตำรวจ</option>
                            <option value="10" @if(isset($data['additional_career']) && $data['additional_career'] == '10') selected @endif>ครู อาจารย์ และผู้ประกอบอาชีพการศึกษา (ยกเว้นติวเตอร์)</option>
                            <option value="11" @if(isset($data['additional_career']) && $data['additional_career'] == '11') selected @endif>แพทย์</option>
                            <option value="12" @if(isset($data['additional_career']) && $data['additional_career'] == '12') selected @endif>พยาบาล และผู้ประกอบการอาชีพที่เกี่ยวกับการแพทย์</option>
                            <option value="13" @if(isset($data['additional_career']) && $data['additional_career'] == '13') selected @endif>ข้าราชการอื่นๆ (ที่ไม่ใช่ข้อก่อนหน้า)</option>
                            <option value="14" @if(isset($data['additional_career']) && $data['additional_career'] == '14') selected @endif>วิศวกร/สถาปนิก</option>
                            <option value="15" @if(isset($data['additional_career']) && $data['additional_career'] == '15') selected @endif>นักบิน/ผู้ช่วยนักบิน/แอร์โฮสเตส/สจ๊วต</option>
                            <option value="16" @if(isset($data['additional_career']) && $data['additional_career'] == '16') selected @endif>พนักงานประจำ , พนักงานรัฐวิสาหกิจ</option>
                            <option value="17" @if(isset($data['additional_career']) && $data['additional_career'] == '17') selected @endif>ลูกจ้างชั่วคราว , พนักงานสัญญาจ้าง</option>
                            <option value="18" @if(isset($data['additional_career']) && $data['additional_career'] == '18') selected @endif>บุคคลในวงการบันเทิง</option>
                            <option value="19" @if(isset($data['additional_career']) && $data['additional_career'] == '19') selected @endif>บุคคลในวงการกีฬา</option>
                            <option value="20" @if(isset($data['additional_career']) && $data['additional_career'] == '20') selected @endif>ผู้เกษียณที่ไม่ได้รับบำนาญ</option>
                            <option value="21" @if(isset($data['additional_career']) && $data['additional_career'] == '21') selected @endif>อื่นๆ </option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="additional_career_income_per_month">รายได้เสริมรวมต่อเดือน (ถ้ามี)</label>
                        <div id="additional_career_income_per_month" class="flex gap-3">
                            <input class="flex-1" type="number" name="additional_career_income_per_month" @if(isset($data['faculty'])) value="{{ $data['faculty'] }}" @endif />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="number_institutions">จำนวนสถาบันทั้งหมดที่ปัจจุบันท่านกู้อยู่</label>
                        <select id="number_institutions" class="w-full" name="number_institutions" required>
                            <option value="">เลือก</option>
                            <option value="0" @if(isset($data['number_institutions']) && $data['number_institutions'] == '0') selected @endif>0</option>
                            <option value="1" @if(isset($data['number_institutions']) && $data['number_institutions'] == '1') selected @endif>1</option>
                            <option value="2" @if(isset($data['number_institutions']) && $data['number_institutions'] == '2') selected @endif>2</option>
                            <option value="3" @if(isset($data['number_institutions']) && $data['number_institutions'] == '3') selected @endif>3</option>
                            <option value="4" @if(isset($data['number_institutions']) && $data['number_institutions'] == '4') selected @endif>4</option>
                            <option value="5" @if(isset($data['number_institutions']) && $data['number_institutions'] == '5') selected @endif>5</option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="debt_burden_per_month">ภาระหนี้สินรวมต่อเดือน</label>
                        <div id="debt_burden_per_month" class="flex gap-3">
                            <input class="flex-1" type="number" name="debt_burden_per_month" @if(isset($data['debt_burden_per_month'])) value="{{ $data['debt_burden_per_month'] }}" @endif required />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="marital_status">สถานภาพสมรส</label>
                        <select id="marital_status" class="w-full" name="marital_status" required>
                            <option value="">เลือก</option>
                            <option value="หย่า,หม่าย" @if(isset($data['marital_status']) && $data['marital_status'] == 'หย่า,หม่าย') selected @endif>หย่า,หม่าย</option>
                            <option value="โสด" @if(isset($data['marital_status']) && $data['marital_status'] == 'โสด') selected @endif>โสด</option>
                            <option value="สมรสจดทะเบียน" @if(isset($data['marital_status']) && $data['marital_status'] == 'สมรสจดทะเบียน') selected @endif>สมรสจดทะเบียน</option>
                            <option value="สมรสไม่จดทะเบียน" @if(isset($data['marital_status']) && $data['marital_status'] == 'สมรสไม่จดทะเบียน') selected @endif>สมรสไม่จดทะเบียน</option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="person_under_patronage">จำนวนบุตร / บุคคลภายใต้การอุปการะ เช่น บิดา มารดา คู่สมรส เป็นต้น</label>
                        <select id="person_under_patronage" class="w-full" name="person_under_patronage" required>
                            <option value="">เลือก</option>
                            <option value="0" @if(isset($data['person_under_patronage']) && $data['person_under_patronage'] == '0') selected @endif>0</option>
                            <option value="1" @if(isset($data['person_under_patronage']) && $data['person_under_patronage'] == '1') selected @endif>1</option>
                            <option value="2" @if(isset($data['person_under_patronage']) && $data['person_under_patronage'] == '2') selected @endif>2</option>
                            <option value="3" @if(isset($data['person_under_patronage']) && $data['person_under_patronage'] == '3') selected @endif>3</option>
                            <option value="4" @if(isset($data['person_under_patronage']) && $data['person_under_patronage'] == '4') selected @endif>4</option>
                            <option value="5" @if(isset($data['person_under_patronage']) && $data['person_under_patronage'] == '5') selected @endif>5</option>
                        </select>
                    </div>


                    {{-- SUBMIT --}}

                    <div class="flex justify-center items-center gap-5">
                        <a href="{{ route('loan-form4') }}" class="bg-[#ef3026]/50 text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ย้อนกลับ</a>
                        <button class="bg-[#ef3026] text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ยืนยัน</button>
                    </div>


                </form>
            </div>
        </x-layouts.applyloan>
        <script src="{{ asset('js/preline.js') }}"></script>
        <script></script>
    </body>
</html>
