@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Reparation</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Site') }}
                        <a href="{{route('reparations.index')}}" class="btn btn-success float-right">Back</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('reparations.update',$reparation->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="numero_conteneur" class="col-md-4 col-form-label text-md-right">{{ __('N° Immatriculation ') }}</label>
                                <div class="col-md-6">
                                  <select id ="numero_conteneur" name="numero_conteneur" class="form-control" aria-label="Default select example">
                                    <option selected disabled> Choisir le numéro de Conteneur</option>
                                    @foreach ($reparations as $reparation)
                                    <option value="{{ $reparation->numero_conteneur }}" {{ $masterfile->numero_conteneur == $reparation->numero_conteneur ? 'selected' : ''}}>{{ $reparation->numero_conteneur }}</option>
                                    @endforeach
                                  </select>
                                    @error('numero_conteneur')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="sous_site_name" class="col-md-4 col-form-label text-md-right">{{ __('Sous-site') }}</label>
    
                                <div class="col-md-6">
                                    <input id="sous_site_name" type="sous_site_name" class="form-control @error('sous_site_name') is-invalid @enderror" name="sous_site_name" value="{{ old('sous_site_name',$sous_site->sous_site_name) }}" required>
    
                                    @error('sous_site_name')
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
                    <form action="{{ route('sous_sites.destroy', $sous_site->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete {{ $sous_site->sous_site_name }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection