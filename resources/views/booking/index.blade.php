@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Mes Rendez-Vous: {{ $appointments->count() }}</div>

                    <div class="card-body table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Docteur</th>
                                    <th scope="col">Heure</th>
                                    <th scope="col">Pour le</th>
                                    <th scope="col">Date créé</th>
                                    <th scope="col">Etat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $key=>$appointment)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $appointment->doctor->name }}</td>
                                        <td>{{ $appointment->time }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->created_at->format('m-d-yy') }}</td>
                                        <td>
                                            @if ($appointment->status == 0)
                                                <p>Non Visité</p>
                                            @else
                                                <p>Observé</p>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <td>Vous n'avez pas de Rendez-Vous</td>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
