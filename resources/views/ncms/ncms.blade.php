<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>NCMS</title>
    <style>
        td {
        max-width: 70ch;
            
        white-space: wrap;
    }
    </style>
</head>
<body >
    <div style="text-align: center;">
        <h1>NCMS</h1>
    </div>
    <button 
        type="button" 
        class="btn btn-primary mb-3 ml-2" 
        data-toggle="modal" 
        data-target="#ncmFormDialog" 
        onclick="clearFormOfNcm()">
        Novo +
    </button>
    <table class="table table-hover" id="ncmsTable">
        <thead >
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nome</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    @component('ncms.ncmForm');
        
    @endcomponent
</body>
</html>
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
@component('ncms.jsLoadingNcms')    @endcomponent
@component('ncms.jsCreateNcm')  @endcomponent
@component('ncms.jsEditNcm')    @endcomponent
@component('ncms.jsRemoveNcm')  @endcomponent
@component('ncms.jsSubmitForm') @endcomponent