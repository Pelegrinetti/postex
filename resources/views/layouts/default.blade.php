@extends('layouts.app')

@section('content')
<div class="container">
    <header class="header">
        <img src="{{ asset('images/logo-title.svg')}}" alt="Logo postex">
        <nav>
            <a href="/">Sair <i class="fas fa-sign-out-alt"></i></a>
        </nav>
    </header>
    <nav class="sidebar">
        <ul>
            <li>
                <a href="/dashboard"> <i class="fas fa-columns"> </i>Dashboard</a>
            </li>
            <li>
                <a href="/correspondencias"> <i class="far fa-envelope"></i> Correspondências</a>
            </li>
            <li>
                <a href="/users"> <i class="far fa-user"></i> Usuários</a>
            </li>
        </ul>
    </nav>
    @yield('main')
</div>
@endsection
