@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Navire</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Navire') }}
                        <a href="{{route('navires.index')}}" class="btn btn-success float-right">Back</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('navires.store') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="navire_id" class="col-md-4 col-form-label text-md-right">{{ __('Numéro') }}</label>
    
                                <div class="col-md-6">
                                    <input id="navire_id" type="navire_id" class="form-control @error('navire_id') is-invalid @enderror" name="navire_id" value="{{ old('navire_id') }}" required autocomplete="navire_id" autofocus>
    
                                    @error('navire_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="navire_name" class="col-md-4 col-form-label text-md-right">{{ __('Navire') }}</label>
    
                                <div class="col-md-6">
                                    <input id="navire_name" type="navire_name" class="form-control @error('navire_name') is-invalid @enderror" name="navire_name" value="{{ old('navire_name') }}" required autocomplete="navire_name">
    
                                    @error('navire_name')
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
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection