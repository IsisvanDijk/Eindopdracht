<x-app-layout title="Book list">
    <x-slot name="header">
        <div class="hFlex">

            <div class="collum">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Welcome to our Collection') }}
                </h2>

                <form action="{{ route('books.index') }}" method="GET" style="margin-bottom: 20px;">
                    <!-- Search Input -->
                    <input type="text" placeholder="Search by Title or Author" id="search-bar" name="search"  value="{{ request('search') }}" class="font-medium text-sm text-gray-700 dark:text-gray-300 text">
                    <x-primary-button type="submit" >Search</x-primary-button>
                </form>


            </div>
            <div>
                <form method="GET" action="{{ route('books.index') }}">

                    <div class="py-1">
                        <select name="genre_id" id="genre" class="block font-medium text-sm text-gray-700 dark:text-gray-300 text">
                            <option value="">Genre</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}" {{ request('genre_id') == $genre ? 'selected' : ''}}>
                                    {{ $genre->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-1">
                    <select name="age_category" id="age_category" class="block font-medium text-sm text-gray-700 dark:text-gray-300 text">
                        <option value="">Age category</option>
                        @foreach($books->unique('age_category') as $book)
                            <option value="{{ $book->age_category }}" {{ request('age_category') == $book->age_category ? 'selected' : '' }}>
                                {{ $book->age_category }}
                            </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="py-1">
                    <select name="author" id="author" class="block font-medium text-sm text-gray-700 dark:text-gray-300 text">
                        <option value="">Author</option>
                        @foreach($books->unique('author') as $book)
                            <option value="{{ $book->author }}" {{ request('author') == $book->author ? 'selected' : '' }}>
                                {{ $book->author }}
                            </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="py-1">
                    <x-primary-button type="submit" >Filter</x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </x-slot>

    @if (session('error'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="bg-pink-950 text-white p-4 rounded-md">
                    {{ session('error') }}
                </div>

            </div>
    @endif


            <div class="py-10">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                        @auth()
                        <div class="p-6 text-gray-900 dark:text-gray-100">

                            <a href="{{ route('books.create') }}"> Add a book! <a/>
                            @endauth
                        </div>

                </div>


                @foreach ($books as $book)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
                    <a href="{{ route('books.show', $book->id) }}">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">

                            <tr>
                                <h2 class="font-semibold text-l text-gray-800 dark:text-gray-200 leading-tight">{{$book->title}}</h2>
                                <li>{{$book->author}}</li>
                                <li>{{$book->age_category}}</li>
                            </tr>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
            </div>
        </div>
</x-app-layout>
