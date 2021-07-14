@extends('layouts.master')
@section('corps')
<div class="container alert-info">
    <div class="row justify-content-center mt-5 mb-5">
       <h4>Activez votre compte à travers le lien envoyé dans votre boite gmail</h4>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
            </div>
        @endif
        {{ __('Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.') }}
        {{ __('Si vous n\'avez pas reçu l\'e-mail') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour en demander un autre') }}</button>.
        </form>
    </div>
</div>
@endsection
