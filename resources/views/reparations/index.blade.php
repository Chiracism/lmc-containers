@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reparation</h1>
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
                        <form method="GET" action="{{ route('reparations.index') }}">
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
                        <a href="{{ route('reparations.create')}}" class="btn btn-primary float-right">Add</a>
                    </div>
                </div>
            </div>
            {{-- <div class="row"> --}}
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Immatriculation</th>
                            <th scope="col">Type</th>
                            <th scope="col">Taille</th>
                            <th scope="col">Proprietaire</th>
                            {{-- <th scope="col">Matériel</th> --}}
                            <th scope="col">Pays</th>
                            <th scope="col">Réf. Fact.</th>
                            <th scope="col">Total</th>
                            {{-- <th scope="col">Constructeur</th> --}}
                            {{-- <th scope="col">Date Fab.</th>
                            <th scope="col">Date E.S.</th>
                            <th scope="col">Date E.S.</th>
                            <th scope="col">Date D.I.</th> --}}
                            {{-- <th scope="col">Valeur</th> --}}
                            {{-- <th scope="col">Devise</th> --}}
                            {{-- <th scope="col">Sté I.</th> --}}
                            {{-- <th scope="col">Constat</th> --}}
                            {{-- <th scope="col">Site</th>
                            <th scope="col">Sous-Site</th> --}}
                            {{-- <th scope="col">Observation</th> --}}
                            <th scope="col">Société de Réparation</th>
                            {{-- <th scope="col">Date OP.</th>
                            <th scope="col">Montant</th>
                            <th scope="col">N° Réçu</th> --}}
                            <th scope="col">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($masterfile as $masterfile)
                            <tr>
                                <th scope="row">{{ $masterfile->id }}</th>
                                <td>{{ $masterfile->numero_conteneur }}</td>
                                <td>{{ $masterfile->pays_id }}</td>
                                <td>{{ $masterfile->type_conteneur_id }}</td>
                                <td>{{ $masterfile->taille_conteneur_id }}</td>
                                <td>{{ $masterfile->proprietaire_id }}</td>
                                <td>{{ $masterfile->etat_conteneur_id }}</td>
                                <td>{{ $masterfile->date_mouvement }}</td>
                                <td>{{ $masterfile->client }}</td>
                                <td>{{ $masterfile->date_operation }}</td>
                                <td>{{ $masterfile->montant }}</td>
                                <td>{{ $masterfile->numero_recu }}</td>
                                <td><a href="{{ route('reparations.edit', $masterfile->id)}}" class="btn btn-success">Edit</a></td>
                            </tr>    
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            {{-- </div> --}}
        </div>
    </div>    
@endsection