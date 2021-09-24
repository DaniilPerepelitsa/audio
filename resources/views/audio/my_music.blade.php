@extends('layout')

@section('content')
    <my-music :auth_id="{{ $auth_id }}"></my-music>
@endsection
