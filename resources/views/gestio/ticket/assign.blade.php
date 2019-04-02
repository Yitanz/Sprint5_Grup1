@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

  <style>
    .uper {
      margin-top: 40px;
    }
  </style>
<div class="modal fade" id="ModalEmpleat{{$users->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Assignar Empleat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('atraccions.guardarAssignacio', $atraccio->id) }}" >
      @csrf
      <div class="modal-body">
        <div class="row">
          <div class="col-6">
            <span>Atraccio:</span>
            <input type="text" class="form-control" name="id_atraccio" value="{{ $atraccio->id }}" hidden/>
            <input type="text" class="form-control" name="nom_atraccio" value="{{ $atraccio->nom_atraccio }}" disabled />
          </div>
          <div class="col-6">
            <span>Empleat:</span>
            <input type="text" class="form-control" name="id_empleat" value="{{ $users->id }}" hidden />
            <input type="text" class="form-control" name="nom_empleat" readonly value="{{ $users->nom}}"/>
          </div>
          <div class="col-6">
            <span>Data Inici:</span>
            <input type="date" class="form-control" name="data_inici_modal" readonly value="{{ $data_inici_global}}"/>
          </div>

          <div class="col-6">
            <span>Data Fi:</span>
            <input type="date" class="form-control" name="data_fi_modal" readonly value="{{ $data_fi_global}}"/>
          </div>
          <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Finalitzar assignament</button>
      </div>
      </form>
      </div>
  </div>
</div>

@endsection
