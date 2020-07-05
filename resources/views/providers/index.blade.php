@extends('layout.app')
@section('body')
    <div class="ml-1 mb-3">
        <button
            class="btn btn-primary"
            data-toggle="modal" 
            data-target="#providerDialog" 
            onclick="clearForm()"
        >
            Novo +
        </button>
    </div>
    <table class="table table-hover" id="providerTable">
        <thead >
            <th>código</th>
            <th>Nome</th>
            <th>Nome Fantasia</th>
            <th>CNPJ</th>
            <th>Tipo</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Empresa</th>
            <th>Opções</th>
        </thead>
        <tbody>

        </tbody>
    </table>
    <p id="errorTable" style="visibility: hidden;">Nehum elemento foi inserido na tabela</p>
    @component('providers.formProvider') @endcomponent
@endsection
@section('javascript')  
    @component('providers.jsLoadingEnterprises') @endcomponent 
    @component('providers.jsLoadingTypeProviders') @endcomponent 
    @component('providers.jsLoadingProviders') @endcomponent 
    @component('providers.jsCreateProvider') @endcomponent
    @component('providers.jsEdit')  @endcomponent
    @component('providers.jsRemoveProvider') @endcomponent
    @component('providers.jsSubmitForm') @endcomponent
@endsection