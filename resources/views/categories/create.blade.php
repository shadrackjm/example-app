<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add Category</h1>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group
                    ">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>