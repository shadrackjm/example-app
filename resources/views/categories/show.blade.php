<x-app-layout>
    <div class="container">
        <a href="/recipes" class="btn btn-primary">Recipes</a>
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $category->name }}</h1>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>