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
                <h1 class="text-2xl font-medium text-educationColor text-center mb-5 text-[#ef3026]">กรอกข้อมูลของนิสิต/นักศึกษา</h1>
                <ul class="text-educationColor text-lg list-disc pl-5 mb-5 text-[#ef3026]">
                    <li>กู้ได้เฉพาะนิสิต/นักศึกษาที่ลงทะเบียนเรียนกับมหาวิทยาลัยราชพฤกษ์เท่านั้น</li>
                    <li>กู้สำหรับค่าเล่าเรียนตลอดหลักสูตร โดยไม่สามารถยกเลิกระหว่างภาคการศึกษาได้</li>
                </ul>
                <form class="education-form" action="{{ route('loan-form1submit') }}" method="POST">
                    @csrf
                    <div>
                        <label htmlFor="name">ชื่อ-นามสกุล ของนิสิต/นักศึกษา</label>
                        <div id="name" class="flex gap-3 flex-wrap">
                            <select name="gender">
                                <option value="นาย" @if(isset($data['gender']) && $data['gender'] == 'นาย') selected @endif>นาย</option>
                                <option value="นาง" @if(isset($data['gender']) && $data['gender'] == 'นาง') selected @endif>นาง</option>
                                <option value="นางสาว" @if(isset($data['gender']) && $data['gender'] == 'นางสาว') selected @endif>นางสาว</option>
                            </select>
                            <input class="w-full md:w-auto flex-1" type="text" name="first_name" placeholder="ชื่อ" @if(isset($data['first_name'])) value="{{ $data['first_name'] }}" @endif required />
                            <input class="w-full md:w-auto md:flex-1" type="text" name="last_name" placeholder="นามสกุล" @if(isset($data['last_name'])) value="{{ $data['last_name'] }}" @endif required />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="id_card">เลขบัตรประจำตัวประชาชน ของนิสิต/นักศึกษา</label>
                        <div id="id_card" class="flex gap-3">
                            <input class="flex-1" type="number" name="id_card" name="id_card" placeholder="xxxxxxxxx" @if(isset($data['id_card'])) value="{{ $data['id_card'] }}" @endif required />
                        </div>
                    </div>


                    <div class="flex gap-3">
                        <div class="flex-1">
                            <label htmlFor="education_level">ระดับชั้นการศึกษา </label>
                            <select id="education_level" class="w-full" name="education_level" required>
                                <option value="">เลือก</option>
                                <option value="ประกาศนียบัตรบัณฑิต" @if(isset($data['education_level']) && $data['education_level'] == 'ประกาศนียบัตรบัณฑิต') selected @endif>ประกาศนียบัตรบัณฑิต</option>
                                <option value="ปริญญาโท" @if(isset($data['education_level']) && $data['education_level'] == 'ปริญญาโท') selected @endif>ปริญญาโท</option>
                                <option value="ปริญญาเอก" @if(isset($data['education_level']) && $data['education_level'] == 'ปริญญาเอก') selected @endif>ปริญญาเอก</option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <label htmlFor="education_lavel_year">ชั้นปีที่เริ่มกู้ </label>
                            <select id="education_lavel_year" class="w-full" name="education_lavel_year" required>
                                <option value="">เลือก</option>
                                <option value="1" @if(isset($data['education_lavel_year']) && $data['education_lavel_year'] == '1') selected @endif>1</option>
                                <option value="2" @if(isset($data['education_lavel_year']) && $data['education_lavel_year'] == '2') selected @endif>2</option>
                                <option value="3" @if(isset($data['education_lavel_year']) && $data['education_lavel_year'] == '3') selected @endif>3</option>
                                <option value="4" @if(isset($data['education_lavel_year']) && $data['education_lavel_year'] == '4') selected @endif>4</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <div class="flex-1">
                            <label htmlFor="education_sublevel">ภาคการศึกษาที่เริ่มกู้ </label>
                            <select id="education_sublevel" class="w-full" name="education_sublevel" required>
                                <option value="">เลือก</option>
                                <option value="ภาคเรียนที่1" @if(isset($data['education_sublevel']) && $data['education_sublevel'] == 'ภาคเรียนที่1') selected @endif>ภาคเรียนที่ 1</option>
                                <option value="ภาคเรียนที่2" @if(isset($data['education_sublevel']) && $data['education_sublevel'] == 'ภาคเรียนที่2') selected @endif>ภาคเรียนที่ 2</option>
                                <option value="ภาคฤดูร้อน" @if(isset($data['education_sublevel']) && $data['education_sublevel'] == 'ภาคฤดูร้อน') selected @endif>ภาคฤดูร้อน</option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <label htmlFor="education_year">ปีการศึกษาที่เริ่มกู้ </label>
                            <select id="education_year" class="w-full" name="education_year" required>
                                <option value="">เลือก</option>
                                <option value="2567" @if(isset($data['education_year']) && $data['education_year'] == '2567') selected @endif>2567</option>
                                {{-- <option value="2568" @if(isset($data['education_year']) && $data['education_year'] == '2568') selected @endif>2568</option>
                                <option value="2569" @if(isset($data['education_year']) && $data['education_year'] == '2569') selected @endif>2569</option>
                                <option value="2570" @if(isset($data['education_year']) && $data['education_year'] == '2570') selected @endif>2570</option>
                                <option value="2571" @if(isset($data['education_year']) && $data['education_year'] == '2571') selected @endif>2571</option> --}}
                            </select>
                        </div>
                    </div>

                    <div>
                        <label htmlFor="faculty">หลักสูตร</label>
                        <div id="faculty" class="flex gap-3">
                            {{-- <input class="flex-1" type="text" name="faculty" @if(isset($data['faculty'])) value="{{ $data['faculty'] }}" @endif /> --}}
                            <select id="faculty" class="w-full" name="faculty" required>
                                <option value="">เลือก</option>
                                <option value="หลักสูตรประกาศนียบัตรบัณฑิตวิชาชีพครู" @if(isset($data['faculty']) && $data['faculty'] == 'หลักสูตรประกาศนียบัตรบัณฑิตวิชาชีพครู') selected @endif>หลักสูตรประกาศนียบัตรบัณฑิตวิชาชีพครู</option>
                                <option value="หลักสูตรบัญชีมหาบัณฑิต (M.Acc.) - คณะบัญชี" @if(isset($data['faculty']) && $data['faculty'] == 'หลักสูตรบัญชีมหาบัณฑิต (M.Acc.) - คณะบัญชี') selected @endif>หลักสูตรบัญชีมหาบัณฑิต (M.Acc.) - คณะบัญชี</option>
                                <option value="หลักสูตรบริหารธุรกิจมหาบัณฑิต (M.B.A.) - คณะบริหารธุรกิจ" @if(isset($data['faculty']) && $data['faculty'] == 'หลักสูตรบริหารธุรกิจมหาบัณฑิต (M.B.A.) - คณะบริหารธุรกิจ') selected @endif>หลักสูตรบริหารธุรกิจมหาบัณฑิต (M.B.A.) - คณะบริหารธุรกิจ</option>
                                <option value="หลักสูตรศึกษาศาสตรมหาบัณฑิต (M.Ed.) - คณะศิลปศาสตร์" @if(isset($data['faculty']) && $data['faculty'] == 'หลักสูตรศึกษาศาสตรมหาบัณฑิต (M.Ed.) - คณะศิลปศาสตร์') selected @endif>หลักสูตรศึกษาศาสตรมหาบัณฑิต (M.Ed.) - คณะศิลปศาสตร์</option>
                                <option value="หลักสูตรปรัชญาดุษฎีบัณฑิต (Ph.D.) - คณะศิลปศาสตร์" @if(isset($data['faculty']) && $data['faculty'] == 'หลักสูตรปรัชญาดุษฎีบัณฑิต (Ph.D.) - คณะศิลปศาสตร์') selected @endif>หลักสูตรปรัชญาดุษฎีบัณฑิต (Ph.D.) - คณะศิลปศาสตร์</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label htmlFor="university">ชื่อสถานศึกษา</label>
                        <div id="university" class="flex gap-3">
                            {{-- <input class="flex-1" type="text" name="university" @if(isset($data['university'])) value="{{ $data['university'] }}" @endif /> --}}
                            <select id="university" class="w-full" name="university" required>
                                <option value="">เลือก</option>
                                <option value="มหาวิทยาลัยราชพฤกษ์" @if(isset($data['university']) && $data['university'] == 'มหาวิทยาลัยราชพฤกษ์') selected @endif>มหาวิทยาลัยราชพฤกษ์</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label htmlFor="amount">ค่าเล่าเรียนที่ต้องการกู้</label>
                        <div id="amount" class="flex gap-3">
                            <input class="flex-1" type="text" name="amount" @if(isset($data['amount'])) value="{{ $data['amount'] }}" @endif required />
                        </div>
                    </div>


                    <div class="flex justify-center items-center gap-5">
                        <a href="{{ route('loan-index') }}" class="bg-[#ef3026]/50 text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ย้อนกลับ</a>
                        <button type="submit" class="bg-[#ef3026] text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ยืนยัน</button>
                    </div>
                </form>
            </div>
        </x-layouts.applyloan>
        <script src="{{ asset('js/preline.js') }}"></script>
    </body>
</html>
