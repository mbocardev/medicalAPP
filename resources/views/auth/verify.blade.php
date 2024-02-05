@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifiez votre adresse Email') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Un lien de vérification a été envoyé dans votre mail.') }}
                            </div>
                        @endif

                        {{ __('Avant d\'y procéder, vérifiez le lien dans votre mail .') }}
                        {{ __('Si vous n\'avez pas reçu de mail') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquer ici pour demander un autre') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
