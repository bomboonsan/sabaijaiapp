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
                <h1 class="text-2xl font-medium text-educationColor text-center mb-0 text-[#ef3026]">
                    กรอกข้อมูลบุคคลอ้างอิง
                </h1>
                <h2 class="text-lg font-medium text-educationColor text-center mb-5 text-[#ef3026]">
                    เป็นบุคคลที่สามารถติดต่อได้ (เฉพาะญาติเท่านั้น)
                </h2>
                <form class="education-form" action="{{ route('loan-form7submit') }}" method="POST">
                    @csrf

                    <div>
                        <label htmlFor="reference_name">ชื่อ - นามสกุล</label>
                        <div id="reference_name" class="flex gap-3">
                            <input class="flex-1" type="text" name="reference_name"  @if(isset($data['reference_name'])) value="{{ $data['reference_name'] }}" @endif required />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="reference_type">ความสัมพันธ์</label>
                        <select id="reference_type" class="w-full" name="reference_type" required>
                            <option value="0" @if(isset($data['reference_type']) && $data['reference_type'] == '0') selected @endif>บิดา/มารดา</option>
                            <option value="1" @if(isset($data['reference_type']) && $data['reference_type'] == '1') selected @endif>พี่/น้อง ร่วมบิดามารดา</option>
                            <option value="2" @if(isset($data['reference_type']) && $data['reference_type'] == '2') selected @endif>ปู่/ย่า/ตา/ยาย</option>
                            <option value="3" @if(isset($data['reference_type']) && $data['reference_type'] == '3') selected @endif>ลุง/ป้า/น้า/อา</option>
                            <option value="4" @if(isset($data['reference_type']) && $data['reference_type'] == '4') selected @endif>ญาติอื่นๆ</option>
                        </select>
                    </div>

                    <div>
                        <label htmlFor="reference_tel">เบอร์มือถือ</label>
                        <div id="reference_tel" class="flex gap-3">
                            <input class="flex-1" type="tel" name="reference_tel" @if(isset($data['reference_tel'])) value="{{ $data['reference_tel'] }}" @endif required />
                        </div>
                    </div>


                    {{-- SUBMIT --}}

                    <div class="flex justify-center items-center gap-5">
                        <a href="{{ route('loan-form6') }}" class="bg-[#ef3026]/50 text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ย้อนกลับ</a>
                        <button class="bg-[#ef3026] text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ยืนยัน</button>
                    </div>


                </form>
            </div>
        </x-layouts.applyloan>
        <script src="{{ asset('js/preline.js') }}"></script>
    </body>
</html>
