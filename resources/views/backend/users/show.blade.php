<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form class="form-editor">
                    <div>
                        <label htmlFor="name">ชื่อ-นามสกุล ของนิสิต/นักศึกษา</label>
                        <div id="name" class="flex gap-3 flex-wrap">
                            <select name="gender">
                                <option value="นาย" @if(isset($user->gender) && $user->gender == 'นาย') selected @endif>นาย</option>
                                <option value="นาง" @if(isset($user->gender) && $user->gender == 'นาง') selected @endif>นาง</option>
                                <option value="นางสาว" @if(isset($user->gender) && $user->gender == 'นางสาว') selected @endif>นางสาว</option>
                            </select>
                            <input class="w-full md:w-auto flex-1" type="text" name="first_name" placeholder="ชื่อ" @if(isset($user->first_name)) value="{{ $user->first_name }}" @endif required />
                            <input class="w-full md:w-auto md:flex-1" type="text" name="last_name" placeholder="นามสกุล" @if(isset($user->last_name)) value="{{ $user->last_name }}" @endif required />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="id_card">เลขบัตรประจำตัวประชาชน ของนิสิต/นักศึกษา</label>
                        <div id="id_card" class="flex gap-3">
                            <input class="flex-1" type="number" name="id_card" name="id_card" placeholder="xxxxxxxxx" @if(isset($user->id_card)) value="{{ $user->id_card }}" @endif required />
                        </div>
                    </div>


                    <div class="flex gap-3">
                        <div class="flex-1">
                            <label htmlFor="education_level">ระดับชั้นการศึกษา </label>
                            <select id="education_level" class="w-full" name="education_level" required>
                                <option value="">เลือก</option>
                                <option value="ประกาศนียบัตรบัณฑิต" @if(isset($user->education_level) && $user->education_level == 'ประกาศนียบัตรบัณฑิต') selected @endif>ประกาศนียบัตรบัณฑิต</option>
                                <option value="ปริญญาโท" @if(isset($user->education_level) && $user->education_level == 'ปริญญาโท') selected @endif>ปริญญาโท</option>
                                <option value="ปริญญาเอก" @if(isset($user->education_level) && $user->education_level == 'ปริญญาเอก') selected @endif>ปริญญาเอก</option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <label htmlFor="education_lavel_year">ชั้นปีที่เริ่มกู้ </label>
                            <select id="education_lavel_year" class="w-full" name="education_lavel_year" required>
                                <option value="">เลือก</option>
                                <option value="1" @if(isset($user->education_lavel_year) && $user->education_lavel_year == '1') selected @endif>1</option>
                                <option value="2" @if(isset($user->education_lavel_year) && $user->education_lavel_year == '2') selected @endif>2</option>
                                <option value="3" @if(isset($user->education_lavel_year) && $user->education_lavel_year == '3') selected @endif>3</option>
                                <option value="4" @if(isset($user->education_lavel_year) && $user->education_lavel_year == '4') selected @endif>4</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <div class="flex-1">
                            <label htmlFor="education_sublevel">ภาคการศึกษาที่เริ่มกู้ </label>
                            <select id="education_sublevel" class="w-full" name="education_sublevel" required>
                                <option value="">เลือก</option>
                                <option value="ภาคเรียนที่1" @if(isset($user->education_sublevel) && $user->education_sublevel == 'ภาคเรียนที่1') selected @endif>ภาคเรียนที่ 1</option>
                                <option value="ภาคเรียนที่2" @if(isset($user->education_sublevel) && $user->education_sublevel == 'ภาคเรียนที่2') selected @endif>ภาคเรียนที่ 2</option>
                                <option value="ภาคฤดูร้อน" @if(isset($user->education_sublevel) && $user->education_sublevel == 'ภาคฤดูร้อน') selected @endif>ภาคฤดูร้อน</option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <label htmlFor="education_year">ปีการศึกษาที่เริ่มกู้ </label>
                            <select id="education_year" class="w-full" name="education_year" required>
                                <option value="">เลือก</option>
                                <option value="2567" @if(isset($user->education_year) && $user->education_year == '2567') selected @endif>2567</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label htmlFor="faculty">หลักสูตร</label>
                        <div id="faculty" class="flex gap-3">
                            <select id="faculty" class="w-full" name="faculty" required>
                                <option value="">เลือก</option>
                                <option value="หลักสูตรประกาศนียบัตรบัณฑิตวิชาชีพครู" @if(isset($user->faculty) && $user->faculty == 'หลักสูตรประกาศนียบัตรบัณฑิตวิชาชีพครู') selected @endif>หลักสูตรประกาศนียบัตรบัณฑิตวิชาชีพครู</option>
                                <option value="หลักสูตรบัญชีมหาบัณฑิต (M.Acc.) - คณะบัญชี" @if(isset($user->faculty) && $user->faculty == 'หลักสูตรบัญชีมหาบัณฑิต (M.Acc.) - คณะบัญชี') selected @endif>หลักสูตรบัญชีมหาบัณฑิต (M.Acc.) - คณะบัญชี</option>
                                <option value="หลักสูตรบริหารธุรกิจมหาบัณฑิต (M.B.A.) - คณะบริหารธุรกิจ" @if(isset($user->faculty) && $user->faculty == 'หลักสูตรบริหารธุรกิจมหาบัณฑิต (M.B.A.) - คณะบริหารธุรกิจ') selected @endif>หลักสูตรบริหารธุรกิจมหาบัณฑิต (M.B.A.) - คณะบริหารธุรกิจ</option>
                                <option value="หลักสูตรศึกษาศาสตรมหาบัณฑิต (M.Ed.) - คณะศิลปศาสตร์" @if(isset($user->faculty) && $user->faculty == 'หลักสูตรศึกษาศาสตรมหาบัณฑิต (M.Ed.) - คณะศิลปศาสตร์') selected @endif>หลักสูตรศึกษาศาสตรมหาบัณฑิต (M.Ed.) - คณะศิลปศาสตร์</option>
                                <option value="หลักสูตรปรัชญาดุษฎีบัณฑิต (Ph.D.) - คณะศิลปศาสตร์" @if(isset($user->faculty) && $user->faculty == 'หลักสูตรปรัชญาดุษฎีบัณฑิต (Ph.D.) - คณะศิลปศาสตร์') selected @endif>หลักสูตรปรัชญาดุษฎีบัณฑิต (Ph.D.) - คณะศิลปศาสตร์</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label htmlFor="university">ชื่อสถานศึกษา</label>
                        <div id="university" class="flex gap-3">
                            <select id="university" class="w-full" name="university" required>
                                <option value="">เลือก</option>
                                <option value="มหาวิทยาลัยราชพฤกษ์" @if(isset($user->university) && $user->university == 'มหาวิทยาลัยราชพฤกษ์') selected @endif>มหาวิทยาลัยราชพฤกษ์</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label htmlFor="amount">ค่าเล่าเรียนที่ต้องการกู้</label>
                        <div id="amount" class="flex gap-3">
                            <input class="flex-1" type="text" name="amount" @if(isset($user->amount)) value="{{ $user->amount }}" @endif required />
                        </div>
                    </div>

                    {{-- ------------------------------------------------------------------------------------ --}}

                    <div class="w-full mb-10">
                        <div class="text-center mb-1">1.กรุณากรอกเบอร์มือถือ</div>
                        <div class="text-center"><input type="tel" id="telephone" name="telephone" class="block mx-auto w-[250px] border-gray-200 rounded-md" pattern="[0-9]{10}" @if(isset($user->telephone)) value="{{ $user->telephone }}" @endif required /></div>

                    </div>
                    <div class="w-full mb-2">
                        <div class="text-center mb-1">1.กรุณากรอกอีเมลของท่าน</div>
                        <div class="text-center"><input type="email" id="email" name="email" class="block mx-auto w-[250px] border-gray-200 rounded-md" @if(isset($user->email)) value="{{ $user->email }}" @endif required></div>
                    </div>

                    {{-- ------------------------------------------------------------------------------------ --}}

                    <div>
                        <label htmlFor="address">บ้านเลขที่/ชื่อหมู่บ้าน-คอนโด/ถนน</label>
                        <div class="flex gap-3">
                            <input class="flex-1" type="text" name="address" id="address" @if(isset($user->address)) value="{{ $user->address }}" @endif required />
                        </div>
                    </div>

                    {{--  --}}

                    <h2 class="text-2xl font-medium text-educationColor text-center mb-0 text-[#ef3026]">ที่อยู่ปัจจุบัน</h2>


                    <div>
                        <label htmlFor="address_present">บ้านเลขที่/ชื่อหมู่บ้าน-คอนโด/ถนน</label>
                        <div class="flex gap-3">
                            <input class="flex-1" type="text" name="address_present" id="address_present" @if(isset($user->address_present)) value="{{ $user->address_present }}" @endif required />
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

                    {{--  --}}

                    <h2 class="text-2xl font-medium text-educationColor text-center mb-0 text-[#ef3026]">ที่อยู่จัดส่งเอกสาร</h2>
                    <div>
                        <label htmlFor="address_delivery">บ้านเลขที่/ชื่อหมู่บ้าน-คอนโด/ถนน</label>
                        <div class="flex gap-3">
                            <input class="flex-1" type="text" name="address_delivery" id="address_delivery" @if(isset($user->address_delivery)) value="{{ $user->address_delivery }}" @endif required />
                        </div>
                    </div>

                    {{-- ------------------------------------------------------------------------------------ --}}

                    <div>
                        <label htmlFor="main_occupation">อาชีพหลัก</label>
                        <select id="main_occupation" class="w-full" name="main_occupation" required>
                            <option value="">เลือก</option>
                            <option value="1" @if(isset($user->main_occupation) && $user->main_occupation == '1') selected @endif>เจ้าของธุรกิจที่มีลูกจ้าง</option>
                            <option value="2" @if(isset($user->main_occupation) && $user->main_occupation == '2') selected @endif>เจ้าของธุรกิจที่ไม่มีลูกจ้าง หรือ อาชีพอิสระ</option>
                            <option value="3" @if(isset($user->main_occupation) && $user->main_occupation == '3') selected @endif>รวมกลุ่มกันเพื่อผลิตสินค้า/บริการ</option>
                            <option value="4" @if(isset($user->main_occupation) && $user->main_occupation == '4') selected @endif>ผู้ช่วยธุรกิจในครัวเรือน (ไม่ได้รับค่าจ้าง)</option>
                            <option value="5" @if(isset($user->main_occupation) && $user->main_occupation == '5') selected @endif>ข้าราชการบำนาญ</option>
                            <option value="6" @if(isset($user->main_occupation) && $user->main_occupation == '6') selected @endif>นักการเมือง</option>
                            <option value="7" @if(isset($user->main_occupation) && $user->main_occupation == '7') selected @endif>อัยการ/ตุลาการ/ผู้พิพากษา</option>
                            <option value="8" @if(isset($user->main_occupation) && $user->main_occupation == '8') selected @endif>นักกฎหมายและผู้ใช้วิชาชีพทางกฎหมาย</option>
                            <option value="9" @if(isset($user->main_occupation) && $user->main_occupation == '9') selected @endif>ทหาร/ตำรวจ</option>
                            <option value="10" @if(isset($user->main_occupation) && $user->main_occupation == '10') selected @endif>ครู อาจารย์ และผู้ประกอบอาชีพการศึกษา (ยกเว้นติวเตอร์)</option>
                            <option value="11" @if(isset($user->main_occupation) && $user->main_occupation == '11') selected @endif>แพทย์</option>
                            <option value="12" @if(isset($user->main_occupation) && $user->main_occupation == '12') selected @endif>พยาบาล และผู้ประกอบการอาชีพที่เกี่ยวกับการแพทย์</option>
                            <option value="13" @if(isset($user->main_occupation) && $user->main_occupation == '13') selected @endif>ข้าราชการอื่นๆ (ที่ไม่ใช่ข้อก่อนหน้า)</option>
                            <option value="14" @if(isset($user->main_occupation) && $user->main_occupation == '14') selected @endif>วิศวกร/สถาปนิก</option>
                            <option value="15" @if(isset($user->main_occupation) && $user->main_occupation == '15') selected @endif>นักบิน/ผู้ช่วยนักบิน/แอร์โฮสเตส/สจ๊วต</option>
                            <option value="16" @if(isset($user->main_occupation) && $user->main_occupation == '16') selected @endif>พนักงานประจำ , พนักงานรัฐวิสาหกิจ</option>
                            <option value="17" @if(isset($user->main_occupation) && $user->main_occupation == '17') selected @endif>ลูกจ้างชั่วคราว , พนักงานสัญญาจ้าง</option>
                            <option value="18" @if(isset($user->main_occupation) && $user->main_occupation == '18') selected @endif>บุคคลในวงการบันเทิง</option>
                            <option value="19" @if(isset($user->main_occupation) && $user->main_occupation == '19') selected @endif>บุคคลในวงการกีฬา</option>
                            <option value="20" @if(isset($user->main_occupation) && $user->main_occupation == '20') selected @endif>ผู้เกษียณที่ไม่ได้รับบำนาญ</option>
                            <option value="21" @if(isset($user->main_occupation) && $user->main_occupation == '21') selected @endif>อื่นๆ </option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="nature_employment">ลักษณะการจ้างงาน</label>
                        <select id="nature_employment" class="w-full" name="nature_employment" required>
                            <option value="">เลือก</option>
                            <option value="1" @if(isset($user->nature_employment) && $user->nature_employment == '1') selected @endif>ข้าราชการ</option>
                            <option value="2" @if(isset($user->nature_employment) && $user->nature_employment == '2') selected @endif>พนักงานราชการ และลูกจ้างประจำอื่นๆของรัฐ</option>
                            <option value="3" @if(isset($user->nature_employment) && $user->nature_employment == '3') selected @endif>ลูกจ้างชั่วคราว ของรัฐ</option>
                            <option value="4" @if(isset($user->nature_employment) && $user->nature_employment == '4') selected @endif>ลูกจ้างประจำของรัฐวิสาหกิจและหน่วยงานที่เกี่ยวข้องกับภาครัฐ</option>
                            <option value="5" @if(isset($user->nature_employment) && $user->nature_employment == '5') selected @endif>ลูกจ้างชั่วคราวของรัฐวิสาหกิจและหน่วยงานที่เกี่ยวข้องกับภาครัฐ</option>
                            <option value="6" @if(isset($user->nature_employment) && $user->nature_employment == '6') selected @endif>ลูกจ้างประจำของเอกชน</option>
                            <option value="7" @if(isset($user->nature_employment) && $user->nature_employment == '7') selected @endif>ลูกจ้างชั่วคราวของเอกชน</option>
                            <option value="8" @if(isset($user->nature_employment) && $user->nature_employment == '8') selected @endif>งานส่วนตัว นายจ้าง</option>
                            <option value="9" @if(isset($user->nature_employment) && $user->nature_employment == '9') selected @endif>งานส่วนตัว ผู้ประกอบธุรกิจของตัวเอง</option>
                            <option value="10" @if(isset($user->nature_employment) && $user->nature_employment == '10') selected @endif>งานส่วนตัว สมาชิกของการรวมกลุ่มผู้ผลิต</option>
                            <option value="11" @if(isset($user->nature_employment) && $user->nature_employment == '11') selected @endif>งานส่วนตัว ผู้ช่วยธุรกิจในครัวเรือน</option>
                            <option value="12" @if(isset($user->nature_employment) && $user->nature_employment == '12') selected @endif>ผู้มีงานทำอื่นๆ</option>
                            <option value="13" @if(isset($user->nature_employment) && $user->nature_employment == '13') selected @endif>ผู้ว่างงาน</option>
                            <option value="14" @if(isset($user->nature_employment) && $user->nature_employment == '14') selected @endif>ทำงานบ้าน</option>
                            <option value="15" @if(isset($user->nature_employment) && $user->nature_employment == '15') selected @endif>เรียนหนังสือ</option>
                            <option value="16" @if(isset($user->nature_employment) && $user->nature_employment == '16') selected @endif>ผู้เกษียณรับบำนาญ</option>
                            <option value="17" @if(isset($user->nature_employment) && $user->nature_employment == '17') selected @endif>ผู้เกษียณที่ไม่ได้รับบำนาญ</option>
                            <option value="18" @if(isset($user->nature_employment) && $user->nature_employment == '18') selected @endif>ผู้ที่ไม่อยู่ในกำลังแรงงานอื่นๆ</option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="type_business">ประเภทธุรกิจขององค์กรหรือหน่วยงานที่ทำงานอยู่</label>
                        <select id="type_business" class="w-full" name="type_business" required>
                            <option value="">เลือก</option>
                            <option value="เกษตร" @if(isset($user->type_business) && $user->type_business == 'เกษตร') selected @endif>เกษตร</option>
                            <option value="อุตสาหกรรมการผลิต" @if(isset($user->type_business) && $user->type_business == 'อุตสาหกรรมการผลิต') selected @endif>อุตสาหกรรมการผลิต</option>
                            <option value="ก่อสร้าง" @if(isset($user->type_business) && $user->type_business == 'ก่อสร้าง') selected @endif>ก่อสร้าง</option>
                            <option value="การค้า" @if(isset($user->type_business) && $user->type_business == 'การค้า') selected @endif>การค้า</option>
                            <option value="บริการที่เกี่ยวกับการท่องเที่ยว" @if(isset($user->type_business) && $user->type_business == 'บริการที่เกี่ยวกับการท่องเที่ยว') selected @endif>บริการที่เกี่ยวกับการท่องเที่ยว</option>
                            <option value="บริการทางการเงิน" @if(isset($user->type_business) && $user->type_business == 'บริการทางการเงิน') selected @endif>บริการทางการเงิน</option>
                            <option value="บริการอสังหาริมทรัพย์" @if(isset($user->type_business) && $user->type_business == 'บริการอสังหาริมทรัพย์') selected @endif>บริการอสังหาริมทรัพย์</option>
                            <option value="บริการอื่นๆ" @if(isset($user->type_business) && $user->type_business == 'บริการอื่นๆ') selected @endif>บริการอื่นๆ</option>
                            <option value="องค์กรไม่แสวงหากำไร" @if(isset($user->type_business) && $user->type_business == 'องค์กรไม่แสวงหากำไร') selected @endif>องค์กรไม่แสวงหากำไร</option>
                            <option value="การบริหารราชการ" @if(isset($user->type_business) && $user->type_business == 'การบริหารราชการ') selected @endif>การบริหารราชการ</option>
                            <option value="อื่นๆ" @if(isset($user->type_business) && $user->type_business == 'อื่นๆ') selected @endif>อื่นๆ</option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="main_income_per_month">รายได้หลักรวมต่อเดือน</label>
                        <div id="main_income_per_month" class="flex gap-3">
                            <input class="flex-1" type="number" name="main_income_per_month" value="{{ isset($user->main_income_per_month) ? $user->main_income_per_month : '' }}" />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="additional_career">อาชีพเสริม (ถ้ามี)</label>
                        <select id="additional_career" class="w-full" name="additional_career">
                            <option value="">เลือก</option>
                            <option value="1" @if(isset($user->additional_career) && $user->additional_career == '1') selected @endif>เจ้าของธุรกิจที่มีลูกจ้าง</option>
                            <option value="2" @if(isset($user->additional_career) && $user->additional_career == '2') selected @endif>เจ้าของธุรกิจที่ไม่มีลูกจ้าง หรือ อาชีพอิสระ</option>
                            <option value="3" @if(isset($user->additional_career) && $user->additional_career == '3') selected @endif>รวมกลุ่มกันเพื่อผลิตสินค้า/บริการ</option>
                            <option value="4" @if(isset($user->additional_career) && $user->additional_career == '4') selected @endif>ผู้ช่วยธุรกิจในครัวเรือน (ไม่ได้รับค่าจ้าง)</option>
                            <option value="5" @if(isset($user->additional_career) && $user->additional_career == '5') selected @endif>ข้าราชการบำนาญ</option>
                            <option value="6" @if(isset($user->additional_career) && $user->additional_career == '6') selected @endif>นักการเมือง</option>
                            <option value="7" @if(isset($user->additional_career) && $user->additional_career == '7') selected @endif>อัยการ/ตุลาการ/ผู้พิพากษา</option>
                            <option value="8" @if(isset($user->additional_career) && $user->additional_career == '8') selected @endif>นักกฎหมายและผู้ใช้วิชาชีพทางกฎหมาย</option>
                            <option value="9" @if(isset($user->additional_career) && $user->additional_career == '9') selected @endif>ทหาร/ตำรวจ</option>
                            <option value="10" @if(isset($user->additional_career) && $user->additional_career == '10') selected @endif>ครู อาจารย์ และผู้ประกอบอาชีพการศึกษา (ยกเว้นติวเตอร์)</option>
                            <option value="11" @if(isset($user->additional_career) && $user->additional_career == '11') selected @endif>แพทย์</option>
                            <option value="12" @if(isset($user->additional_career) && $user->additional_career == '12') selected @endif>พยาบาล และผู้ประกอบการอาชีพที่เกี่ยวกับการแพทย์</option>
                            <option value="13" @if(isset($user->additional_career) && $user->additional_career == '13') selected @endif>ข้าราชการอื่นๆ (ที่ไม่ใช่ข้อก่อนหน้า)</option>
                            <option value="14" @if(isset($user->additional_career) && $user->additional_career == '14') selected @endif>วิศวกร/สถาปนิก</option>
                            <option value="15" @if(isset($user->additional_career) && $user->additional_career == '15') selected @endif>นักบิน/ผู้ช่วยนักบิน/แอร์โฮสเตส/สจ๊วต</option>
                            <option value="16" @if(isset($user->additional_career) && $user->additional_career == '16') selected @endif>พนักงานประจำ , พนักงานรัฐวิสาหกิจ</option>
                            <option value="17" @if(isset($user->additional_career) && $user->additional_career == '17') selected @endif>ลูกจ้างชั่วคราว , พนักงานสัญญาจ้าง</option>
                            <option value="18" @if(isset($user->additional_career) && $user->additional_career == '18') selected @endif>บุคคลในวงการบันเทิง</option>
                            <option value="19" @if(isset($user->additional_career) && $user->additional_career == '19') selected @endif>บุคคลในวงการกีฬา</option>
                            <option value="20" @if(isset($user->additional_career) && $user->additional_career == '20') selected @endif>ผู้เกษียณที่ไม่ได้รับบำนาญ</option>
                            <option value="21" @if(isset($user->additional_career) && $user->additional_career == '21') selected @endif>อื่นๆ </option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="additional_career_income_per_month">รายได้เสริมรวมต่อเดือน (ถ้ามี)</label>
                        <div id="additional_career_income_per_month" class="flex gap-3">
                            <input class="flex-1" type="number" name="additional_career_income_per_month" @if(isset($user->faculty)) value="{{ $user->faculty }}" @endif />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="number_institutions">จำนวนสถาบันทั้งหมดที่ปัจจุบันท่านกู้อยู่</label>
                        <select id="number_institutions" class="w-full" name="number_institutions" required>
                            <option value="">เลือก</option>
                            <option value="0" @if(isset($user->number_institutions) && $user->number_institutions == '0') selected @endif>0</option>
                            <option value="1" @if(isset($user->number_institutions) && $user->number_institutions == '1') selected @endif>1</option>
                            <option value="2" @if(isset($user->number_institutions) && $user->number_institutions == '2') selected @endif>2</option>
                            <option value="3" @if(isset($user->number_institutions) && $user->number_institutions == '3') selected @endif>3</option>
                            <option value="4" @if(isset($user->number_institutions) && $user->number_institutions == '4') selected @endif>4</option>
                            <option value="5" @if(isset($user->number_institutions) && $user->number_institutions == '5') selected @endif>5</option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="debt_burden_per_month">ภาระหนี้สินรวมต่อเดือน</label>
                        <div id="debt_burden_per_month" class="flex gap-3">
                            <input class="flex-1" type="number" name="debt_burden_per_month" @if(isset($user->debt_burden_per_month)) value="{{ $user->debt_burden_per_month }}" @endif required />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="marital_status">สถานภาพสมรส</label>
                        <select id="marital_status" class="w-full" name="marital_status" required>
                            <option value="">เลือก</option>
                            <option value="หย่า,หม่าย" @if(isset($user->marital_status) && $user->marital_status == 'หย่า,หม่าย') selected @endif>หย่า,หม่าย</option>
                            <option value="โสด" @if(isset($user->marital_status) && $user->marital_status == 'โสด') selected @endif>โสด</option>
                            <option value="สมรสจดทะเบียน" @if(isset($user->marital_status) && $user->marital_status == 'สมรสจดทะเบียน') selected @endif>สมรสจดทะเบียน</option>
                            <option value="สมรสไม่จดทะเบียน" @if(isset($user->marital_status) && $user->marital_status == 'สมรสไม่จดทะเบียน') selected @endif>สมรสไม่จดทะเบียน</option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="person_under_patronage">จำนวนบุตร / บุคคลภายใต้การอุปการะ เช่น บิดา มารดา คู่สมรส เป็นต้น</label>
                        <select id="person_under_patronage" class="w-full" name="person_under_patronage" required>
                            <option value="">เลือก</option>
                            <option value="0" @if(isset($user->person_under_patronage) && $user->person_under_patronage == '0') selected @endif>0</option>
                            <option value="1" @if(isset($user->person_under_patronage) && $user->person_under_patronage == '1') selected @endif>1</option>
                            <option value="2" @if(isset($user->person_under_patronage) && $user->person_under_patronage == '2') selected @endif>2</option>
                            <option value="3" @if(isset($user->person_under_patronage) && $user->person_under_patronage == '3') selected @endif>3</option>
                            <option value="4" @if(isset($user->person_under_patronage) && $user->person_under_patronage == '4') selected @endif>4</option>
                            <option value="5" @if(isset($user->person_under_patronage) && $user->person_under_patronage == '5') selected @endif>5</option>
                        </select>
                    </div>


                    {{-- ------------------------------------------------------------------------------------ --}}

                    <div>
                        <label htmlFor="reference_name">ชื่อ - นามสกุล</label>
                        <div id="reference_name" class="flex gap-3">
                            <input class="flex-1" type="text" name="reference_name"  @if(isset($user->reference_name)) value="{{ $user->reference_name }}" @endif required />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="reference_type">ความสัมพันธ์</label>
                        <select id="reference_type" class="w-full" name="reference_type" required>
                            <option value="0" @if(isset($user->reference_type) && $user->reference_type == '0') selected @endif>บิดา/มารดา</option>
                            <option value="1" @if(isset($user->reference_type) && $user->reference_type == '1') selected @endif>พี่/น้อง ร่วมบิดามารดา</option>
                            <option value="2" @if(isset($user->reference_type) && $user->reference_type == '2') selected @endif>ปู่/ย่า/ตา/ยาย</option>
                            <option value="3" @if(isset($user->reference_type) && $user->reference_type == '3') selected @endif>ลุง/ป้า/น้า/อา</option>
                            <option value="4" @if(isset($user->reference_type) && $user->reference_type == '4') selected @endif>ญาติอื่นๆ</option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="reference_tel">เบอร์มือถือ</label>
                        <div id="reference_tel" class="flex gap-3">
                            <input class="flex-1" type="tel" name="reference_tel" @if(isset($user->reference_tel)) value="{{ $user->reference_tel }}" @endif required />
                        </div>
                    </div>

                    {{-- ------------------------------------------------------------------------------------ --}}


                    {{-- ------------------------------------------------------------------------------------ --}}


                    {{-- ------------------------------------------------------------------------------------ --}}

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
