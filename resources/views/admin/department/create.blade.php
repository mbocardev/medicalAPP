@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-command bg-blue"></i>
                    <div class="d-inline">
                        <h5>Departement</h5>
                        <span>Ajouter un departement</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Departement</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Créer</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if (Session::has('message'))
                <div class="alert bg-success alert-success text-white" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Ajouter Departement</h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('department.store') }}" method="post">@csrf

                        <div class="form-group">
                            <label for="">Nom Departement </label>
                            <input type="text" name="department"
                                class="form-control @error('department') is-invalid @enderror"
                                value="{{ old('department') }}">
                            @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Soumettre</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
