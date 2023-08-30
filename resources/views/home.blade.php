@if (Auth::user()->role == "Technicien" xor Auth::user()->role == "Ingenieur" )
<script>
	window.location = "/homet";
</script>
@else

@extends('layouts.app')
@extends('layouts.dashboard')
@section('content')

<!-- WRAPPER -->
<div id="wrapper">
	
  @include('menu.menutop')
	@include('menu.menuleft')

<!-- !PAGE CONTENT! -->
<div class="main" style="margin-left:250px;margin-top:10px">
  <!-- Header -->

  <div class="therichpost-row-padding therichpost-margin-bottom">
    <div class="therichpost-quarter">
      <div class="therichpost-container therichpost-red therichpost-padding-16">
        <div class="therichpost-left"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="50" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
          <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
          <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
        </svg></div>
        
        <div class="therichpost-right">
          <h3>{{ $contrats }}</h3>
        </div>
        <div class="therichpost-clear"><a href="/cm">
        <h4 style="color:rgb(255, 255, 255)">Contrats proche d'expiration</h4></a></div>
      </div>
    </div>
    <div class="therichpost-quarter">
      <div class="therichpost-container therichpost-blue therichpost-padding-16">
        <div class="therichpost-left"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="50" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
          <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
          <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
        </svg></div>
        <div class="therichpost-right">
        
          <h3>{{ $nbrtechniciens }}</h3>
        </div>
        <div class="therichpost-clear"><a href="/users">
        <h4 style="color:rgb(255, 255, 255)"> Techniciens disponibles</h4></a></div>
      </div>
    </div>
    <div class="therichpost-quarter">
      <div class="therichpost-container therichpost-teal therichpost-padding-16">
        <div class="therichpost-left"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="50" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
          <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
        </svg></div>
        <div class="therichpost-right">
          <h3>{{ $diec }}</h3>
        </div>
        <div class="therichpost-clear"><a href="/di">
        <h4 style="color:rgb(255, 255, 255)">Intervention en cours</h4></a></div>
      </div>
    </div>
	
    <div class="therichpost-quarter">
      <div class="therichpost-container therichpost-orange therichpost-text-white therichpost-padding-16">
        <div class="therichpost-left"><i class="fa fa-bookmark  therichpost-xxxlarge"></i></div>
        <div class="therichpost-right">
          <h3>{{ $dimp }}</h3>
        </div>
        <div class="therichpost-clear"><a href="/mp">
        <h4 style="color:rgb(255, 255, 255)">MP planifié</h4></a></div>

      </div>
    </div>
  </div>


		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">

				<div class="row">

					<div class="col-md-7">
   	<!-- TASKS -->
     <div class="panel">
      <div class="panel-heading">
          <div class="therichpost-container" style="margin-left:10px;">
          <h4>Liste des Maintenances</h4>

      </div>
      <div class="panel-body">
          <ul class="list-unstyled task-list">
              <li>
                  <p class="text-primary">Liste des Maintenances Non Consultées <span class="label-percent">{{ $diperc }} %</span></p>
                  <div class="progress progress-xs">
                      <div  class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ $diperc }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $diperc }}%">
                          <span class="sr-only">{{ $diperc }} % Complete</span>
                      </div>
                  </div>
              </li>
              <li>
                  <p class="text-danger"> Liste des Maintenances Reportées <span class="label-percent">{{ $dirperc }} %</span></p>
                  <div class="progress progress-xs">
                      <div  class="progress-bar progress-bar-danger" role="progressbar"  aria-valuenow="{{ $dirperc }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $dirperc }}%">
                          <span class="sr-only">{{ $dirperc }} % Complete</span>
                      </div>
                  </div>
              </li>
              <li>
                  <p class="text-warning">Liste des Maintenances en Cours <span class="label-percent">{{ $diecperc }} %</span></p>
                  <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-warning" role="progressbar"  aria-valuenow="{{ $diecperc }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $diecperc }}%">
                          <span class="sr-only">Success</span>
                      </div>
                  </div>
              </li>
              <li>
                  <p class="text-success">Liste des Maintenances Terminées<span class="label-percent">{{ $ditperc }}%</span></p>
                  <div class="progress progress-xs">
                      <div  class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $ditperc }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $ditperc }}%">
                          <span class="sr-only">45% Complete</span>
                      </div>
                  </div>
              </li>
          </div>
          </ul>
      </div>
  </div>
  <!-- END TASKS -->
</div>
<div class="col-md-5">
  <!-- TIMELINE -->
  <div class="panel panel-scrolling">
      <div class="panel-heading">
          <h4 class="text-dark" class="panel-title">Les Activitées Récentes des Utilisateurs</h4>

      </div>
      <div class="panel-body">
          <ul class="list-unstyled activity-list">
              @foreach ( $activities as $activity )
              <li>
                  @foreach ($users as $user )
                  @if ( $user->id_user == $activity->iduser )
                  @if ($user->avatar == NULL )
                  <img src=" {{ asset('img/user.png') }}" class="img-circle pull-left avatar" alt="Avatar">
                  @else
                  <img src="{{ asset('uploads/profile/'.$user->avatar) }}" alt="Avatar" class="img-circle pull-left avatar">
                  @endif

                  <p>

                          {{ $user->name }}
                          @endif
                          @endforeach
                     {{ $activity->description }} <span class="timestamp">{{ Carbon\Carbon::parse($activity->created_at)->diffForHumans(Carbon\Carbon::now()) }}</span></a></p>
              </li>
              @endforeach

          </ul>

      </div>
  </div>
  <!-- END TIMELINE -->
</div>
</div>


</div>
</div></div>
<div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@include('menu.footer')
</div>
<!-- END WRAPPER -->

@endsection
@endif

