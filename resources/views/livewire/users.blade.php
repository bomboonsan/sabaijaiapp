<div>
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">วันที่กดส่งใบสมัคร</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">เวลา</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">App no.</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">ชื่อ-นามสกุล</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Remark</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">ผลนุมัติ</th>
                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($users as $user)
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                    {{ $user->created_at->format('d/m/Y') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                    {{ $user->created_at->format('H:i') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                    {{ $user->apply_id }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                    {{ $user->gender }} {{ $user->first_name }} {{ $user->last_name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                    {{-- Remark --}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                    {{-- ผลนุมัติ --}}
                    <p class="btn-apply-status btn-status-{{ $user->apply_status }}">
                        {{ $user->apply_status_name }}
                    </p>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <button
                        wire:click.prevent="modal({{ $user->id }})"
                        {{-- wire:model="typeSelect"
                        wire:input="search" --}}
                        {{-- type="button" --}}
                        class="p-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-vertically-centered-modal"
                    >
                        <i class="fa-solid fa-user-pen"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Modal --}}
    <div id="backdrop" class="absolute left-0 top-0 w-full h-full bg-gray-900/50 {{ $isOpenModal ? 'block' : 'hidden' }}">
    {{-- <div id="backdrop" class="absolute left-0 top-0 w-full h-full bg-gray-900/50 block"> --}}
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-auto">
            <div id="closeModel" class="absolute -right-2 -top-2 p-5">
                <button
                    wire:click.prevent="closeModal"
                    class="px-3 py-2 inline-flex items-center gap-x-2 text-sm font-semibold rounded-xl border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none"
                >
                    <i class="fa-solid fa-xmark text-xl text-white"></i>
                </button>
            </div>
            <div class="w-full p-5 bg-white shadow-md whitespace-normal">
                <div class="flex gap-4">
                    <div class="flex-1">
                        <p>
                            วันที่ {{ $modalUser->created_at->format('d/m/Y') }} เวลา {{ $modalUser->created_at->format('H:i') }}
                        </p>
                        <p>
                            APP ID : {{ $modalUser->apply_id }}
                        </p>
                        <p>
                            {{ $modalUser->gender }} {{ $modalUser->first_name }} {{ $modalUser->last_name }}
                        </p>
                        <p>
                            <a href="#" class="text-red-600 hover:text-red-700 font-medium">แก้ไขข้อมูลลูกค้า</a>
                        </p>
                        <p>
                            <a href="#" class="text-red-600 hover:text-red-700 font-medium">แนบเอกสารเพิ่มเติม</a>
                        </p>
                        <div class="flex items-center gap-4">
                            <p>
                                สถานะ :
                            </p>
                            <p class="btn-apply-status btn-status-{{ $modalUser->apply_status }}">
                                {{ $apply_status_name }}
                            </p>
                        </div>
                    </div>
                    <div class="flex-1">
                        <p>
                            Remark
                        </p>
                        <textarea name="remark" id="remark" cols="30" rows="3">
                            {{ $modalUser->remark }}
                        </textarea>
                    </div>
                </div>
            </div>
            {{--  --}}
            <div class="w-full p-5 bg-white shadow-md whitespace-normal">
                <h3 class="text-3xl font-bold text-black mb-3">แก้ไขสถานะลูกค้า</h3>
                <form wire:submit="updateApplyStatus({{ $modalUser->id }})" class="flex gap-4 items-center">
                    <div class="flex-initial">
                        <p>
                            สถานะ :
                        </p>
                    </div>
                    <div class="flex-initial">
                        <select
                            wire:input="updateState"
                            wire:model="newApplyStatus"
                            class="border-neutral-500/20 rounded-xl text-sm px-6"
                        >
                            @foreach ($list_apply_status as $key => $value)
                                <option value="{{ $key }}" @if ($key == $modalUser->apply_status) selected @endif>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-initial">
                        <button type="submit" class="px-3 py-2 inline-flex items-center gap-x-2 text-sm font-semibold rounded-xl border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                            ยืนยัน
                        </button>
                    </div>
                </form>
            </div>
            {{--  --}}
            <div class="w-full p-5 bg-white shadow-md whitespace-normal">
                <h3 class="text-3xl font-bold text-black mb-3">ใส่ข้อมูลสำหรับออกสัญญากู้ยืม</h3>
                <h4 class="text-xl font-semibold text-black mb-2">สัญญาที่ 1</h4>
                <form wire:submit="updateApplyData({{ $modalUser->id }})">
                    <div class="grid grid-cols-3 gap-5">
                        <div class="box">
                            <label for="" class="mb-1 text-sm text-neutral-800 px-2">เลขที่สัญญา</label>
                            <input
                                value="{{ $modalUser->apply_id }}"
                                type="text"
                                class="w-full border border-neutral-500/60 rounded-xl px-3 py-1 text-neutral-600"
                            >
                            {{-- <input type="text" wire:model="new_apply_id"> --}}
                        </div>
                        <div class="box">
                            <label for="" class="mb-1 text-sm text-neutral-800 px-2">วันที่ทำสัญญา</label>
                            <input
                                value="{{ $modalUser->created_at->format('d/m/Y') }}"
                                type="text"
                                class="w-full border border-neutral-500/60 rounded-xl px-3 py-1 text-neutral-600"
                            >
                        </div>
                        <div class="box">
                            <label for="" class="mb-1 text-sm text-neutral-800 px-2">ชั้นปีที่</label>
                            <input
                                value="{{ $modalUser->education_lavel_year }}"
                                type="number"
                                class="w-full border border-neutral-500/60 rounded-xl px-3 py-1 text-neutral-600"
                            >
                        </div>
                        <div class="box">
                            <label for="" class="mb-1 text-sm text-neutral-800 px-2">ปีการศึกษา</label>
                            <input
                                value="{{ $modalUser->education_year }}"
                                type="text"
                                class="w-full border border-neutral-500/60 rounded-xl px-3 py-1 text-neutral-600"
                            >
                        </div>
                        <div class="box">
                            <label for="" class="mb-1 text-sm text-neutral-800 px-2">ภาคการศึกษา</label>
                            <input
                                value="{{ $modalUser->education_sublevel }}"
                                type="text"
                                class="w-full border border-neutral-500/60 rounded-xl px-3 py-1 text-neutral-600"
                            >
                        </div>
                        <div class="box">
                            <label for="" class="mb-1 text-sm text-neutral-800 px-2">ยอดกู้</label>
                            <input
                                value="{{ $modalUser->amount }}"
                                type="text"
                                class="w-full border border-neutral-500/60 rounded-xl px-3 py-1 text-neutral-600"
                            >
                        </div>
                        <div class="box">
                            <label for="" class="mb-1 text-sm text-neutral-800 px-2">ดอกเบี้ยโปรโมชั่น(%)</label>
                            <input
                                value="{{ $modalUser->promotional_interest }}"
                                type="text"
                                class="w-full border border-neutral-500/60 rounded-xl px-3 py-1 text-neutral-600"
                            >
                        </div>
                        <div class="box">
                            <label for="" class="mb-1 text-sm text-neutral-800 px-2">ค่าธรรมเนียม(%)</label>
                            <input
                                value="{{ $modalUser->normal_interest }}"
                                type="text"
                                class="w-full border border-neutral-500/60 rounded-xl px-3 py-1 text-neutral-600"
                            >
                        </div>
                        <div class="box">
                            <label for="" class="mb-1 text-sm text-neutral-800 px-2">จำนวนงวด</label>
                            <input
                                value="{{ $modalUser->number_installments }}"
                                type="text"
                                class="w-full border border-neutral-500/60 rounded-xl px-3 py-1 text-neutral-600"
                            >
                        </div>
                        <div class="box">
                            <label for="" class="mb-1 text-sm text-neutral-800 px-2">วันที่ชำระงวดแรก</label>
                            <input
                                value="{{ $pay_date }}"
                                type="text"
                                class="w-full border border-neutral-500/60 rounded-xl px-3 py-1 text-neutral-600"
                            >
                        </div>
                        <div class="box">
                            <label for="" class="mb-1 text-sm text-neutral-800 px-2">วันที่ชำระงวดสอง</label>
                            <input
                                type="text"
                                class="w-full border border-neutral-500/60 rounded-xl px-3 py-1 text-neutral-600"
                            >
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-5 mt-5">
                        <div class="flex-initial">
                            <button type="submit" class="px-3 py-2 inline-flex items-center gap-x-2 text-sm font-semibold rounded-xl border border-transparent bg-red-600/50 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                                บันทึก
                            </button>
                        </div>
                        <div class="flex-initial">
                            <button type="submit" class="px-3 py-2 inline-flex items-center gap-x-2 text-sm font-semibold rounded-xl border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                                บันทึก และส่ง SMS
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal --}}
</div>


