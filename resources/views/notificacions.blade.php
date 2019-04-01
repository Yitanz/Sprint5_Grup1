@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")

<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="font-weight-bold text-center text-uppercase">Tasques</h3>
        </div>
    </div>

    @if(session()->get('success'))
    <div class="uper">
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
    </div>
    @endif



@endsection

@section("footer")
@endsection
