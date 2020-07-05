@extends('layout.app',['current' => 'enterprise'])  
@section('body')
    <h4>Empresas</h4>
    <div class="ml-2 mb-3" >
        <button
            type="button"
            class="btn btn-primary" 
            data-toggle="modal" 
            data-target="#enterpriseDialog"
            onclick="clearForm()">
            Nova +</button>
    </div>
    <table class="table table-hover" id="enterpriseTable">
        <thead>
            <tr>    
                <th>Código</th>
                <th>Nome</th>
                <th>Nome fantasia</th>
                <th>CNPJ</th>
                <th>Inscrição Estadual</th>
                <th>email</th>
                <th>telefone</th>
                <th>rua</th>
                <th>complemento</th>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    @component('enterprise.formEnterprises')
        
    @endcomponent
@endsection
@section('javascript')
    @component('enterprise.jsLoadingEnterprises')@endcomponent
    @component('enterprise.jsCreateEnterprise')@endcomponent
    @component('enterprise.jsEditEnterprise')@endcomponent
    @component('enterprise.jsSubmitEnterprise')  @endcomponent
@endsection