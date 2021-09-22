@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sous-Site</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    {{-- </div> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Reparation') }}
                        <a href="{{route('reparations.index')}}" class="btn btn-success float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reparations.store') }}">
                            @csrf
                                
                                <div class="row">
                                    <div class="form-group row">
                                        <label for="numero_conteneur" class="col-md-4 col-form-label text-md-right">{{ __('N° Immatriculation:') }}</label>
                                        <div class="col-md-8">
                                          <select id ="numero_conteneur" name="numero_conteneur" class="form-control" aria-label="Default select example">
                                            <option selected disabled> Choisir le Pays </option>
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
                                <div class="row">
                                    <div class="form-group row">
                                        <label for="date_derniere_reparation" class="col-md-4 col-form-label text-md-right">{{ __('Date Dernière Réparation.') }}</label>
                                        <div class="col-md-6">
                                            <input id="date_derniere_reparation" type="date" class="form-control @error('date_derniere_reparation') is-invalid @enderror" name="date_derniere_reparation" value="{{ old('date_derniere_reparation') }}">
                                            @error('date_derniere_reparation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            {{-- <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="numero_conteneur" class="col-md-4 col-form-label text-md-right">{{ __('N° Immatriculation') }}</label>
                                        <div class="col-md-8">
                                            <input id="numero_conteneur" type="numero_conteneur" class="form-control @error('numero_conteneur') is-invalid @enderror" name="numero_conteneur" value="{{ old('numero_conteneur') }}">
                                            @error('numero_conteneur')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="col">
                                    <div class="form-group row">
                                        <label for="pays_id" class="col-md-4 col-form-label text-md-right">{{ __('Pays') }}</label>
                                        <div class="col-md-8">
                                          <select id ="pays_id" name="pays_id" class="form-control" aria-label="Default select example">
                                            <option selected disabled> Choisir le Pays </option>
                                            @foreach ($country as $country)
                                            <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="type_conteneur_id" class="col-md-4 col-form-label text-md-right">{{ __('Type Conteneur') }}</label>
                                        <div class="col-md-8">
                                          <select id ="type_conteneur_id" name="type_conteneur_id" class="form-control" aria-label="Default select example">
                                            <option selected disabled>Choisir le type</option>
                                            @foreach ($type as $type)
                                            <option value="{{ $type->type_name }}">{{ $type->type_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('type_conteneur_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="taille_conteneur_id" class="col-md-4 col-form-label text-md-right">{{ __('Taille Conteneur') }}</label>
                                        <div class="col-md-8">
                                          <select id ="taille_conteneur_id" name="taille_conteneur_id" class="form-control" aria-label="Default select example">
                                            <option selected disabled>Choisir la taille </option>
                                            @foreach ($size as $size)
                                            <option value="{{ $size->size_name }}">{{ $size->size_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('taille_conteneur_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{-- <div class="col">
                                    <div class="form-group row">
                                        <label for="owner_id" class="col-md-4 col-form-label text-md-right">{{ __('Code Propriétaire') }}</label>
                                        <div class="col-md-8">
                                          <select id ="owner_id" name="owner_id" class="form-control" aria-label="Default select example">
                                            <option selected disabled>Choisir le Code Proprieté</option>
                                            @foreach ($owner as $owner)
                                            <option value="{{ $owner->owner_id }}">{{ $owner->owner_id }}</option>
                                            @endforeach
                                          </select>
                                            @error('owner_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="proprietaire_id" class="col-md-4 col-form-label text-md-right">{{ __('Proprietaire') }}</label>
                                        <div class="col-md-8">
                                          <select id ="proprietaire_id" name="proprietaire_id" class="form-control" aria-label="Default select example">
                                            <option selected disabled>Choisir le Propriétaire</option>
                                            @foreach ($owner as $owner)
                                            <option value="{{ $owner->owner_id }}">{{ $owner->owner_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('proprietaire_id')
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
                                        <label for="pays_name" class="col-md-4 col-form-label text-md-right">{{ __(' Pays ') }}</label>
                                        <div class="col-md-8">
                                          <select id ="pays_name" name="pays_name" class="form-control" aria-label="Default select example">
                                            <option selected disabled> Choisir l'Etat </option>
                                            @foreach ($country as $country)
                                            <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('pays_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="constructeur" class="col-md-4 col-form-label text-md-right">{{ __('Constructeur') }}</label>
                                        <div class="col-md-8">
                                            <input id="constructeur" type="text" class="form-control @error('constructeur') is-invalid @enderror" name="constructeur" value="{{ old('constructeur') }}">
                                            @error('constructeur')
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
                                        <label for="date_fabrication" class="col-md-4 col-form-label text-md-right">{{ __('Date Fab.') }}</label>
                                        <div class="col-md-6">
                                            <input id="date_fabrication" type="date" class="form-control @error('date_fabrication') is-invalid @enderror" name="date_fabrication" value="{{ old('date_fabrication') }}">
                                            @error('date_fabrication')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="date_entrer_service" class="col-md-4 col-form-label text-md-right">{{ __('Date Mise en Service') }}</label>
                                        <div class="col-md-6">
                                            <input id="date_entrer_service" type="date" class="form-control @error('date_entrer_service') is-invalid @enderror" name="date_entrer_service" value="{{ old('date_entrer_service') }}">
            
                                            @error('date_entrer_service')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="date_derniere_inspection" class="col-md-4 col-form-label text-md-right">{{ __('Date Inspection') }}</label>
                                        <div class="col-md-6">
                                            <input id="date_derniere_inspection" type="date" class="form-control @error('date_derniere_inspection') is-invalid @enderror" name="date_derniere_inspection" value="{{ old('date_derniere_inspection') }}">
            
                                            @error('date_derniere_inspection')
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
                                        <label for="valeur_assuree" class="col-md-4 col-form-label text-md-right">{{ __('Valeur Assurée') }}</label>
                                        <div class="col-md-8">
                                            <input id="valeur_assuree" type="text" class="form-control @error('valeur_assuree') is-invalid @enderror" name="valeur_assuree" value="{{ old('valeur_assuree') }}">
                                            @error('valeur_assuree')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="devise_id" class="col-md-4 col-form-label text-md-right">{{ __('Devise') }}</label>
                                        <div class="col-md-8">
                                          <select id ="devise_id" name="devise_id" class="form-control" aria-label="Default select example">
                                            <option selected disabled> Choisir le Devise </option>
                                            @foreach ($devise as $devise)
                                            <option value="{{ $devise->devise_id }}">{{ $devise->devise_id }}</option>
                                            @endforeach
                                          </select>
                                            @error('devise_id')
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
                                        <label for="societe_inspection" class="col-md-4 col-form-label text-md-right">{{ __('Société Inspection') }}</label>
                                        <div class="col-md-8">
                                            <input id="societe_inspection" type="textarea" class="form-control @error('societe_inspection') is-invalid @enderror" name="societe_inspection" value="{{ old('societe_inspection') }}">
            
                                            @error('societe_inspection')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="dernier_constat" class="col-md-4 col-form-label text-md-right">{{ __('Dernier Constat') }}</label>
                                        <div class="col-md-8">
                                            <input id="dernier_constat" type="text" class="form-control @error('dernier_constat') is-invalid @enderror" name="dernier_constat" value="{{ old('dernier_constat') }}">
            
                                            @error('dernier_constat')
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
                                        <label for="site_id" class="col-md-4 col-form-label text-md-right">{{ __('Lieu ou Site') }}</label>
                                        <div class="col-md-8">
                                          <select id ="site_id" name="site_id" class="form-control" aria-label="Default select example">
                                            <option selected disabled>Choisir le Site</option>
                                            @foreach ($site as $site)
                                            <option value="{{ $site->site_name }}">{{ $site->site_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('site_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="sous_site_id" class="col-md-4 col-form-label text-md-right">{{ __('Sous-site') }}</label>
                                        <div class="col-md-8">
                                          <select id ="sous_site_id" name="sous_site_id" class="form-control" aria-label="Default select example">
                                            <option selected disabled>Choisir le Sous-site</option>
                                            @foreach ($sous_site as $sous_site)
                                            <option value="{{ $sous_site->sous_site_name }}">{{ $sous_site->sous_site_name }}</option>
                                            @endforeach
                                          </select>
                                            @error('sous_site_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="date_mouvement" class="col-md-4 col-form-label text-md-right">{{ __('Date Mvt') }}</label>
                                        <div class="col-md-8">
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
                                        <label for="observation" class="col-md-4 col-form-label text-md-right">{{ __('Observation') }}</label>
                                        <div class="col-md-8">
                                            <input id="observation" type="observation" class="form-control @error('observation') is-invalid @enderror" name="observation" value="{{ old('observation') }}">
            
                                            @error('observation')
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
                                                <option selected disabled>Choisir le Client</option>
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
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="date_operation" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>
                                            <div class="col-md-8">
                                                <input id="date_operation" type="date" class="form-control @error('date_operation') is-invalid @enderror" name="date_operation" value="{{ old('date_operation') }}">
                
                                                @error('date_operation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="montant" class="col-md-4 col-form-label text-md-right">{{ __('Montant') }}</label>
                                            <div class="col-md-8">
                                                <input id="montant" type="text" class="form-control @error('montant') is-invalid @enderror" name="montant" value="{{ old('montant') }}">
                
                                                @error('montant')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="numero_recu" class="col-md-4 col-form-label text-md-right">{{ __('N° réçu') }}</label>
                                            <div class="col-md-8">
                                                <input id="numero_recu" type="text" class="form-control @error('numero_recu') is-invalid @enderror" name="numero_recu" value="{{ old('numero_recu') }}">
                
                                                @error('numero_recu')
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