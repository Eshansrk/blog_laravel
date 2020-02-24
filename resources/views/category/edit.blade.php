@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        All Categories
                        <a href="{{route('categories')}}" class="btn btn-warning btn-sm float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="post"  action="{{ route('categories.update', $category->id) }}">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category Description</label>
                                <textarea name="description" id="" class="form-control" rows="4">{{$category->description}}</textarea>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" {{$category->status == 1 ? 'checked': 'we'}} name="status" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Status</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
