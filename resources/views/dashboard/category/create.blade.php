<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{$action == 'edit' ? __('Update Category') : __('Create Category') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 dark:text-gray-100">
            <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{$action == 'edit' ? __('Update Category') : __('Create Category') }}
                    </h2>

                    <form method="post" action="{{$action == 'edit' ? route('category.update',$category->id) : route('category.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @if ($action == 'edit')
                            @method('PUT')
                        @endif
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" value="{{ $category->name ?? '' }}" type="text" class="block w-full mt-1"
                                autocomplete="name" />
                            {{-- <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" /> --}}
                        </div>
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea name="description" id="description" cols="10" rows="5" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">{{ $category->description ?? '' }}</textarea>
                        </div>
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select name="status" id="status" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                <option value="active" {{ $action == 'edit' && $category->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $action == 'edit' && $category->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
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
