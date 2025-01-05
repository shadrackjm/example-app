<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Edit Recipes
        </h2>
    </x-slot>
<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('recipes.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Recipe Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $recipe->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $recipe->description }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="instructions" class="form-label">instructions</label>
                    <textarea class="form-control" id="instructions" name="instructions" rows="3">{{ $recipe->instructions }}</textarea>
                    @error('instructions')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="ingredients" class="form-label">ingredients</label>
                    <textarea class="form-control" id="ingredients" name="ingredients" rows="3">{{ $recipe->ingredients }}</textarea>
                    @error('ingredients')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <button type="submit" class="btn btn-success">Update Recipe</button>
            </form>
        </div>
    </div>
</div>
</x-app-layout>