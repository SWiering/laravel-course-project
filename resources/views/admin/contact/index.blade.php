@extends('admin.admin_master')

@section('admin')
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact Page
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <h2>Contact Page</h2>
                <a href="{{ route('add.contact') }}" class="btn btn-info">Add Contact</a>
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

                        <div class="card-header">All contact data</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Srl. Nr.</th>
                                    <th scope="col">Contact Address</th>
                                    <th scope="col">Contact Phone</th>
                                    <th scope="col">Contact Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($contact as $cont)
                                <tr>
                                    <th scope="row"> {{ $i++ }} </th>
                                    <td> {{ $cont->address }} </td>
                                    <td> {{ $cont->phone }} </td>
                                    <td> {{ $cont->email }} </td>
                                    <td>
                                        <a href="{{ url('contact/edit/'.$cont->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('contact/delete/'.$cont->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this contact?')">Delete</a>
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