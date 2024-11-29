@extends('backend.layout.master')


@section('category')
    <div class="col-md-6 mx-auto">

        <div class="card">
            <div class="card-header">
                <h2> Create Category </h2>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $item)
                                <li> {{ __($item) }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-md-4 md-2">
                        <label for="name" class="form-label fw-bold"> Category Name </label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <div class="text-danger pt-md-2 pt-1"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="mb-md-4 md-2">
                        <label for="slug" class="form-label fw-bold"> Category Slug </label>
                        <input type="text" name="slug" id="slug" class="form-control">
                        @error('slug')
                            <div class="text-danger pt-md-2 pt-1"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="mb-md-4 md-2">
                        <label for="status" class="form-label fw-bold"> Category Status </label>
                        <select name="status" id="status" class="form-control">
                            <option> -- Select category Status -- </option>
                            <option value="1"> Publish </option>
                            <option value="0"> Unpublish </option>
                            <option value="3"> Draft </option>
                        </select>
                        @error('status')
                            <div class="text-danger pt-md-2 pt-1"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="mb-md-4 md-2">
                        <label for="serial" class="form-label fw-bold"> Category Serial </label>
                        <select name="serial" id="serial" class="form-control">
                            <option> Select category serial </option>
                            <option value="1"> 1 </option>
                            <option value="2"> 2 </option>
                            <option value="3"> 3 </option>
                        </select>
                        @error('serial')
                            <div class="text-danger pt-md-2 pt-1"> {{ $message }} </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-sm">Create Category</button>
                </form>

                @push('script')
                    <script>
                        $('#name').on('input', function() {
                            let value = $(this).val()
                            value = value.replace(' ', '-').toLowerCase()
                            $('#slug').val(value)
                        });
                    </script>
                @endpush
            </div>
        </div>
    </div>
@endsection
