<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi <b>{{ Auth::user()->name }}</b>

            <span style="float:right ">
                Total Users: <span class="badge badge-danger">{{ count($users) }} </span>
            </span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Srl. Nr.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $single_user)
                                <tr>
                                    <th scope="row">{{ $single_user->id }}</th>
                                    <td>{{ $single_user->name }}</td>
                                    <td>{{ $single_user->email }}</td>
                                    <td>{{ $single_user->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>