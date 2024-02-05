@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Mes prescriptions: {{ $prescriptions->count() }}</div>
                    <div class="card-body table-responsive-md">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Docteur</th>
                                    <th scope="col">Maladie</th>
                                    <th scope="col">Symptomes</th>
                                    <th scope="col">Medicines</th>
                                    <th scope="col">Instruction d'Usage </th>
                                    <th scope="col">Doctor's Feedback</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($prescriptions as $prescription)
                                    <tr>
                                        <td>{{ $prescription->date }}</td>
                                        <td>{{ $prescription->doctor->name }}</td>
                                        <td>{{ $prescription->name_of_disease }}</td>
                                        <td>{{ $prescription->symptoms }}</td>
                                        <td>{{ $prescription->medicine }}</td>
                                        <td>{{ $prescription->usage_instruction }}</td>
                                        <td>{{ $prescription->feedback }}</td>
                                    </tr>
                                @empty
                                    <td>Vous n'avez pas de prescriptions</td>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
