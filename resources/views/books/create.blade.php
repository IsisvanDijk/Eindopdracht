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
                            <x-text-input type="text" id="title" name="title" class="{{ $errors->has('title') ? 'border-red-500' : '' }}"/>
                            @error('title')
                            <span class="text-red-600 text-sm">{{ 'Please fill in a title' }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="image">Image URL</x-input-label>
                            <x-text-input type="text" id="image" name="image"/>
                        </div>
                        <div>
                            <x-input-label for="author">Author</x-input-label>
                            <x-text-input type="text" id="author" name="author" class="{{ $errors->has('author') ? 'border-red-500' : '' }}"/>
                            @error('author')
                            <span class="text-red-600 text-sm">{{ 'Please fill in an author' }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="age_category">Select Age Category</x-input-label>
                            <select id="age_category" name="age_category" class="block font-medium text-sm text-gray-700 dark:text-gray-300 text {{ $errors->has('age_category') ? 'border-red-500' : '' }}">
                                <option value="">-- Choose an Age Category --</option>
                                <option value="adult">adult</option>
                                <option value="new_adult">new adult</option>
                                <option value="young_adult">young adult</option>
                            </select>
                            @error('age_category')
                            <span class="text-red-600 text-sm">{{ 'Please select an age category' }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="genre" > Select Genre </x-input-label>
                            <select id="genre" name="genre_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300 text {{ $errors->has('genre') ? 'border-red-500' : '' }}">
                                <option value="">-- Choose a Genre --</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                            @error('genre_id')
                            <span class="text-red-600 text-sm">{{ 'Please select a genre' }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="description">Description</x-input-label>
                            <textarea type="text" id="description" name="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300 text {{ $errors->has('description') ? 'border-red-500' : '' }}"></textarea>
                            @error('description')
                            <span class="text-red-600 text-sm">{{ 'Please add an description' }}</span>
                            @enderror
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
