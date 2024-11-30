@extends('backend.layout.master')

@section('category')
    <div class="col-md-6 mx-auto">

        <div class="card">
            <div class="card-header">
                <h2> Edit Category </h2>
            </div>
            <div class="card-body">

                @session('msg')
                    {{ $message }}
                @endsession

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li> <i class="fa-solid fa-triangle-exclamation"></i> {{ __($error) }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('category.update', $category->id) }}" method="PUT">
                    @csrf
                    @method('PUT') <!-- Add the method override for PUT -->

                    <div class="mb-md-4 md-2">
                        <label for="name" class="form-label fw-bold"> Category Name </label>
                        <input type="text" name="name" value="{{ __($category->name) }}" id="name"
                            class="form-control">
                        @error('name')
                            <div class="text-danger pt-md-2 pt-1"> <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="mb-md-4 md-2">
                        <label for="slug" class="form-label fw-bold"> Category Slug </label>
                        <input type="text" name="slug" value="{{ __($category->slug) }}" id="slug"
                            class="form-control">
                        @error('slug')
                            <div class="text-danger pt-md-2 pt-1"> <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="mb-md-4 md-2">
                        <label for="status" class="form-label fw-bold"> Category Status </label>
                        <select name="status" id="status" class="form-control">
                            <option value="" disabled> -- Select category Status -- </option>
                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}> Publish </option>
                            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}> Unpublish </option>
                            <option value="3" {{ $category->status == 3 ? 'selected' : '' }}> Draft </option>
                        </select>
                        @error('status')
                            <div class="text-danger pt-md-2 pt-1"> <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="mb-md-4 md-2">
                        <label for="serial" class="form-label fw-bold"> Category Serial </label>
                        <select name="serial" id="serial" class="form-control">
                            <option value="" disabled>Select category serial</option>
                            <option value="1" {{ $category->serial == 1 ? 'selected' : '' }}> 1 </option>
                            <option value="2" {{ $category->serial == 2 ? 'selected' : '' }}> 2 </option>
                            <option value="3" {{ $category->serial == 3 ? 'selected' : '' }}> 3 </option>
                        </select>
                        @error('serial')
                            <div class="text-danger pt-md-2 pt-1"> <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }} </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning">Update Category</button>
                    <a href="{{ route('category.index') }}" class="btn btn-secondary btn-sm"> Back </a>
                </form>
            </div>
        </div>
    </div>

@endsection
