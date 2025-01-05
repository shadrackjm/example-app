<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Create Recipes
        </h2>
    </x-slot>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create Recipe</h1>
            <a href="{{ route('recipes.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('recipes.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Recipe Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="instructions" class="form-label">instructions</label>
                    <textarea class="form-control" id="instructions" name="instructions" rows="3"></textarea>
                    @error('instructions')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="ingredients" class="form-label">ingredients</label>
                    <textarea class="form-control" id="ingredients" name="ingredients" rows="3"></textarea>
                    @error('ingredients')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <button type="submit" class="btn btn-success">Create Recipe</button>
            </form>
        </div>
    </div>
</div>
</x-app-layout>