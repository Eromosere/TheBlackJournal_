<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{$action == 'edit' ? __('Update Post') : __('Create Post') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 dark:text-gray-100">
            <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{$action == 'edit' ? __('Update Post') : __('Create Post') }}
                    </h2>

                    <form method="post" action="{{$action == 'edit' ? route('post.update',$post->id) : route('post.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        @if ($action == 'edit')
                            @method('PUT')
                        @endif
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" value="{{ $post->title ?? '' }}" field="title" required type="text" class="block w-full mt-1 @error('title') error @enderror"
                                autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="published_at" :value="__('Published At')" />
                            <x-text-input id="published_at" name="published_at" required value="{{ $action === 'create' ? '' : optional($post)->published_at->format('Y-m-d') ?? ''  }}" type="date" class="block w-full mt-1" />
                            <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="category_id" :value="__('Category')" />
                            <select name="category_id" id="category_id" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $action == 'edit' && $post?->category?->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @empty
                                    <option value="">No Category Found</option>
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="image" :value="__('image')" />
                            <x-text-input id="image" name="image"  value="{{ $post->image ?? '' }}" type="file" class="block w-full mt-1"/>
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select name="status" id="status" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                <option value="active" {{ $action == 'edit' && $post->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $action == 'edit' && $post->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                        <div>
                            <input id="content" value="{{ $post->content ?? '' }}" type="hidden" name="content">
                            <trix-editor input="content" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" ></trix-editor>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <div>
                            <x-primary-button>{{$action == 'edit' ? __('Update') : __('Create') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
