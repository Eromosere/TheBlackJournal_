<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Post') }}
            </h2>
            <div>
                <a href="{{ route('post.create') }}"
                    class="px-4 py-2 text-sm font-medium text-black bg-white rounded-md">Create Post</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 dark:text-gray-100">
            <div class="overflow-x-scroll bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between mb-5">
                        <h1 class="text-lg font-semibold">Post</h1>
                        {{-- <div>
                            <a href="{{ route('category.create') }}"
                                class="px-4 py-2 text-sm font-medium text-black bg-white rounded-md">Create Category</a>
                        </div> --}}
                    </div>

                    <table class="w-full overflow-x-scroll table-auto min-w-max">
                        <thead class="text-sm leading-normal text-gray-500 uppercase bg-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3 font-semibold text-center text-gray-800 text-md">S/N
                                </th>
                                <th scope="col" class="px-4 py-3 font-semibold text-center text-gray-800 text-md">
                                    Image
                                </th>
                                <th scope="col" class="px-4 py-3 font-semibold text-center text-gray-800 text-md">
                                    Title
                                </th>
                                <th scope="col" class="px-4 py-3 font-semibold text-center text-gray-800 text-md">
                                    Slug</th>
                                <th scope="col" class="px-4 py-3 font-semibold text-center text-gray-800 text-md">
                                    Status
                                </th>
                                <th scope="col" class="px-4 py-3 font-semibold text-center text-gray-800 text-md">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="relative text-sm font-light text-gray-600 divide-y divide-gray-500">
                            @forelse ($posts as $post)
                                <tr class="p-4">
                                    <td class="px-2 py-2 text-center text-white whitespace-nowrap">
                                        {{ $loop->iteration }}</td>
                                    <td class="px-2 py-2 text-center text-white whitespace-nowrap">
                                        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}"
                                            class="w-10 h-10 rounded-full">
                                    </td>
                                    <td class="px-2 py-2 text-center text-white whitespace-nowrap">{{ $post->title }}</td>
                                    <td class="px-2 py-2 text-center text-white whitespace-nowrap">
                                        {{ $post->slug }}</td>
                                    <td class="px-2 py-2 text-center text-white whitespace-nowrap">
                                        {{ $post->status }}</td>
                                    <td class="flex items-center px-4 py-4 text-center">
                                        <a href="{{ route('post.show', $post->id) }}"
                                            class="px-2 py-2 mr-3 font-semibold bg-yellow-500 rounded-lg dark:text-white dark:bg-yellow-500">View</a>
                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="px-2 py-2 mr-3 font-semibold bg-indigo-500 rounded-lg dark:text-white dark:bg-indigo-500">Edit</a>
                                        <form action="{{ route('post.destroy', $post->id) }}" onsubmit="return confirm('Are You Sure?')" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-2 py-2 font-semibold text-white rounded-lg dark:bg-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td>No post</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
