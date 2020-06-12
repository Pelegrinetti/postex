@extends('layouts.default')

@section('main')
    <div class="wrapper">

        <section class="main-options">
            <div class="search-input">
                <i class="fas fa-search icon-input"></i>
                <input type="search" id="search-recipient" name="q" placeholder="Buscar destinatário" autofocus>
            </div>
            <a href="{{ route('correspondence.create') }}" class="btn-new">Novo</a>
        </section>

        <section class="table">
            <table class="content-table">
                <thead class="table-head">
                    <tr>
                        <th>ID</th>
                        <th>Destinatário</th>
                        <th>Logradouro</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>CEP</th>
                        <th>Mais</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                @foreach ($correspondences as $correspondence)
                    <tr>
                        <td>{{$correspondence->id}}</td>
                        <td>{{$correspondence->recipient}}</td>
                        <td>{{$correspondence->street}}</td>
                        <td>{{$correspondence->number}}</td>
                        <td>{{$correspondence->neighborhood}}</td>
                        <td>{{$correspondence->city}}</td>
                        <td>{{$correspondence->uf}}</td>
                        <td>{{$correspondence->cep}}</td>
                        <td><i class="fas fa-caret-down"></i></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>

    </div>
@endsection