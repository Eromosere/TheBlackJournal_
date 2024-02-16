@extends('layouts.base')
@section('content')
    <div class="relative">
        <img src="/headerimg.png" class="object-cover w-full h-80" alt="">
        <h1 class="absolute z-50 text-6xl font-bold text-white left-48 inset-40">Tasteful Tales</h1>
        <div class="absolute inset-0 top-0 bg-black opacity-40"></div>
    </div>
    <section class="mb-10">
        <div class="container px-4 py-10 mx-auto max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-y-12 md:gap-6">
                @forelse ($posts as $post)
                    <div class="relative">
                        <img src="{{ asset('storage/' . $post->image) }}" alt=""
                            class="object-cover object-center w-full h-56 rounded-t-lg">
                        <div class="pt-4">
                            <h3 class="mb-2 text-xl font-bold">{{ $post->title }}</h3>
                            <p class="text-zinc-500 text-md font-normal font-['Poppins'] leading-[24px] mb-5">
                                {!! \Illuminate\Support\Str::words(strip_tags($post->content), 15, '...') !!}</p>
                            <a href="{{ route('blog.show', $post->slug) }}"
                                class="bg-[#ECE657] text-[#111111] py-2 px-7 rounded-md font-medium text-md">Read More</a>
                        </div>
                    </div>
                @empty
                    <div>No Post</div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
