<div class="">
    <div class="bg-[#ef3026] py-2">
        <div class="max-w-screen-md mx-auto px-3">
            <div class="flex items-center justify-between gap-2">
                <div class="">
                    <img class="w-[65px] md:w-[80px]" src="{{ asset('images/logoSBJWhite.png') }}" alt="">
                </div>
                <div class="text-white">
                    <p>
                        @yield('apply_id')
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-screen-md mx-auto px-3 py-10">
        {{ $slot }}
    </div>
</div>
