@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>
@endsection

@if(session('success'))
    <p style="color : green">{{session('success')}}</p>
@endif
