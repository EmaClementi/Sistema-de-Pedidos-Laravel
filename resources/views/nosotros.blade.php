@extends('layouts.app')

@section('title', __('messages.about_us'))

@section('titulo', __('messages.about_us'))

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <p><strong>{{ __('messages.info')}}</p>
        <p><strong>{{ __('messages.thank')}}</p>
    </div>
</div>
@endsection
