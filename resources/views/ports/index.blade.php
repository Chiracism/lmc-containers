@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Port</h1>
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
                        <form method="GET" action="{{ route('ports.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="text" name="search" class="form-control mb-2" id="inlineFormInput" placeholder=" Enter ">
                                </div>
                                <div class="col">
                                     <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('ports.create')}}" class="btn btn-primary float-right">Add</a>
                    </div>
                </div>
            </div>
            {{-- <div class="row"> --}}
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Abbreviation</th>
                            <th scope="col">Port</th>
                            <th scope="col">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($port as $port)
                            <tr>
                                <th scope="row">{{ $port->id }}</th>
                                <td>{{ $port->port_id }}</td>
                                <td>{{ $port->port_name }}</td>
                                <td><a href="{{ route('ports.edit', $port->id)}}" class="btn btn-success">Edit</a></td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            {{-- </div> --}}
        </div>
    </div>    
@endsection