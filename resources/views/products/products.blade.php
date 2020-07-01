@extends('layout.app',['current' => 'produtos'])
@section('body')
    <div style="text-align: end; margin-right: 8%;">
        <button 
            type="button" 
            class="btn btn-primary mb-3" 
            data-toggle="modal" 
            data-target="#productFormDialog" >
                Novo Produto
        </button>
    </div>
    <table class="table table-hover" id="productsTable" >
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Referência</th>
                <th>Categoria</th> 
                <th>NCM</th>
                <th>Alíquota</th>
                <th>CSON</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    @component('products.formProduct')
    @endcomponent
@endsection

@section('javascript')
    @component('componentsjs.productjs')
    @endcomponent
@endsection
