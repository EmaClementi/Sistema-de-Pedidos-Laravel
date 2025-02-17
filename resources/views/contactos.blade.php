@extends('layouts.app')

@section('title', __('messages.contacts'))

@section('titulo', __('messages.contact_us'))

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <p><strong>{{ __('messages.phone')}}:</strong> +54 249 456 7890</p>
        <p><strong>{{ __('messages.email')}}:</strong> SistemaGestionPedidos@miempresa.com</p>
        <p><strong>{{ __('messages.address')}}:</strong> Pinto 123, Tandil, Argentina</p>
        <p><strong>{{ __('messages.pharases')}}</p>
    </div>
</div>
@endsection