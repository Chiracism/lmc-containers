@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Port</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Port') }}
                        <a href="{{route('ports.index')}}" class="btn btn-success float-right">Back</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('ports.update', $port->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="port_id" class="col-md-4 col-form-label text-md-right">{{ __('Abbreviation') }}</label>
    
                                <div class="col-md-6">
                                    <input id="port_id" type="text" class="form-control @error('port_id') is-invalid @enderror" name="port_id" value="{{ old('port_id', $port->port_id) }}" required>
    
                                    @error('port_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="port_name" class="col-md-4 col-form-label text-md-right">{{ __('Port') }}</label>
    
                                <div class="col-md-6">
                                    <input id="port_name" type="port_name" class="form-control @error('port_name') is-invalid @enderror" name="port_name" value="{{ old('port_name', $port->port_name) }}" required autocomplete="port_name">
    
                                    @error('port_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            {{-- <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div> --}}
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="m-2 p-2">
                    <form action="{{ route('ports.destroy', $port->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete {{ $port->port_name }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection