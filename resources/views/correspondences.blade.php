@extends('layouts.default')

@section('main')
    <div class="wrapper">

        <section class="main-options">
            <div class="search-input">
                <i class="fas fa-search icon-input"></i>
                <input type="search" id="search-recipient" name="q" placeholder="Buscar destinatário" autofocus>
            </div>
                <a href="/" class="btn-new">Novo</a>
        </section>

        <section class="content">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
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
                <tbody>
                    @if(isset($error) && $error === true)
                        {{$message}}
                    @else
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
                                <td>Mais</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </section>

    </main>
@endsection