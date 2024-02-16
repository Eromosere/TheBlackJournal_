@extends('layouts.base')
@section('content')
    <section class="mb-10">
        <div class="container px-4 py-5 mx-auto md:py-10 max-w-7xl">
            <h1 class="font-semibold leading-6 text-md md:text-lg"><span class="text-[#535151]">Home </span>/ <span class="text-[#535151]">{{ $post->category?->name }}</span> / <span class="text-black">{{ $post->title }}</span></h1>
        </div>

        <div class="container px-4 mx-auto md:py-10 max-w-7xl">
            <div class="relative">
                <img src="{{ asset('storage/' . $post->image) }}" class="object-cover object-center w-full h-80"/>
            <div>
            <div class="mt-7">
                <h1 class="text-black text-lg md:text-xl font-semibold font-['Poppins'] leading-loose mb-4">{{ $post->title }}</h1>
            </div>
            <div>
                <p class="mb-5 text-base font-normal text-zinc-500">
                   {!! $post->content !!}
                </p>
            </div>
        </div>
    </section>

    <section class="mb-10">
        <div class="container px-4 py-5 mx-auto md:py-10 max-w-7xl">
            <div class="px-5 pt-4 pb-3 rounded-lg shadow-sm md:p-7 bg-gray-100/55">
                <div class="mb-5">
                    <h1 class="text-black text-lg md:text-2xl font-semibold font-['Inter'] text-left">Comments:</h1>
                </div>
                <div class="flex flex-col mb-5 space-y-10">
                    @forelse ($post->comments as $comment)
                    <div class="flex md:space-x-5">
                        <div class="hidden md:block">
                            <img src="/avatar.png" alt="" class="object-center rounded-full obeject-cover w-14 h-14">
                        </div>
                        <div class="flex flex-col items-start w-full gap-2">
                            <span class="text-black text-[17px] font-medium font-['Poppins'] leading-snug">{{ $comment->full_name }}</span>
                            <p class="text-neutral-600 text-base font-normal font-['Poppins'] leading-[27.04px]">{{ $comment->comment }}</p>
                            <p class="text-zinc-500 text-xs font-normal font-['Poppins'] leading-tight">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="my-5">
                     <p>No Comments at moment</p>
                    </div>
                    @endforelse
                </div>
                <div>
                    <div class="mb-2">
                        <h2 class="text-black text-xl font-semibold font-['Poppins'] leading-loose">Leave a comment 😜 😎 😂</h2>
                    </div>
                    <form action="{{ route('post.comment', $post->id) }}" method="post">
                        @csrf
                        <input type="text" name="full_name" class="w-full h-12 mb-3 rounded-md border-gray-300 focus:border-none focus:right-1 focus:outline-none focus:ring-[#ECE657] placeholder:text-sm" placeholder="Enter Name">
                        <input type="text" name="email" class="w-full h-12 mb-3 rounded-md border-gray-300 focus:border-none focus:right-1 focus:outline-none focus:ring-[#ECE657] placeholder:text-sm" placeholder="Enter Email Address">
                        <textarea name="comment" id="" cols="30" rows="10" class="w-full h-32 mb-3 rounded-md border-gray-300 focus:border-none focus:right-1 focus:outline-none focus:ring-[#ECE657] placeholder:text-sm" placeholder="Enter Comment"></textarea>
                        <button type="submit" class="w-full bg-[#ECE657]/100 text-[#111111] py-3 font-medium text-md rounded-md">Post Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
