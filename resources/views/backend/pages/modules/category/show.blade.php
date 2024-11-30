@extends('backend.layout.master')

@section('page_title', 'Category Details')

@section('category')
    <div class="col-md-6 mx-auto">

        <div class="card">
            <div class="card-header">
                <h2> Category Details </h2>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-hover table-striped">

                    <tr>
                        <th> ID </th>
                        <td> {{ $category->id }} </td>
                    </tr>

                    <tr>
                        <th> Name </th>
                        <td> {{ $category->name }} </td>
                    </tr>

                    <tr>
                        <th> Slug </th>
                        <td> {{ $category->slug }} </td>
                    </tr>

                    <tr>
                        <th> Slug ID </th>
                        <td> {{ $category->slug_id }} </td>
                    </tr>

                    <tr>
                        <th> Status </th>
                        <td> {{ $category->status }} </td>
                    </tr>

                    <tr>
                        <th> Order By </th>
                        <td> {{ $category->serial }} </td>
                    </tr>

                    <tr>
                        <th> Created At </th>
                        <td> {{ $category->created_at->format('Y-m-d  H:i:s') }} </td>
                    </tr>

                    <tr>
                        <th> Updated At</th>
                        <td> {{ $category->updated_at == $category->created_at ? 'Not updated' : $category->updated_at->format('Y-m-d H:i:s') }}
                    </tr>

                </table>

                <a class="text-white text-decoration-none" href="{{ route('category.index') }}"> 
                    <button class="btn btn-primary btn-sm"> Back </a> 
                </button>

            </div>
        </div>
    </div>

@endsection
