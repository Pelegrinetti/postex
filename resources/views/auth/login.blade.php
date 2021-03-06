@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-card">
        <img src="{{ asset('images/logo.svg')}}" alt="Logo Postex"/>
        <h1>{{config('app.name')}}</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="text" name="username" id="username" placeholder="Seu usuário" class="input-form" required autofocus>
                <input type="password" name="password" id="password" placeholder="Sua senha" class="input-form" required>
                <input type="submit" value="Entrar" class="btn-blue">
            </form>
    </div>
</div>
@endsection
