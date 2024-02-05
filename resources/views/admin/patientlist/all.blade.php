@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Total Rendez-Vous: {{ $bookings->count() }}
                    </div>
                    <form action="{{ route('patients') }}" method="GET">

                        <div class="card-header">
                            Filtrer par Date: &nbsp;
                            <div class="row">
                                <div class="col-md-10 col-sm-6">
                                    <input type="text" class="form-control datetimepicker-input" id="datepicker"
                                        data-toggle="datetimepicker" data-target="#datepicker" name="date"
                                        placeholder=@isset($date) {{ $date }} @endisset>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <button type="submit" class="btn btn-primary">Rechercher</button>
                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="card-body table-responsive-lg">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Patient</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">telephone</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">heure</th>
                                    <th scope="col">Docteur</th>
                                    <th scope="col">Etat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $key=>$booking)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="profile/{{ $booking->user->image }}" width="80">
                                        </td>
                                        <td>{{ $booking->date }}</td>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->user->email }}</td>
                                        <td>{{ $booking->user->phone_number }}</td>
                                        <td>{{ $booking->user->gender }}</td>
                                        <td>{{ $booking->time }}</td>
                                        <td>{{ $booking->doctor->name }}</td>
                                        <td>
                                            @if ($booking->status == 0)
                                                <a href="{{ route('update.status', [$booking->id]) }}"><button
                                                        class="btn btn-warning">En attente</button></a>
                                            @else
                                                <a href="{{ route('update.status', [$booking->id]) }}"><button
                                                        class="btn btn-success">Validé</button></a>
                                            @endif
                                        </td>

                                    </tr>
                                @empty
                                    <td>Il n'y a pas de Rendez-Vous!</td>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination --}}
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
