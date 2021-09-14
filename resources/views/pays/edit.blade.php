@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pays</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Pays') }}
                        <a href="{{route('pays.index')}}" class="btn btn-success float-right">Back</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('pays.update', $pays->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="pays_id" class="col-md-4 col-form-label text-md-right">{{ __('Index') }}</label>
    
                                <div class="col-md-6">
                                    <input id="pays_id" type="text" class="form-control @error('pays_id') is-invalid @enderror" name="pays_id" value="{{ old('pays_id', $pays->pays_id) }}" required>
    
                                    @error('pays_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="pays_name" class="col-md-4 col-form-label text-md-right">{{ __('Pays') }}</label>
    
                                <div class="col-md-6">
                                    <input id="pays_name" type="pays_name" class="form-control @error('pays_name') is-invalid @enderror" name="pays_name" value="{{ old('pays_name', $pays->pays_name) }}" required autocomplete="pays_name">
    
                                    @error('pays_name')
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
                    <form action="{{ route('pays.destroy', $pays->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete {{ $pays->pays_name }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection