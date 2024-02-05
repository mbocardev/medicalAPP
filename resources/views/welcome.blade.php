@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-8">
                <h1>Prendre Rendez-Vous Aujourd'hui!</h1>
                {{-- <h4>Use these crediential to test the app:</h4>
                <p>Admin--email: admin@gmail.com, password: password</p>
                <p>Patient--email: patient@gmail.com, password: password</p> --}}
                @guest
                    <div class="mt-5">
                        <a href="{{ url('/register') }}"> <button class="btn btn-primary">S'inscrire en tant que patient</button></a>
                        <a href="{{ url('/login') }}"><button class="btn btn-success">Se Connecter</button></a>
                    </div>
                @endguest
            </div>
        </div>

        {{-- Input --}}
        <form action="{{ url('/') }}" method="GET">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">Recherche de Docteurs</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-8">
                                <input type="date" name='date' id="datepicker" class='form-control'>
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <button class="btn btn-primary" type="submit">Rechercher</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        {{-- Display doctors --}}
        <div class="card">
            <div class="card-body">
                <div class="card-header">Liste des Docteurs disponibles: @isset($formatDate) {{ $formatDate }}
                    @endisset
                </div>
                <div class="card-body table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Expertise</th>
                                <th>Reservation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $key=>$doctor)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset('images') }}/{{ $doctor->doctor->image }}" alt="doctor photo"
                                            width="100px"></td>
                                    <td>{{ $doctor->doctor->name }}</td>
                                    <td>{{ $doctor->doctor->department }}</td>
                                    @if (Auth::check() && auth()->user()->role->name == 'patient')
                                        <td>
                                            <a href="{{ route('create.appointment', [$doctor->user_id, $doctor->date]) }}"><button
                                                    class="btn btn-primary">Rendez-Vous</button></a>
                                        </td>
                                    @else
                                        <td>Seulement pour les patients</td>
                                    @endif
                                </tr>
                            @empty
                                <td>Pas de docteur disponible</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
