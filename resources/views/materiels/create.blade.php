@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Materiel de Fabrication</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Materiel') }}
                        <a href="{{route('materiels.index')}}" class="btn btn-success float-right">Back</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('materiels.store') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="materiel_id" class="col-md-4 col-form-label text-md-right">{{ __('Numéro') }}</label>
    
                                <div class="col-md-6">
                                    <input id="materiel_id" type="text" class="form-control @error('materiel_id') is-invalid @enderror" name="materiel_id" value="{{ old('materiel_id') }}" required autocomplete="materiel_id" autofocus>
    
                                    @error('materiel_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="materiel_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="materiel_name" type="materiel_name" class="form-control @error('materiel_name') is-invalid @enderror" name="materiel_name" value="{{ old('materiel_name') }}" required autocomplete="materiel_name">
    
                                    @error('materiel_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="montant" class="col-md-4 col-form-label text-md-right">{{ __('Montant') }}</label>
    
                                <div class="col-md-6">
                                    <input id="montant" type="montant" class="form-control @error('montant') is-invalid @enderror" name="montant" value="{{ old('montant') }}" required autocomplete="montant">
    
                                    @error('montant')
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