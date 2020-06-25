@extends('layouts.default')

@section('main')
    <div class="wrapper">

        <section class="main-options">
            <div>
                <a href="{{ route('correspondences.index') }}"><i class="fas fa-arrow-left"></i> Voltar</a>
            </div>
        </section>

        <section class="form">
            <form action="{{ route('correspondence.edit.save') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$correspondence->id}}">
                <div class="row">
                    <div class="col-5">
                        <label for="recipient">* Destinatário</label>
                      <input type="text" name="recipient" id="recipient" autofocus class="input-form" required placeholder="Nome" value="{{$correspondence->recipient}}">
                        @error('recipient')
                            <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                        <div class="col-4">
                            <label for="street">* Logradouro</label>
                            <input type="text" name="street" id="street" class="input-form" required placeholder="Logradouro" value="{{$correspondence->street}}">
                            @error('street')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-1">
                            <label for="number">* Número</label>
                            <input type="number" name="number" id="number" class="input-form" min="0" required placeholder="Número" value="{{$correspondence->number}}">
                            @error('number')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="neighborhood">* Bairro</label>
                            <input type="text" name="neighborhood" id="neighborhood" class="input-form" required placeholder="Bairro" value="{{$correspondence->neighborhood}}">
                            @error('neighborhood')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-2">
                            <label for="city">* Cidade</label>
                            <input type="text" name="city" id="city" class="input-form" required placeholder="Cidade" value="{{$correspondence->city}}">
                            @error('city')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-1">
                            <label for="uf">* UF</label>
                            <select id="uf" name="uf" class="input-form">
                                <option value="">Selecione</option>
                            @foreach ($uf_list as $uf)
                                <option value="{{ $uf }}" @if($uf === $correspondence->uf) selected @endif>{{ $uf }}</option>
                            @endforeach
                             </select>
                            @error('uf')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="cep">* CEP</label>
                            <input type="text" name="cep" id="cep" class="input-form" required placeholder="CEP" min="0" value="{{$correspondence->cep}}">
                            @error('cep')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-1">
                            <label for="id_recipient">* ID do destinatário</label>
                            <input type="number" name="id_recipient" id="id_recipient" class="input-form" required placeholder="ID" min="1" value="{{$correspondence->id_recipient}}">
                            @error('id_recipient')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                <input type="submit" value="Salvar" class="btn-new">
            </form>
        </section>

    </div>
@endsection
