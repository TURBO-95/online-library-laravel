<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Book Cover -->
                    <div class="md:col-span-1">
                        <div class="h-96 bg-gray-200 flex items-center justify-center rounded-lg">
                            @if ($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover rounded-lg">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center rounded-lg">
                                    <span class="text-gray-500">No Image Available</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Book Details & Actions -->
                    <div class="md:col-span-2">
                        <h2 class="text-3xl font-bold text-gray-900">{{ $book->title }}</h2>
                        <p class="text-lg text-gray-600 mt-2">by {{ $book->author }}</p>
                        
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Genre</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $book->genre ?: 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">ISBN</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $book->isbn }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Copies Available</dt>
                                    <dd class="mt-1 text-sm font-bold {{ $book->quantity > 0 ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $book->quantity }}
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <div class="mt-6">
                            <h4 class="text-sm font-medium text-gray-500">Description</h4>
                            <p class="mt-2 text-gray-700 leading-relaxed">{{ $book->description ?: 'No description available.' }}</p>
                        </div>
                        
                        <!-- Borrow Action -->
                        <div class="mt-8 pt-8 border-t border-gray-200">
                            @if ($book->quantity > 0)
                                <form action="{{ route('books.borrow', $book) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                                        Borrow this Book
                                    </button>
                                </form>
                            @else
                                <button class="w-full sm:w-auto px-6 py-3 bg-gray-400 text-white font-semibold rounded-md cursor-not-allowed" disabled>
                                    Currently Unavailable
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('books.index') }}" class="text-indigo-600 hover:text-indigo-900">← Back to Library</a>
            </div>
        </div>
    </div>
</x-app-layout>