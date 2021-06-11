{{--
@extends('mail.template')

@section('conteudo')
    <br><br>
    <h3>
        Você tem um novo email.<br>
        {!! $text !!}<br>
    </h3>
    <br><br><br><br>
@stop
--}}

Você tem um novo email.<br>

<br>
<br>

{{ $title }}<br>
{{ $text }}<br>
