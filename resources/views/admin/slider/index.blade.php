@extends('admin.admin_master')

@section('admin')
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Slider
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <h2>Home Slider</h2>
                <a href="" class="btn btn-info">Add Slider</a>
                <div class="col-md-12">
                    <div class="card">

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="card-header">All Brand</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Srl. Nr.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- @php($i = 1) -->
                                @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row"> {{ $sliders->firstItem()+$loop->index }} </th>
                                    <td> {{ $slider->title }} </td>
                                    <td> {{ $slider->description }} </td>
                                    <td> 
                                        <img src="{{ asset($slider->brand_image) }}" alt="" class="img-fluid"> 
                                    </td>
                                    <td>
                                        <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('slider/delete/'.$slider->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this slider?')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
              
            </div>
        </div>
    </div>

@endsection