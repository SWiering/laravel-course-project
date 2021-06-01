@extends('admin.admin_master')

@section('admin')

<div class="col-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit HomeAbout</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('update/homeabout/' . $homeabout->id) }}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">About Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" value="{{ $homeabout->title }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short description</label>
                    <textarea name="short_description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $homeabout->short_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Long description</label>
                    <textarea name="long_description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $homeabout->long_description }}</textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                </div>
            </form>
        </div>
    </div>


</div>
    
@endsection