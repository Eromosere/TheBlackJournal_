   {{-- header --}}
   <header class="bg-[#ECE657] py-5">
    <div class="container max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center">
            <div class="font-bold text-2xl md:text-3xl">
                TBJ
            </div>
            {{-- menu Items --}}
            <ul class="items-center justify-between hidden md:flex">
                <li class="mx-5 text-md font-bold">
                    <a href="#">Home</a>
                </li>
                |
                <li class="mx-5 text-sm font-medium">
                    <a href="#">Tasteful Tales</a>
                </li>
                |
                <li class="mx-5 text-sm font-medium">
                    <a href="#">Travel Tips</a>
                </li>
                |
                <li class="mx-5 text-sm font-medium">
                    <a href="#">About Us</a>
                </li>
            </ul>
            {{-- toggle button --}}
            <div class="md:hidden block">
                <svg id="menuButton" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                  </svg>
            </div>
        </div>
    </div>
</header>
{{-- mobile menu --}}
<div id="mobileMenu" class="bg-[#ECE657] py-5 px-4 md:hidden fixed z-50 top-[72px] left-0 w-full  items-center justify-center origin-top transition-transform transform -translate-y-[125%] ease-in duration-300 delay-150">
    <ul class="flex flex-col items-left justify-between">
        <li class="my-3 text-md font-bold">
            <a href="#">Home</a>
        </li>
        <li class="my-3 text-sm font-medium">
            <a href="#">Tasteful Tales</a>
        </li>
        <li class="my-3 text-sm font-medium">
            <a href="#">Travel Tips</a>
        </li>
        <li class="my-3 text-sm font-medium">
            <a href="#">About Us</a>
        </li>
    </ul>
</div>
