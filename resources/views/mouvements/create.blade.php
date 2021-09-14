@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sous-Site</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> 
    </div> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Mouvement Conteneur') }}
                        <a href="{{route('mouvements.index')}}" class="btn btn-success float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mouvements.store') }}">
                            @csrf
                                <div class="row">
                                    <div class="form-group row">
                                        <label for="numero_conteneur" class="col-md-4 col-form-label text-md-right">{{ __('N° Conteneur') }}</label>
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
                                 <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="site" class="col-md-4 col-form-label text-md-right">{{ __('Site') }}</label>
                                        <div class="col-md-8">
                                          <select id ="site" name="site" class="form-control" aria-label="Default select example">
                                            <option selected disabled> Choisir le Site </option>
                                            @foreach ($site as $site)
                                            <option value="{{ $site->site_name }}">{{ $site->site_id }}</option>
                                            @endforeach
                                          </select>
                                            @error('site')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="sous_site" class="col-md-4 col-form-label text-md-right">{{ __('Sous - Site') }}</label>
                                        <div class="col-md-8">
                                          <select id ="sous_site" name="sous_site" class="form-control" aria-label="Default select example">
                                            <option selected disabled>Choisir le Sous-Site </option>
                                            @foreach ($sous_site as $sous_site)
                                            <option value="{{ $sous_site->sous_site_name }}">{{ $sous_site->sous_site_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('sous_site')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="date_mouvement" class="col-md-4 col-form-label text-md-right">{{ __('Date Mouvement') }}</label>
                                        <div class="col-md-6">
                                            <input id="date_mouvement" type="date" class="form-control @error('date_mouvement') is-invalid @enderror" name="date_mouvement" value="{{ old('date_mouvement') }}">
                                            @error('date_mouvement')
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
                                        <label for="ex_navire" class="col-md-4 col-form-label text-md-right">{{ __('Navire') }}</label>
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
                                        <div class="col-md-8">
                                            <input id="date_arrivee" type="date" class="form-control @error('date_arrivee') is-invalid @enderror" name="date_arrivee" value="{{ old('date_arrivee') }}">
                                            @error('date_arrivee')
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="port" class="col-md-4 col-form-label text-md-right">{{ __('Port') }}</label>
                                        <div class="col-md-8">
                                          <select id ="port" name="port" class="form-control" aria-label="Default select example">
                                            <option selected disabled> Choisir le Port </option>
                                            @foreach ($port as $port)
                                            <option value="{{ $port->port_name }}">{{ $port->port_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('port')
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
                                        <label for="client" class="col-md-4 col-form-label text-md-right">{{ __('Client') }}</label>
                                        <div class="col-md-8">
                                            <select id ="client" name="client" class="form-control" aria-label="Default select example">
                                              <option selected disabled> Choisir le Client </option>
                                              @foreach ($client as $client)
                                              <option value="{{ $client->client_name }}">{{ $client->client_name }}</option>
                                              @endforeach
                                            </select>
                                              @error('client')
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
                                        <label for="etat_conteneur" class="col-md-4 col-form-label text-md-right">{{ __('Etat Conteneur') }}</label>
                                        <div class="col-md-8">
                                          <select id ="etat_conteneur" name="etat_conteneur" class="form-control" aria-label="Default select example">
                                            <option selected disabled> Choisir l'Etat </option>
                                            @foreach ($etatdeConteneur as $etatdeConteneur)
                                            <option value="{{ $etatdeConteneur->etat_conteneur_name }}">{{ $etatdeConteneur->etat_conteneur_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('etat_conteneur')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="type_conteneur" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                                        <div class="col-md-8">
                                          <select id ="type_conteneur" name="type_conteneur" class="form-control" aria-label="Default select example">
                                            <option selected disabled> Choisir le type </option>
                                            @foreach ($type as $type)
                                            <option value="{{ $type->type_name }}">{{ $type->type_id }}</option>
                                            @endforeach
                                          </select>
                                            @error('type_conteneur')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="type_conteneur" class="col-md-4 col-form-label text-md-right">{{ __('Taille') }}</label>
                                        <div class="col-md-8">
                                          <select id ="type_conteneur" name="type_conteneur" class="form-control" aria-label="Default select example">
                                            <option selected disabled> Choisir la taille </option>
                                            @foreach ($size as $size)
                                            <option value="{{ $size->size_name }}">{{ $size->size_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('type_conteneur')
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
                                        <label for="nombre_conteneur" class="col-md-4 col-form-label text-md-right">{{ __('Nbr. Conteneur') }}</label>
                                        <div class="col-md-8">
                                            <input id="nombre_conteneur" type="text" class="form-control @error('nombre_conteneur') is-invalid @enderror" name="nombre_conteneur" value="{{ old('nombre_conteneur') }}">
            
                                            @error('nombre_conteneur')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="observation" class="col-md-4 col-form-label text-md-right">{{ __('Observation') }}</label>
                                        <div class="col-md-8">
                                        <textarea name="observation" id="observation" class="form-control" cols="30" rows="3"></textarea>
                                        @error('observation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary float-right">
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