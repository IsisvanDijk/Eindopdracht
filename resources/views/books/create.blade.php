<x-app-layout>

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
            <textarea type="text" id="description" name="description"></textarea>
        </div>

        <x-primary-button type="submit">Create</x-primary-button>
    </form>

</x-app-layout>
