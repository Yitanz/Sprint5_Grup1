@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")


  @if(session()->get('success'))
  <div class="uper">
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  </div>
  @endif
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Assignar Empleats Assignats a Zones</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
				  <div class="btn-group mr-2">
          <form>
					<button class="btn btn-sm btn-outline-secondary">
					  <span data-feather="save"></span>
					  Exportar</button>
				  </div>
          </form>
				</div>
    </div>

    <div class="col-12">
        <div class="col-12 table-responsive">
            <table class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                id="results_table" role="grid">
      <thead class="thead-light">
        <tr>
          <td>Zona</td>
          <td>Nom</td>
          <td>Cognom1</td>
          <td>Data Inici</td>
          <td>Data Fi</td>
          <td></td>

        </tr>
    </thead>
    <tbody>

        @foreach($assign as $assignar)
        <tr>
          <td>{{$assignar->nom_zona}}</td>
          <td>{{$assignar->nom}}</td>
          <td>{{$assignar->cognom1 }}</td>
          <td>{{$assignar->data_inici }}</td>
          <td>{{$assignar->data_fi }}</td>
          <td>
            <form action="{{ route('zones.emp.delete', $assignar->id)}}" method="get">
                @csrf
                @method('DELETE')
                    <button id="confirm_delete" class="btn btn-danger btn-sm" type="submit">Suprimir</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection
