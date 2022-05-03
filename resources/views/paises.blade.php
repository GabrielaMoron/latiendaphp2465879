<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Paises</title>
</head>
<body>
    <center><h1>Paises de la región </h1></center>
    <table class="table table-warning">
        <thead class= "thead-dark">
            <tr>
                <th>Pais</th>
                <th >capital</th>
                <th>moneda</th>
                <th>poblacion</th>
                <th>ciudades</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paises as $pais => $infopais)
            <tr>
                <td rowspan="{{ count($infopais['ciudades']) }}">
                    {{$pais}}
                </td>
                <td  rowspan="{{ count($infopais['ciudades']) }}">
                    {{$infopais["capital"]}}
                </td>
                <td  rowspan="{{ count($infopais['ciudades']) }}">
                    {{$infopais["moneda"]}}
                </td> 
                <td  rowspan="{{ count($infopais['ciudades']) }}">
                    {{$infopais["poblacion"]}}
                </td>
          @foreach($infopais["ciudades"] as $ciudad)
          <th>
              {{ $ciudad }}
            </th> 
        </tr>
            @endforeach
           @endforeach
</tbody>
        <tfoot></tfoot>
</table>
</body>
</html>