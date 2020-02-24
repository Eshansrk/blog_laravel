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
                        <form method="POST" action="{{ route('categories.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                                   <span class="text-danger ">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category Description</label>
                                <textarea name="description" id="" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1">
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
