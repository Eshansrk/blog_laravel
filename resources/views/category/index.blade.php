@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        All Categories
                        <a href="{{route('categories.create')}}" class="btn btn-success btn-sm float-right">Add New</a>
                    </div>

                    <div class="card-body">
                        <table>
                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="20%">Name</th>
                                <th width="45%">Description</th>
                                <th width="10%">Status</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            @php($i=1)
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->status}}</td>
                                <td>
                                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{route('categories.delete', $category->id)}}" onclick="return(confirm('Are you sure???'))" class="btn btn-sm btn-danger">Delete</a>
{{--                                    <a href="{{url('/categories/delete', $category->id)}}" class="btn btn-sm btn-danger">Delete</a>--}}
                                </td>
                            </tr>
                            @php($i++)
                            @endforeach
                        </table>

                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
