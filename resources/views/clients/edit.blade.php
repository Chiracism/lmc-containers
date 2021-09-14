@extends('layouts.main')

@section('content')

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Client</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Client') }}
                        <a href="{{route('clients.index')}}" class="btn btn-success float-right">Back</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('clients.update', $client->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="client_id" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>
    
                                <div class="col-md-6">
                                    <input id="client_id" type="text" class="form-control @error('client_id') is-invalid @enderror" name="client_id" value="{{ old('client_id', $client->client_id) }}" required>
    
                                    @error('client_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="client_name" type="client_name" class="form-control @error('client_name') is-invalid @enderror" name="client_name" value="{{ old('client_name', $client->client_name) }}" required autocomplete="client_name">
                                    @error('client_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="client_impot" class="col-md-4 col-form-label text-md-right">{{ __('Impôt') }}</label>
                                <div class="col-md-6">
                                    <input id="client_impot" type="client_impot" class="form-control @error('client_impot') is-invalid @enderror" name="client_impot" value="{{ old('client_impot', $client->client_impot) }}" required autocomplete="client_impot">
                                    @error('client_impot')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="client_idnat" class="col-md-4 col-form-label text-md-right">{{ __('ID Nat') }}</label>
                                <div class="col-md-6">
                                    <input id="client_idnat" type="client_idnat" class="form-control @error('client_idnat') is-invalid @enderror" name="client_idnat" value="{{ old('client_idnat', $client->client_idnat) }}" required autocomplete="client_idnat">
                                    @error('client_idnat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                <div class="col-md-6">
                                    <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $client->address) }}" required autocomplete="address">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $client->phone) }}" required autocomplete="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $client->email) }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="activity" class="col-md-4 col-form-label text-md-right">{{ __('Activity') }}</label>
                                <div class="col-md-6">
                                    <input id="activity" type="activity" class="form-control @error('activity') is-invalid @enderror" name="activity" value="{{ old('activity', $client->activity) }}" required autocomplete="activity">
                                    @error('activity')
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
                    <form action="{{ route('clients.destroy', $client->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete {{ $client->client_name }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection