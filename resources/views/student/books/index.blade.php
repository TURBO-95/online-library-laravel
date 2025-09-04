<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Browse Library Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($books as $book)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
                        {{-- Book Cover Image --}}
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            @if ($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-500">No Image</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="font-semibold text-lg text-gray-900">{{ $book->title }}</h3>
                            <p class="text-sm text-gray-600 mt-1">by {{ $book->author }}</p>
                            <div class="mt-4 flex-grow">
                                <p class="text-sm text-gray-700">{{ Str::limit($book->description, 80) }}</p>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <a href="{{ route('books.show', $book) }}" class="w-full text-center block px-4 py-2 bg-gray-800 text-white text-sm font-semibold rounded-md hover:bg-gray-700">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 col-span-full">There are no books in the library at the moment.</p>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</x-app-layout>