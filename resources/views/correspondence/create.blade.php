@extends('layouts.default')

@section('main')
    <div class="wrapper">

        <section class="main-options">
            <div>
                <a href="{{ route('correspondences.index') }}"><i class="fas fa-arrow-left"></i> Voltar</a>
            </div>
        </section>

        <section class="form">
            <form action="{{ route('correspondence.save') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-5">
                        <label for="recipient">* Destinatário</label>
                        <input type="text" name="recipient" id="recipient" autofocus class="input-form" required placeholder="Nome">
                        @error('recipient')
                            <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                        <div class="col-4">
                            <label for="street">* Logradouro</label>
                            <input type="text" name="street" id="street" class="input-form" required placeholder="Logradouro">
                            @error('street')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-1">
                            <label for="number">* Número</label>
                            <input type="number" name="number" id="number" class="input-form" min="0" required placeholder="Número">
                            @error('number')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="neighborhood">* Bairro</label>
                            <input type="text" name="neighborhood" id="neighborhood" class="input-form" required placeholder="Bairro">
                            @error('neighborhood')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-2">
                            <label for="city">* Cidade</label>
                            <input type="text" name="city" id="city" class="input-form" required placeholder="Cidade">
                            @error('city')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-1">
                            <label for="uf">* UF</label>
                            <select id="if" name="uf" class="input-form" placeholder="teste" >
                                <option value="">Selecione</option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MS">MS</option>
                                <option value="MT">MT</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                             </select>
                            @error('uf')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="cep">* CEP</label>
                            <input type="text" name="cep" id="cep" class="input-form" required placeholder="CEP" min="0">
                            @error('cep')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-1">
                            <label for="id_recipient">* ID do destinatário</label>
                            <input type="number" name="id_recipient" id="id_recipient" class="input-form" required placeholder="ID" min="1">
                            @error('id_recipient')
                                <div class="alert-error"><i class="fas fa-exclamation-triangle"></i> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="status" value="pendente">
                <input type="submit" value="Cadastrar" class="btn-new">
            </form>
        </section>

    </div>
@endsection
