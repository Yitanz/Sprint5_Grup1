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
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp" placeholder="Introdueix el nom">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introdueix el correu">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Opcions</label>
            <select class="custom-select" id="inputGroupSelect01">
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
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Acceptar les condicions</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  </div>
</div>
<!--  FI CONTACTA -->
@endsection

@section("footer")
@endsection
