@extends('backend.layout.master')

@section('page_title', 'Sub Category Details')

@section('category')
    <div class="col-md-6 mx-auto">

        <div class="card">
            <div class="card-header">
                <h2> Sub Category Details </h2>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-hover table-striped">

                    <tr>
                        <th> ID </th>
                        <td> {{ $subCategory->id }} </td>
                    </tr>

                    <tr>
                        <th> Caegory Name </th>
                        <td> {{ $subCategory->category->category_name }} </td>
                    </tr>

                    <tr>
                        <th> Sub Caegory Name </th>
                        <td> {{ $subCategory->sub_category_name }} </td>
                    </tr>

                    <tr>
                        <th> Slug Name </th>
                        <td> {{ $subCategory->slug }} </td>
                    </tr>

                    <tr>
                        <th> Slug ID </th>
                        <td> {{ $subCategory->serial }} </td>
                    </tr>

                    <tr>
                        <th> Status </th>
                        <td> {{ $subCategory->status == 1 ? 'Published' : ($subCategory->status == 3 ? 'Draft' : 'Unpublished'); }} </td>
                    </tr>

                    <tr>
                        <th> Order By </th>
                        <td> {{ $subCategory->serial }} </td>
                    </tr>

                    <tr>
                        <th> Created At </th>
                        <td> {{ $subCategory->created_at->format('Y-m-d  H:i:s') }} </td>
                    </tr>

                    <tr>
                        <th> Updated At</th>
                        <td> {{ $subCategory->updated_at == $subCategory->created_at ? 'Not updated' : $subCategory->updated_at->format('Y-m-d H:i:s') }}
                    </tr>

                </table>

                <a class="text-white text-decoration-none" href="{{ route('category.index') }}"> 
                    <button class="btn btn-primary btn-sm"> Back </a> 
                </button>

            </div>
        </div>
    </div>

@endsection
