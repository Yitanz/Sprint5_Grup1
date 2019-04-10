@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<!-- SLIDER-->
<div id="carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" >
    <div class="carousel-item active">
      <img class="d-block w-100" src="/img/slider1.jpg" alt="imatge del parc">
      <div class="carousel-caption">
          <h2 class="text-center message"> Bevingut al parc dels teus somnis!</h2>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/img/slider2.jpg" alt="imatge del parc">
      <div class="carousel-caption">
          <h2 class="text-center message"> Bevingut al parc dels teus somnis!</h2>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/img/slider3.jpg" alt="imatge del parc">
      <div class="carousel-caption">
          <h2 class="text-center message"> Bevingut al parc dels teus somnis!</h2>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Prèvia</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Següent</span>
  </a>
</div>
<!-- FI SLIDER -->

<!-- PROMOCIONS -->
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="font-weight-bold text-center">PROMOCIONS NADAL 2019</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <a href="{{route('promocions')}}"><img src="/img/promocions/promocio1.jpg" class="img-fluid" alt="imatge promoció 1"></a>
    </div>
  </div>
</div>
<!-- FI PROMOCIONS -->

<!-- NOTICIES -->
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="font-weight-bold text-center text-uppercase">noticies</h1>
    </div>
  </div>
  <div class="row">
    @forelse($noticies as $noticia)
    <div class="col-sm-6">
      <div class="card flex-md-row mb-4 box-shadow h-md-250">
        <img class="card-img-top" alt="imatge de la noticia" style="width: 200px;height: 300px; object-fit: cover;" src="{{$noticia->path_img}}">

        <div class="card-body d-flex flex-column align-items-start">
          <a href="/noticies?catId={{$noticia->catId}}" class="d-inline-block mb-2 text-success" style="background: none;border: none;"> {{$noticia->categoria}}</a>
          <h3 class="mb-0">
            <a class="text-dark">{{$noticia->titol}}</a>
          </h3>
            <p class="card-text mb-auto">{!!html_entity_decode(str_limit($noticia->descripcio, $limit=100, $end = "..."))!!}</p>
            <form action="{{ route('noticia',$noticia->id)}}" method="get">
              <input type="hidden" name="id" value="{{$noticia->id}}">
              <button type="submit" class="btn btn-outline-info">Continuar llegint</button>
            </form>
          </div>
    </div>
  </div>
  @empty
  <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No hi han noticies a llistar</p>
  @endforelse
</div>
<!-- FI NOTICIES -->

<!-- LOCALITZA -->
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="font-weight-bold text-center">ON ESTEM?</h1>
    </div>
  </div>
  <div class="row">
    <!-- Div amb el mapa -->
    <div class="col-sm-12">
      <div id="myMap" style="position:relative;float:none;width:800px;height:400px;"></div>
    </div>
    </br><h3>Indicacions per arribar</h3></br>
    <div style="overflow-y:scroll; height:240px; margin-top:10%; float:none;position:relative;" id='directionsItinerary'></div>
  </div>
</div>
<!-- FI LOCALITZA -->
</div>

<!-- Script del mapa -->
<script type='text/javascript'>
        var map;
        var directionsManager;

        navigator.geolocation.getCurrentPosition(locationHandler);


          function GetMap()
          {
              map = new Microsoft.Maps.Map('#myMap', {});

              //Request the user's location. PARA QUE FUNCIONE BIEN EL POSITION.ALGO, HAY QUE CERRAR LA FUNCION JUSTO AL FINAL, ANTES DE GETMAP()
              navigator.geolocation.getCurrentPosition(function (position) {

                //Load the directions module.
                Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
                    //Create an instance of the directions manager.
                    directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);

                    //Create waypoints to route between.
                    var actualWaypoint = new Microsoft.Maps.Directions.Waypoint({ address: 'Ubicació actual', location: new Microsoft.Maps.Location(position.coords.latitude, position.coords.longitude) });
                    directionsManager.addWaypoint(actualWaypoint);

                    var univeylandiaWaypoint = new Microsoft.Maps.Directions.Waypoint({ address: 'Univeylandia', location: new Microsoft.Maps.Location(40.709141,0.582608) });
                    directionsManager.addWaypoint(univeylandiaWaypoint);

                    //Specify the element in which the itinerary will be rendered.
                    directionsManager.setRenderOptions({ itineraryContainer: '#directionsItinerary' });

                    //Calculate directions.
                    directionsManager.calculateDirections();
                });
            });
          }
    </script>
    <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AjdLFBRKgbKR0sxu-uDDL_7EEKlat1mtnz71o2ZFD79hUITk14qaGZRYlKRpW8Mz' async defer></script>

<!-- Fi del script del mapa -->
@endsection

@section("footer")
@endsection
