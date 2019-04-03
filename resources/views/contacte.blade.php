@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")



<!-- CONTACTE -->
<div id="app" class="container jumbotron mt-3">
  <div class="row">
      <div class="col-sm-12">
        <form id="form">
          @csrf
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
            <select class="custom-select" name="tipus_pregunta" id="tipus_pregunta">
              <option value="" disabled selected>Selcciona una opcio</option>
              <option value="Entrades">Entrades</option>
              <option value="Botiga">Botiga</option>
              <option value="Horaris">Horaris</option>
              <option value="Devolucions">Devolucions</option>
              <option value="Comandes">Comandes</option>
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
          <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        <!--  <textarea id="response" style="width: 80px; height: 40px; resize: none;"></textarea>-->
        </form>
      </div>
  </div>
</div>


<script>

$(document).ready(function(){
   jQuery('#submit').click(function(e){
     e.preventDefault();
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $.ajax({
      url: "contacte",
      type: "post",
      data: {
        nom: jQuery('#nom').val(),
        email: jQuery('#email').val(),
        tipus_pregunta: jQuery('#tipus_pregunta').val(),
        consulta: jQuery('#consulta').val()

      },
      error: function(xhr, status, error) {
  alert("Error: " + xhr.status + " - " + error);
},
      success: function(result) {
        $("#submit").html("Enviat Correctament");
         $("#submit").attr("disabled", true);

         $("#submit").removeClass("btn btn-primary");

         $("#submit").addClass("btn btn-success");
          console.log(result);
      }});
  });
});

</script>

<!--  FI CONTACTA -->
@endsection

@section("footer")
@endsection
