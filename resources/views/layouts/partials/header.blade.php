   {{-- header --}}
   <header class="bg-[#ECE657] py-5">
       <div class="container px-4 mx-auto max-w-7xl">
           <div class="flex items-center justify-between">
               <div class="text-2xl font-bold md:text-3xl">
                   <a href="/">TBJ</a>
               </div>
               {{-- menu Items --}}
               <ul class="items-center justify-between hidden md:flex">
                   <li class="{{ request()->routeIs('home') ? 'mx-5 font-bold' : 'text-sm font-medium mx-5' }}">
                       <a href="{{ route('home') }}">Home</a>
                   </li>
                   |
                   <li class="{{ request()->routeIs('tastefultales') ? 'mx-5 font-bold' : 'text-sm font-medium mx-5' }}">
                       <a href="{{ route('tastefultales') }}">Tasteful Tales</a>
                   </li>
                   |
                   <li class="{{ request()->routeIs('traveltips') ? 'mx-5 font-bold' : 'text-sm font-medium mx-5' }}">
                       <a href="{{ route('traveltips') }}">Travel Tips</a>
                   </li>
                   |
                   <li class="{{ request()->routeIs('about') ? 'mx-5 font-bold' : 'text-sm font-medium mx-5' }}">
                       <a href="{{ route('about') }}">About Us</a>
                   </li>
               </ul>
               {{-- toggle button --}}
               <div class="block md:hidden">
                   <svg id="menuButton" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                       stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                       <path stroke-linecap="round" stroke-linejoin="round"
                           d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                   </svg>
               </div>
           </div>
       </div>
   </header>
   {{-- mobile menu --}}
   <div id="mobileMenu"
       class="bg-[#ECE657] py-5 px-4 md:hidden fixed z-50 top-[55px] left-0 w-full  items-center justify-center origin-top transition-transform transform -translate-y-[125%] ease-in duration-300 delay-150">
       <ul class="flex flex-col justify-between items-left">
           <li class="my-3 font-bold text-md">
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
