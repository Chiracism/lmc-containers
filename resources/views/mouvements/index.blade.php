@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mouvement Conteneur</h1>
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
                        <form method="GET" action="{{ route('mouvements.index') }}">
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
                        <a href="{{ route('mouvements.create')}}" class="btn btn-primary float-right">Add</a>
                    </div>
                </div>
            </div>
            {{-- <div class="row"> --}}
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">N° Conteneur</th>
                            <th scope="col">Site</th>
                            <th scope="col">Sous-site</th>
                            <th scope="col">Date</th>
                            <th scope="col">Navire</th>
                            <th scope="col">Port</th>
                            <th scope="col">Client</th>
                            <th scope="col">Etat/Situation</th>
                            <th scope="col">Type</th>
                            <th scope="col">Taille</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Observation</th>
                            <th scope="col">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($mouvement as $mouvement)
                            <tr>
                                <th scope="row">{{ $mauvement->id }}</th>
                                <td>{{ $mouvement->numero_conteneur }}</td>
                                <td>{{ $mouvement->site }}</td>
                                <td>{{ $mouvement->sous_site }}</td>
                                <td>{{ $mouvement->taille_conteneur_id }}</td>
                                <td>{{ $mouvement->date_mouvement }}</td>
                                <td>{{ $mouvement->ex_navire }}</td>
                                <td>{{ $mouvement->date_arrivee }}</td>
                                <td>{{ $mouvement->port }}</td>
                                <td>{{ $mouvement->client }}</td>
                                <td>{{ $mouvement->etat_conteneur }}</td>
                                <td>{{ $mouvement->type_conteneur }}</td>
                                <td>{{ $mouvement->size }}</td>
                                <td>{{ $mouvement->nombre_conteneur }}</td>
                                <td>{{ $mouvement->observation }}</td>
                                <td><a href="{{ route('mouvements.edit', $mouvement->id)}}" class="btn btn-success">Edit</a></td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            {{-- </div> --}}
        </div>
    </div>    
@endsection