<x-app-layout title="My posts">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My posts') }}
        </h2>
        <div>

        </div>
    </x-slot>

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
                        <br>
                        @auth()
                        <form action="{{ route('books.destroy', $book) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="bg-red-500 text-white px-4 py-2 mt-2 rounded-md hover:bg-red-600">
                        </form>
                        @endauth
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        </div>
</x-app-layout>
