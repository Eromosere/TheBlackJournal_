@extends('layouts.base')
@section('content')
        <section class="h-52 flex items-center justify-center bg-cover bg-center relative w-full md:bg-cover md:bg-center md:h-[500px]" style="background-image: url('/headerimg.png');">
            <div class="absolute inset-0 bg-gray-800 bg-opacity-60"></div>
            <div class="relative z-10 text-center text-white">
                <p class="text-xl font-medium md:text-4xl">Welcome To</p>
                <h1 class="mb-3 text-2xl font-bold md:text-4xl">The Black Journal</h1>
                <p class="text-sm md:text-lg"><b>Food, Travel Tips and more.</b> </p>
            </div>
        </section>

        <section class="mb-10">
            <div class="container px-4 py-10 mx-auto max-w-7xl">
                <div class="mb-10">
                    <h1 class="text-2xl font-semibold leading-loose text-black">Tasteful Tales</h1>
                    <p class="text-zinc-500 text-sm font-normal leading-[18px] md:w-[780px]"> Welcome to the world of tantalizing cuisine and delicious experiences from every corner of the globe.Get ready to immerse yourself in the symphony of flavors. Discover even more interesting recipes and tips regarding your favorite dishes. Join us as we celebrate the art of cooking, discover hidden culinary gems, and indulge in the joyous dance of spices and ingredients that make every meal an extraordinary experience. <em>Are you ready?</em></p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-y-12 md:gap-6">
                    @forelse ($posts as $post)
                        <div class="relative">
                            <img src="{{ asset('storage/'.$post->image) }}" alt="" class="object-cover object-center w-full h-56 rounded-t-lg">
                            <div class="pt-4">
                                <h3 class="mb-2 text-xl font-bold">{{ $post->title}}</h3>
                                <p class="text-zinc-500 text-md font-normal font-['Poppins'] leading-[24px] mb-5">{!! \Illuminate\Support\Str::words(strip_tags($post->content), 15, '...') !!}</p>
                                <a href="{{ route('blog.show', $post->slug) }}" class="bg-[#ECE657] text-[#111111] py-2 px-7 rounded-md font-medium text-md">Read More</a>
                            </div>
                        </div>
                    @empty
                        <div>No Post</div>
                    @endforelse
                </div>
            </div>
        <section>
        <section class="mt-10">
            <div class="container px-4 py-10 mx-auto max-w-7xl">
                <div class="mb-10">
                    <h1 class="text-2xl font-semibold leading-loose text-black">Travel Tips</h1>
                    <p class="text-zinc-500 text-sm font-normal leading-[18px] md:w-[780px]">There's a lot to think about when it comes to traveling. What to pack, how your location will look like, the customs and styles of the particular vacation site, the local cousines and many more! That's why our blog, <em>The Black Journal!</em> is here to help you out on that. We havve got so much tips to let you dear readers on and we so cannot wait to dish that out. Now, for our very first tip!</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-y-12 md:gap-6">
                    @forelse ($travelTipsPosts as $travelTip)
                        <div class="rounded-lg">
                            <img src="{{ asset('storage/'.$travelTip->image) }}" alt="" class="object-cover object-center w-full h-56 rounded-t-lg">
                            <div class="pt-4">
                                <h3 class="mb-2 text-xl font-bold">{{ $travelTip->title }}</h3>
                                <p class="text-zinc-500 text-md font-normal font-['Poppins'] leading-[24px] mb-6">{!! \Illuminate\Support\Str::words(strip_tags($travelTip->content), 15, '...') !!}</p>
                                <a href="{{ route('blog.show', $post->slug) }}" class="bg-[#ECE657] text-[#111111] py-2 px-7 rounded-md font-medium text-md">Read More</a>
                            </div>
                        </div>
                    @empty
                    <div>No Post</div>
                    @endforelse
                </div>
            </div>
        <section>
        <section class="mt">
            <div class="container max-w-4xl px-4 py-10 mx-auto">
                <div class="p-10 rounded-lg shadow-sm bg-gray-100/55">
                    <div class="mb-5">
                        <h1 class="text-black text-3xl font-semibold font-['Inter']">Subscribe to Our Newsletter</h1>
                        <p class="md:w-[491px] text-neutral-600 text-xs font-normal font-['Poppins'] leading-[20px]">Hello there, our dear readers! Subscribe to our newsletter today, and be the first to know about new and exciting tips from your favorite blog, The Black Journal!</p>
                    </div>
                    <div>
                        <form action="{{ route('subscribe') }}" method="post">
                            @csrf
                            <input type="text" name="email" class="w-full h-12 mb-3 rounded-md border-gray-300 focus:border-none focus:right-1 focus:outline-none focus:ring-[#ECE657] placeholder:text-sm @error('email') border-red-500 @enderror" placeholder="Enter Email Address">
                            @error('email')
                                <div class="text-sm text-red-500 mt-1r">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="w-full bg-[#ECE657]/100 text-[#111111] py-3 font-medium text-md rounded-md mt-4">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
