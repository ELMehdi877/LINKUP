@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <h1>Register</h1>

    <form method="POST" action="/register">
        @csrf

        <div>
            <label>Nom</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email">
        </div>

        <div>
            <label>Mot de passe</label>
            <input type="password" name="password">
        </div>

        <button type="submit">S'inscrire</button>
    </form>
@endsection

@if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li style="color:red">{{$error}}</li>
        @endforeach
    </ul>
@endif


