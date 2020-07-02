<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>

    <h1 class="card-title">Categorias</h1>
    <button 
        type="button" 
        class="btn btn-primary mb-3 ml-2" 
        data-toggle="modal" 
        data-target="#categoryDialog" 
        onclick="clearForm()">
                Nova Categoria
    </button>
    <table class="table table-hover" id="categoriesTable">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    @component('categories.formCategory') @endcomponent
</body>
</html>
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
@component('categories.jsLoadingCategories') @endcomponent
@component('categories.jsCreateCategory') @endcomponent
@component('categories.jsSubmitForm')  @endcomponent