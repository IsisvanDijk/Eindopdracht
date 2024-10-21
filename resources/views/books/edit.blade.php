<x-app-layout title="Edit your book">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit your book!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('books.update', $book->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div>
                            <x-input-label for="title">Title</x-input-label>
                            <x-text-input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" />
                        </div>

                        <div>
                            <x-input-label for="image">Image URL</x-input-label>
                            <x-text-input type="text" id="image" name="image" value="{{ old('image', $book->image) }}" />
                        </div>

                        <div>
                            <x-input-label for="author">Author</x-input-label>
                            <x-text-input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" />
                        </div>

                        <div>
                            <x-input-label for="age_category">Select Age Category</x-input-label>
                            <select id="age_category" name="age_category" class="block font-medium text-sm text-gray-700 dark:text-gray-300 text" required>
                                <option value="">-- Choose an Age Category --</option>
                                <option value="adult">adult</option>
                                <option value="new_adult">new adult</option>
                                <option value="young_adult">young adult</option>
                            </select>
                        </div>

                        <div>
                            <x-input-label for="genre">Select Genre</x-input-label>
                            <select id="genre" name="genre_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300 text" required>
                                <option value="">-- Choose a Genre --</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" {{ $book->genre_id == $genre->id ? 'selected' : '' }}>
                                        {{ $genre->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="description">Description</x-input-label>
                            <textarea class="block font-medium text-sm text-gray-700 dark:text-gray-300 text" id="description" name="description">{{ old('description', $book->description) }}</textarea>
                        </div>

                        <div class="py-5">
                            <x-primary-button type="submit">Update book</x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
