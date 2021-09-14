@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Clients</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    <div class="row">
        <div class="card mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message')}}
                    </div>
                @endif
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form method="GET" action="{{ route('clients.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="text" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Enter Client number ">
                                </div>
                                <div class="col">
                                     <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('clients.create')}}" class="btn btn-primary float-right">Add</a>
                    </div>
                </div>
            </div>
            {{-- <div class="row"> --}}
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Impot</th>
                            <th scope="col">ID Nat</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($client as $client)
                            <tr>
                                <th scope="row">{{ $client->id }}</th>
                                <td>{{ $client->client_id }}</td>
                                <td>{{ $client->client_name }}</td>
                                <td>{{ $client->client_impot }}</td>
                                <td>{{ $client->client_idnat }}</td>
                                <td>{{ $client->address }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->activity }}</td>
                                <td><a href="{{ route('clients.edit', $client->id)}}" class="btn btn-success">Edit</a></td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            {{-- </div> --}}
        </div>
    </div>    
@endsection