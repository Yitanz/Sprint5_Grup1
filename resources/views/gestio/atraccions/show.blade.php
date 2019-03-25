@extends("layouts.plantillaGestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("body")
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h2>Consultar Incidència: {{ $incidencia->titol }}</h2>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="#" action="#">
          <div class="form-group">
            <div class="col-md-6 mb-3">
              <label for="title">Nom atraccio</label>
              <input type="text" class="form-control form-control-sm" name="title" value="{{ $atraccio->nom_atraccio }}" disabled>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="description">Descripció</label>
                <textarea class="form-control form-control-sm" style="resize:none" name="description" rows="3" disabled></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="price">Altura minima :</label>
              <input type="text" class="form-control" name="alturamin" value="{{ $atraccio->altura_min }}" disabled />
            </div>
            <div class="form-group">
              <label for="quantity">Altura maxima:</label>
              <input type="text" class="form-control" name="alturamax" value="{{ $atraccio->altura_max}}" disabled />
            </div>
            <div class="form-group">
              <label for="quantity">Data d'ignauguracio:</label>
              <input type="date" class="form-control" name="datainauguracio" value="{{ $atraccio->data_inauguracio }}" disabled />
            </div>
            
            <div class="form-group">
              <label for="quantity">Accessible:</label>
              <select class="form-control form-control-sm" name="accessible" value="{{ $atraccio->accessibilitat }}" disabled >
            </div>
          <a href="{{ route('incidencies.index') }}" class="btn btn-secondary" type="reset">Tancar</a>
        </form>

      </main>

@endsection