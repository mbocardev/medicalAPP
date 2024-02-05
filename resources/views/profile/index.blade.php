@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <div class="row ">

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Profil</div>

                    <div class="card-body">
                        <p>Nom: {{ auth()->user()->name }}</p>
                        <p>Email: {{ auth()->user()->email }}</p>
                        <p>Adresse: {{ auth()->user()->address }}</p>
                        <p>Telehone: {{ auth()->user()->phone_number }}</p>
                        <p>Genre: {{ auth()->user()->gender }}</p>
                        <p>Bio: {{ auth()->user()->description }}</p>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Mise à jour du Profil</div>

                    <div class="card-body">
                        <form action="{{ route('profile.store') }}" method="post">@csrf
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ auth()->user()->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>Adresse</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ auth()->user()->address }}">

                            </div>
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" name="phone_number" class="form-control"
                                    value="{{ auth()->user()->phone_number }}">

                            </div>
                            <div class="form-group">
                                <label>Genre</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">select gender</option>
                                    <option value="male" @if (auth()->user()->gender === 'male')selected @endif
                                        >Masculin</option>
                                    <option value="female" @if (auth()->user()->gender === 'female')selected @endif
                                        >Feminin</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="form-group">
                                    <label>Bio</label>
                                    <textarea name="description"
                                        class="form-control">{{ auth()->user()->description }}</textarea>

                                </div>
                                <div class="form-group">

                                    <button class="btn btn-primary" type="submit">Mettre à jour le profil</button>

                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Modifier  l'image</div>
                    <form action="{{ route('profile.pic') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="card-body">
                            @if (!auth()->user()->image)
                                <img src="/images/blank.png" width="120">
                            @else
                                <img src="/profile/{{ auth()->user()->image }}" width="120">
                            @endif
                            <br>
                            <input type="file" name="file" class="form-control" required="">
                            <br>
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button type="submit" class="btn btn-primary">Modifier</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
