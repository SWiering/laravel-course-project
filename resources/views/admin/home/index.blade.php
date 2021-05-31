@extends('admin.admin_master')

@section('admin')
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Home About
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <h2>Home About</h2>
                <a href="{{ route('add.about') }}" class="btn btn-info">Add About</a>
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

                        <div class="card-header">All about data</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Srl. Nr.</th>
                                    <th scope="col">Home Title</th>
                                    <th scope="col">Short description</th>
                                    <th scope="col">Long description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($homeabout as $about)
                                <tr>
                                    <th scope="row"> {{ $i++ }} </th>
                                    <td> {{ $about->title }} </td>
                                    <td> {{ $about->short_description }} </td>
                                    <td> {{ $about->long_description }} </td>
                                    <td>
                                        <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('about/delete/'.$about->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this slider?')">Delete</a>
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