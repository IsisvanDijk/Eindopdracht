<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to our book Collection') }}
        </h2>
    </x-slot>



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

</x-app-layout>
