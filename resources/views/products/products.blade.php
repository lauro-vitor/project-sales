@extends('layout.app',['current' => 'produtos'])
@section('body')
    <div class="ml-2">
        <button 
            type="button" 
            class="btn btn-primary mb-3" 
            data-toggle="modal" 
            data-target="#productFormDialog" 
            onclick="clearFormOfProduct()">
                Novo +
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
    @component('products.jsProduct') @endcomponent
    @component('products.jsCreateProduct') @endcomponent
    @component('products.jsRemoveProduct') @endcomponent
    @component('products.jsEditProduct') @endcomponent
    @component('products.jsSubmitForm') @endcomponent
    <script>
        function openWindow(url) {
            window.open(url,'DescriptiveWindowName','esizable,scrollbars,status');
        }
    </script>
@endsection
