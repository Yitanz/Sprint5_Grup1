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

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Tickets: Assignar  a Ticket</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button class="btn btn-sm btn-outline-secondary" value="Exportar">
                <span data-feather="save"></span>
                Exportar
              </button>
            </div>
          </div>
        </div>
        <form action="{{ route('ticket.crearAssignacioTicket', $ticket->id) }}">
        <div class="row">
          <div class="col-4">
            <label for="example-date-input" class="col-6 col-form-label">Data inici</label>
            <input class="form-control" name="data_inici_assignacio_empleat" type="date">
          </div>
          <div class="col-4">
            <label for="example-date-input" class="col-6 col-form-label">Data fi</label>
            <input class="form-control" name="data_fi_assignacio_empleat"  type="date">
          </div>
          <div class="col-4">
<br>
<br>
     <button type="submit" class="btn">Enviar</button>
          </div>
        </div>
</form>

          </div>

@endsection
