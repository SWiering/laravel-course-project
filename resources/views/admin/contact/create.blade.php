@extends('admin.admin_master')

@section('admin')

<div class="col-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Contact</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('store.contact') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Phone">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label>
                    <textarea name="address" id="address" rows="3" class="form-control"></textarea>
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