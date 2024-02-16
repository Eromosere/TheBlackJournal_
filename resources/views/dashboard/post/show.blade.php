<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Post') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 dark:text-gray-100">
            <p>{!! $post->content !!}</p>

            <div class="mt-10 overflow-x-scroll bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between mb-5">
                        <h1 class="text-lg font-semibold">Comments</h1>
                    </div>

                    <table class="w-full overflow-x-scroll table-auto min-w-max">
                        <thead class="text-sm leading-normal text-gray-500 uppercase bg-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3 font-semibold text-center text-gray-800 text-md">S/N
                                </th>
                                <th scope="col" class="px-4 py-3 font-semibold text-center text-gray-800 text-md">
                                    Full Name
                                </th>
                                <th scope="col" class="px-4 py-3 font-semibold text-center text-gray-800 text-md">
                                    Email
                                </th>
                                <th scope="col" class="px-4 py-3 font-semibold text-center text-gray-800 text-md">
                                    Comment</th>
                                <th scope="col" class="px-4 py-3 font-semibold text-center text-gray-800 text-md">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="relative text-sm font-light text-gray-600 divide-y divide-gray-500">
                            @forelse ($post?->comments as $comment)
                                <tr class="p-4">
                                    <td class="px-2 py-2 text-center text-white whitespace-nowrap">
                                        {{ $loop->iteration }}</td>
                                    <td class="px-2 py-2 text-center text-white whitespace-nowrap">
                                        {{ $comment->full_name }}
                                    </td>
                                    <td class="px-2 py-2 text-center text-white whitespace-nowrap">{{ $comment->email }}</td>
                                    <td class="px-2 py-2 text-center text-white whitespace-nowrap">
                                        {{ $comment->comment }}</td>

                                    <td class="flex items-center px-4 py-4 text-center">
                                        <form action="{{ route('comment.delete', $comment->id) }}" onsubmit="return confirm('Are You Sure?')" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-2 py-2 font-semibold text-white rounded-lg dark:bg-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td>No Comment</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
