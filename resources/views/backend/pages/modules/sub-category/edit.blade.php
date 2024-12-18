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


                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- This is the correct way to spoof a PUT request -->
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
                        <label for="slug-name" class="form-label fw-bold"> Slug Name </label>
                        <input type="text" name="slug" value="{{ __($category->slug) }}" id="slug-name"
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
                        <input type="number" name="serial" value="{{ __($category->serial) }}" id="serial" class="form-control">
                        
                        @error('serial')
                            <div class="text-danger pt-md-2 pt-1"> <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }} </div>
                        @enderror
                    </div>

                    <button class="btn btn-warning btn-sm"> Update Category Button </button>
                    <a href="{{ route('category.index') }}" class="btn btn-secondary btn-sm"> Back </a>
                </form>

                @push('script')
                    <script>
                        $('#name').on('input', function() {
                            let value = $(this).val()
                            value = value.replace(' ', '-').toLowerCase()
                            $('#slug-name').val(value)
                        });
                    </script>
                @endpush

            </div>
        </div>
    </div>

@endsection
