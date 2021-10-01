@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Surestaries </h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __(' Add ') }}
                        <a href="{{route('surestaries.index')}}" class="btn btn-success float-right">Back</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('surestaries.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="surestarie_date" class="col-md-4 col-form-label text-md-right">{{ __(' Date de la Surestarie ') }}</label>
                                        <div class="col-md-4">
                                            <input id="surestarie_date" type="date" class="form-control @error('surestarie_date') is-invalid @enderror" name="surestarie_date" value="{{ old('surestarie_date') }}" required autocomplete="surestarie_date" autofocus>
            
                                            @error('surestarie_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="numero_conteneur" class="col-md-4 col-form-label text-md-right">{{ __('N° Immatriculation :') }}</label>
                                        <div class="col-md-8">
                                            <select id ="numero_conteneur" name="numero_conteneur" class="form-control" aria-label="Default select example">
                                                <option selected disabled> Choisir le numéro du Conteneur </option>
                                                 @foreach ($masterfile as $masterfile)
                                                <option value="{{ $masterfile->numero_conteneur }}">{{ $masterfile->numero_conteneur }}</option>
                                                 @endforeach
                                            </select>
                                                 @error('numero_conteneur')
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                                 </span>
                                                 @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="ex_navire" class="col-md-4 col-form-label text-md-right">{{ __('Ex. Navire') }}</label>
                                        <div class="col-md-8">
                                          <select id ="ex_navire" name="ex_navire" class="form-control" aria-label="Default select example">
                                            <option selected disabled> Choisir le Navire </option>
                                            @foreach ($navire as $navire)
                                            <option value="{{ $navire->navire_name }}">{{ $navire->navire_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('ex_navire')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                         <label for="date_arrivee" class="col-md-4 col-form-label text-md-right">{{ __('Date Arrivée') }}</label>

                                        <div class="col-md-6">
                                            <input id="date_arrivee" type="date" class="form-control @error('date_arrivee') is-invalid @enderror" name="date_arrivee" value="{{ old('date_arrivee') }}" required autocomplete="date_arrivee">
            
                                            @error('date_arrivee')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __('Client') }}</label>
                                        <div class="col-md-4">
                                            <select id ="client_name" name="client_name" class="form-control" aria-label="Default select example">
                                              <option selected disabled> Choisir le Client </option>
                                              @foreach ($client as $client)
                                              <option value="{{ $client->client_name }}">{{ $client->client_name }}</option>
                                              @endforeach
                                            </select>
                                              @error('client_name')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="port_name" class="col-md-4 col-form-label text-md-right">{{ __('Port') }}</label>
                                        <div class="col-md-8">
                                          <select id ="port_name" name="port_name" class="form-control" aria-label="Default select example">
                                            <option selected disabled> Choisir le Port </option>
                                            @foreach ($port as $port)
                                            <option value="{{ $port->port_name }}">{{ $port->port_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('port_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="size_name" class="col-md-4 col-form-label text-md-right">{{ __('Taille') }}</label>
                                        <div class="col-md-8">
                                          <select id ="size_name" name="size_name" class="form-control" aria-label="Default select example">
                                            <option selected disabled> Choisir la taille </option>
                                            @foreach ($size as $size)
                                            <option value="{{ $size->size_name }}">{{ $size->size_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('size_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                     <div class="form-group row">
                                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                        <div class="col-md-6">
                                            <input id="nombre" type="float" placeholder="0.0" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}">
                                            @error('nombre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="restitution_date" class="col-md-4 col-form-label text-md-right">{{ __(' Date de la Restitution ') }}</label>
                                        <div class="col-md-4">
                                            <input id="restitution_date" type="date" class="form-control @error('restitution_date') is-invalid @enderror" name="restitution_date" value="{{ old('restitution_date') }}" required autocomplete="restitution_date" autofocus>
                                            @error('restitution_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
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