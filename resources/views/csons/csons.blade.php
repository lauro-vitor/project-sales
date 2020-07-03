<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>CSON</title>
</head>
<body>
    <div class="" id="" style="text-align: center">
        <h1>CSON</h1>
    </div>
    <div>
        <button 
        type="button" 
        class="btn btn-primary mb-3 ml-2" 
        data-toggle="modal" 
        data-target="#csonDialog" 
        onclick="clearForm()">
                Novo+
    </button>
    </div>
    <table class="table table-hover" id="csonsId"> 
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Código</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    @component('csons.formCsons') @endcomponent
</body>
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
@component('csons.jsLoadingCson') @endcomponent
@component('csons.jsCreateCson') @endcomponent
@component('csons.jsEditCson')  @endcomponent
@component('csons.jsRemoveCson')  @endcomponent
@component('csons.jsSubmitCson')  @endcomponent
</html>