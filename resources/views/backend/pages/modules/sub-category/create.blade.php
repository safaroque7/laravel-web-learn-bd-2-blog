@extends('backend.layout.master')


@section('category')
    <div class="col-md-6 mx-auto">

        <div class="card">
            <div class="card-header">
                <h2> Create Sub Category </h2>
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


                <form action="{{ route('sub-categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-md-4 md-2">
                        <label for="category-name" class="form-label fw-bold"> Category Name </label>
                        <select name="category_id" id="category-name" class="form-control">
                            <option value="" disableed selected> -- Select Category -- </option>
                            @foreach ($allCategoryNames as $id => $category_name)
                                <option value="{{ __($id) }}"> {{ __($category_name) }} </option>
                            @endforeach
                        </select>

                        @error('category_name')
                            <div class="text-danger pt-md-2 pt-1"> <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }} </div>
                        @enderror
                    </div>


                    <div class="mb-md-4 md-2">
                        <label for="subCategoryName" class="form-label fw-bold"> Sub Category Name </label>
                        <input type="text" name="sub_category_name" id="subCategoryName" class="form-control"
                            value="{{ old('sub_category_name') }}">
                        @error('sub_category_name')
                            <div class="text-danger pt-md-2 pt-1"> <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="mb-md-4 md-2">
                        <label for="slug-name" class="form-label fw-bold"> Slug Name </label>
                        <input type="text" name="slug" id="slug-name" class="form-control">
                        @error('slug')
                            <div class="text-danger pt-md-2 pt-1"> <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="mb-md-4 md-2">
                        <label for="status" class="form-label fw-bold"> Sub Category Status </label>
                        <select name="status" id="status" class="form-control">
                            <option value="" disableed selected> -- Select Sub Category Status -- </option>
                            <option value="1"> Publish </option>
                            <option value="0"> Unpublish </option>
                            <option value="3"> Draft </option>
                        </select>
                        @error('status')
                            <div class="text-danger pt-md-2 pt-1"> <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="mb-md-4 md-2">
                        <label for="serial" class="form-label fw-bold"> Sub Category Serial </label>
                        <input type="number" name="serial" id="serial" class="form-control"
                            value="{{ old('serial') }}">
                        @error('serial')
                            <div class="text-danger pt-md-2 pt-1"> <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }} </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Create Sub Category</button>
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
