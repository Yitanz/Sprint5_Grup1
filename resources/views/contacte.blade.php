@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")

<script>
function post()
{
  var nom = document.getElementByID("nom").value;
  var email = document.getElementByID("email").value;
  var opcio = document.getElementByID("opcio").value;
  var consulta = document.getElementByID("consulta").value;

  if( nom && email && opcio && consulta )
  {
    $.ajax
    ({
      type: 'post',
      url:  'post_data.php',
      data:
      {
        user_nom:nom,
        user_email:email,
        user_opcio:opcio,
        user_consulta:consulta
      },
      success: function (response)
      {
        document.getElementByID("status").innerHTML="Consulta enviada correctament";;
      }
    });
  }
  return false
}
</script>

<!-- CONTACTE -->
<div id="app" class="container jumbotron mt-3">
  <div class="row">
      <div class="col-sm-12">
        <form method="post" action="" onsubmit="return post();">
          <div class="form-group">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" name="nom" class="form-control" id="nom" aria-describedby="nameHelp" placeholder="Introdueix el nom">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email"  name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Introdueix el correu">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Opcions</label>
            <select class="custom-select" name="opcio" id="opcio">
              <option value="" disabled selected>Selcciona una opcio</option>
              <option value="1">Entrades</option>
              <option value="2">Botiga</option>
              <option value="3">Horaris</option>
              <option value="4">Devolucions</option>
              <option value="5">Comandes</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Consulta</label>
            <textarea class="form-control"  name="consulta" id="consulta" rows="3"></textarea>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Acceptar les condicions</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <p id="status"></p>
      </div>
  </div>
</div>


<!--  FI CONTACTA -->
@endsection

@section("footer")
@endsection
