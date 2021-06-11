@extends('base.base')

@section('body')

    <mail-component url="{{ route('api.sendMail') }}"></mail-component>

@stop

@push('scripts')
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endpush

