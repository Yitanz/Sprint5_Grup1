<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    </title>
  </head>
  <body>
      <div>
        <img margin="0px" src="/home/alumne/Documentos/univeylandia_sprint3_final/public/img/univeylandia_logo_petit.png">
      </div>
    <br>
    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th>Zona</th>
            <th>Empleat</th>
            <th>Data Inici</th>
            <th>Data Fi</th>
            </tr>
          </thead>
          @foreach($assignacions as $assign)
          <tr>
            <td>
              {{$assign->nom_zona}}
            </td>
            <td>
              {{$assign->nom_empleat}}
            </td>
            <td>
              {{$assign->data_inici}}
            </td>
            <td>
              {{$assign->data_fi}}
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>
