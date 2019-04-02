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

@if(session()->get('success'))
<div class="uper">
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div>
</div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Ticket: Assignar Empleat a Ticket</h1>
</div>

<div class="col-12">
  <div class="col-12 table-responsive">
    <table class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed" id="results_table" role="grid">
      <thead class="thead-light">
        <tr>
          <th>Nom</th>
          <th>Cognom1</th>
          <th>Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($user as $users)
        <tr>
          <td>{{ $users->nom }}</td>
          <td>{{ $users->cognom1 }}</td>
          <td>{{ $users->email }}</td>
          <td><a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#ModalEmpleat{{$users->id}}">Assignar</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
