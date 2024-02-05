@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Prescription</h2>
                    </div>
                    <div class="card-body table-responsive-md">
                        <p>Date: {{ $prescription->date }}</p>
                        <p>Patient: {{ $prescription->user->name }}</p>
                        <p>Docteur: {{ $prescription->doctor->name }}</p>
                        <p>Maladiee: {{ $prescription->name_of_disease }}</p>
                        <p>Symptomes: {{ $prescription->symptoms }}</p>
                        <p>Medicines: {{ $prescription->medicine }}</p>
                        <p>Instruction d'Usage: {{ $prescription->usage_instruction }}</p>
                        <p>Retour: {{ $prescription->feedback }}</p>
                        <p>Signature Docteur:{{ $prescription->signature }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
