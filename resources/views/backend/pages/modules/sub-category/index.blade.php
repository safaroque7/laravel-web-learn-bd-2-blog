@extends('backend.layout.master')

{{-- @section('page_title', 'Category List') --}}

@section('category')
    <div class="col-md-12">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2> Sub Category List </h2>
                <a href="{{ route('category.create') }}"> <button class="btn btn-secondary rounded-circle"> <i
                            class="fa-solid fa-plus"></i> </button> </a>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped mb-0 table-hover table-sm">
                    <thead>
                        <tr>
                            <th class="text-center"> SL </th>
                            <th class="text-center"> Sub Category Name </th>
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
                        @foreach ($subCategoriesCollection as $subCategoryItem)
                            <tr>
                                <td> {{ __($sl++) }} </td>
                                <td> {{ __($subCategoryItem->sub_category_name) }} </td>
                                <td> {{ __($subCategoryItem->category->category_name) }} </td>
                                <td> {{ __($subCategoryItem->slug) }} </td>
                                <td> {{ __($subCategoryItem->status == 1 ? 'Published' : 'Unpublished') }} </td>
                                <td> {{ __($subCategoryItem->serial) }} </td>
                                <td> {{ $subCategoryItem->created_at->format('Y-m-d  H:i:s') }} </td>
                                <td> {{ $subCategoryItem->updated_at == $category->created_at ? 'Not updated' : $category->updated_at->format('Y-m-d H:i:s') }}
                                </td>
                                <td class="d-flex justify-content-evenly">
                                    <a href="{{ route('sub-category.show', $subCategoryItem->id) }}">
                                        <button class="btn btn-info btn-sm text-white">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('sub-category.edit', $subCategoryItem->id) }}">
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                    </a>

                                    <form action="{{ route('sub-category.destroy', $subCategoryItem->id) }}" class="d-inline"
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
