@extends('admin.admin_master')

@section('admin')

<div class="col-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Slider</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('update/slider/'.$slider->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Slider Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email" value="{{ $slider->title }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Slider description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $slider->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Slider Image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" value="{{ $slider->image }}">
                    <input type="hidden" name="old_image" value="{{ $slider->image }}">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection