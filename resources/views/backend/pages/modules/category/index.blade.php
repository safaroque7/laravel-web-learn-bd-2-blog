@extends('backend.layout.master')

{{-- @section('page_title', 'Category List') --}}

@section('category')
    <div class="col-md-12">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2> Category List </h2>
                <a href="{{ route('category.create') }}"> <button class="btn btn-secondary rounded-circle"> <i
                            class="fa-solid fa-plus"></i> </button> </a>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped mb-0 table-hover table-sm">
                    <thead>
                        <tr>
                            <th class="text-center"> SL </th>
                            <th class="text-center"> Category Name </th>
                            <th class="text-center"> Slug </th>
                            <th class="text-center"> Status </th>
                            <th class="text-center"> Serial </th>
                            <th class="text-center"> Created At </th>
                            <th class="text-center"> Updated At </th>
                            <th class="text-center"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($categories as $category)
                            <tr>
                                <td> {{ __($sl++) }} </td>
                                <td> 
                                    <p> {{ __($category->category_name) }}  </p>
                                    <p> 
                                        <small> 
                                            @foreach($categories as $sub_category) 
                                            <span class="me-2 text-success"> {{ __($sub_category->sub_category_name) }} </span>
                                            @endforeach()
                                        </small>
                                    </p>

                                </td>
                                <td> {{ __($category->slug) }} </td>
                                <td> {{ __($category->status == 1 ? 'Published' : 'Unpublished') }} </td>
                                <td> {{ __($category->serial) }} </td>
                                <td> {{ $category->created_at->format('Y-m-d  H:i:s') }} </td>
                                <td> {{ $category->updated_at == $category->created_at ? 'Not updated' : $category->updated_at->format('Y-m-d H:i:s') }}
                                </td>
                                <td class="d-flex justify-content-evenly">
                                    <a href="{{ route('category.show', $category->id) }}">
                                        <button class="btn btn-info btn-sm text-white">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('category.edit', $category->id) }}">
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                    </a>

                                    <form action="{{ route('category.destroy', $category->id) }}" class="d-inline"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this item?')"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>


    @push('script')
        @if (Session::has('msg'))
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "<?php echo session('class'); ?>",
                    title: "<?php echo session('msg'); ?>",
                    toast: true,
                    showConfirmButton: false,
                    timer: 5000
                });
            </script>
        @endif
    @endpush


@endsection
