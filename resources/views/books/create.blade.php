<x-app-layout title="Add a book">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add a book!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('books.store') }}" method="post">
                        @csrf
                        <div>
                            <x-input-label for="title">Title</x-input-label>
                            <x-text-input type="text" id="title" name="title"/>
                        </div>
                        <div>
                            <x-input-label for="title">Image URL</x-input-label>
                            <x-text-input type="text" id="image" name="image"/>
                        </div>
                        <div>
                            <x-input-label for="author">Author</x-input-label>
                            <x-text-input type="text" id="author" name="author"/>
                        </div>
                        <div>
                            <x-input-label for="age_category">Age category</x-input-label>
                            <x-text-input type="text" id="age_category" name="age_category"/>
                        </div>
                        <div>
                            <x-input-label for="genre">Genre</x-input-label>
                            <x-text-input type="text" id="genre" name="genre_id"/>
                        </div>

                        <div>
                            <x-input-label for="description">Description</x-input-label>
                            <textarea class="block font-medium text-sm text-gray-700 dark:text-gray-300 text" type="text" id="description" name="description"></textarea>
                        </div>

                        <div class="py-5">
                            <x-primary-button type="submit">Add book</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
