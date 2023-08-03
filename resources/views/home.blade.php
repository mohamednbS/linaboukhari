@if (Auth::user()->role == "Technicien"||Auth::user()->role == "Ingenieur")
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
        <div class="therichpost-left"><i class="fa fa-comment therichpost-xxxlarge"></i></div>
        <div class="therichpost-right">
          <h3>{{ $contrats }}</h3>
        </div>
        <div class="therichpost-clear"><a href="/cm">
        <h4 style="color:rgb(255, 255, 255)">Contrats proche d'expiration</h4></a></div>
      </div>
    </div>
    <div class="therichpost-quarter">
      <div class="therichpost-container therichpost-blue therichpost-padding-16">
        <div class="therichpost-left"><i class="fa fa-eye therichpost-xxxlarge"></i></div>
        <div class="therichpost-right">
        
          <h3>{{ $nbrtechniciens }}</h3>
        </div>
        <div class="therichpost-clear"><a href="/users">
        <h4 style="color:rgb(255, 255, 255)"> Techniciens disponibles</h4></a></div>
      </div>
    </div>
    <div class="therichpost-quarter">
      <div class="therichpost-container therichpost-teal therichpost-padding-16">
        <div class="therichpost-left"><i class="fa fa-share-alt therichpost-xxxlarge"></i></div>
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

