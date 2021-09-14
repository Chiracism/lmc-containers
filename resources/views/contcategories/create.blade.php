@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Type de Conteneur</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Rate') }}
                        <a href="{{route('contcategories.index')}}" class="btn btn-success float-right">Back</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('contcategories.store') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="type_conteneur_id" class="col-md-4 col-form-label text-md-right">{{ __('Abbreviation') }}</label>
    
                                <div class="col-md-6">
                                    <input id="type_conteneur_id" type="text" class="form-control @error('type_conteneur_id') is-invalid @enderror" name="type_conteneur_id" value="{{ old('type_conteneur_id') }}" required autocomplete="type_conteneur_id" autofocus>
    
                                    @error('type_conteneur_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="type_conteneur_name" class="col-md-4 col-form-label text-md-right">{{ __('Type de Conteneur') }}</label>
    
                                <div class="col-md-6">
                                    <input id="type_conteneur_name" type="type_conteneur_name" class="form-control @error('type_conteneur_name') is-invalid @enderror" name="type_conteneur_name" value="{{ old('type_conteneur_name') }}" required autocomplete="type_conteneur_name">
    
                                    @error('type_conteneur_name')
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