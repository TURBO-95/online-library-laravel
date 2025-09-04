<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            <div class="font-bold">{{ __('Whoops! Something went wrong.') }}</div>
                            <ul class="mt-3 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input id="title" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="text" name="title" value="{{ old('title') }}" required autofocus />
                        </div>
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                            <input id="author" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="text" name="author" value="{{ old('author') }}" required />
                        </div>
                        <div>
                            <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                            <input id="isbn" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="text" name="isbn" value="{{ old('isbn') }}" required />
                        </div>
                        <div>
                            <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                            <input id="genre" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="text" name="genre" value="{{ old('genre') }}" />
                        </div>
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input id="quantity" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="number" name="quantity" value="{{ old('quantity') }}" required />
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm">{{ old('description') }}</textarea>
                        </div>
                        <div>
                            <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                            <input id="cover_image" class="block mt-1 w-full" type="file" name="cover_image" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.books.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline mr-4">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md">Add Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>