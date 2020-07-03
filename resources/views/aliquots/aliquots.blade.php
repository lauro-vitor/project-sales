<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div style="text-align: center">
        <h1>Alíquotas</h1>
    </div>
    <div class="mb-3 ml-2">
        <button 
            type="button"
            class="btn btn-primary" 
            data-toggle="modal" 
            data-target="#aliquotDialog"
            onclick="clearForm()">
                Nova +
        </button>
    </div>
    <table class="table table-hover" id="aliquotsTable">
        <thead>
            <tr>
                <th>Código</th>
                <th>Estado  </th>
                <th>Valor</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</body>
@component('aliquots.formAliquot')  @endcomponent
</html>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@component('aliquots.jsLoadingAliquots')  @endcomponent
@component('aliquots.jsCreateAliquot')  @endcomponent
@component('aliquots.jsEditAliquot')  @endcomponent
@component('aliquots.jsRemoveAliquot')  @endcomponent
@component('aliquots.jsSubmitForm')  @endcomponent