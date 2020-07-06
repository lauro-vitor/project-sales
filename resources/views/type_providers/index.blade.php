<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tipo de forncedor</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div style="margin: 10px">
      <h2>Tipo de Fornecedor</h2>
  </div>
  <button
    class="btn btn-primary"
    data-toggle="modal" 
    data-target="#typeProviderDialog" 
    onclick="clearForm()"
    style="margin: 10px;">
      Novo +
  </button>
  <table class="table" id="typeProviderTable">
    <thead>
        <tr>
            <th>Código</th>
            <th>Descrição</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
  @component('type_providers.formTypeProviders')
      
  @endcomponent
</body>
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
@component('type_providers.jsLoadingTypeProvider') @endcomponent
@component('type_providers.jsCreateTypeProvider') @endcomponent
@component('type_providers.jsEditTypeProvider') @endcomponent
@component('type_providers.jsRemoveTypeProvider') @endcomponent
@component('type_providers.jsSubmitTypeProvider') @endcomponent
</html>