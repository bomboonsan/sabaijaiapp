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
                    แนบเอกสารประกอบการขอสินเชื่อของผู้กู้
                </h1>
                <form class="education-form" action="{{ route('loan-form8submit') }}" method="POST">
                    @csrf

                    <div>
                        <label for="latest_payslip"">สลิปเงินเดือนล่าสุด/หนังสือรับรองเงินเดือน(ถ้ามี)</label>
                        <input
                        accept="image/*,.pdf,.csv"
                        type="file"
                        name="latest_payslip"
                        id="latest_payslip"
                        class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                            file:bg-gray-50 file:border-0
                            file:me-4
                            file:py-2 file:px-4
                            dark:file:bg-gray-700 dark:file:text-gray-400"
                        >
                    </div>

                    <div class="pt-2 pb-1">
                        <hr />
                    </div>

                    <div>
                        <label for="salary_statement">สเตทเม้นท์ 6 เดือนล่าสุด</label>
                        <input
                        accept="image/*,.pdf,.csv"
                        multiple
                        type="file"
                        name="salary_statement"
                        id="salary_statement"
                        class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                            file:bg-gray-50 file:border-0
                            file:me-4
                            file:py-2 file:px-4
                            dark:file:bg-gray-700 dark:file:text-gray-400"
                        >
                        <span class="text-sm text-red-600">
                            เลือกได้สูงสุด 12 ไฟล์
                        </span>
                    </div>

                    <h2 class="text-2xl font-medium text-educationColor text-center mb-5 text-[#ef3026]">
                        เอกสารประกอบการขอสินเชื่อ
                        ของนิสิต/นักศึกษา
                    </h2>

                    <div>
                        <label for="transcript">ทรานสคริปต์ปริญญาตรี หรือ ใบรับรองจบการศึกษาระดับปริญญาตรี</label>
                        <input
                        accept="image/*,.pdf,.csv"
                        type="file"
                        name="transcript"
                        id="transcript"
                        class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                            file:bg-gray-50 file:border-0
                            file:me-4
                            file:py-2 file:px-4
                            dark:file:bg-gray-700 dark:file:text-gray-400"
                        >

                    </div>

                    {{-- SUBMIT --}}

                    <div class="flex justify-center items-center gap-5">
                        <a href="{{ route('loan-form7') }}" class="bg-[#ef3026]/50 text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ย้อนกลับ</a>
                        <button class="bg-[#ef3026] text-white py-3 px-5 rounded-lg min-w-[150px] text-center">ส่งใบสมัครและแอดไลน์</button>
                    </div>


                </form>
            </div>
        </x-layouts.applyloan>
        <script src="{{ asset('js/preline.js') }}"></script>
        <script>
            // max file 10 file for upload in #salary_statement
            const salary_statement = document.querySelector('#salary_statement');
            const maxFile = 12;
            salary_statement.document.addEventListener('change', (event) => {
                if (event.target.files.length > maxFile) {
                    alert('เลือกได้สูงสุด ' + maxFile + ' ไฟล์');
                    event.target.value = '';
                }
            })
        </script>
    </body>
</html>
