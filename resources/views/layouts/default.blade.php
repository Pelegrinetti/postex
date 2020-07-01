@extends('layouts.app')

@section('content')
<div class="container">
    <header class="header">
        <img src="{{ asset('images/logo-title.svg')}}" alt="Logo postex">
        <nav>
            <a href="{{route('logout')}}"">Sair <i class="fas fa-sign-out-alt"></i></a>
        </nav>
    </header>
    <nav class="sidebar">
        <ul>
            <li>
                <a href="{{ route('correspondences.index') }}"> <i class="far fa-envelope"></i> Correspondências</a>
            </li>
        </ul>
    </nav>
    @yield('main')
</div>
@endsection
