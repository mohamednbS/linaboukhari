@extends('layouts.app')
@section('content')

<!-- WRAPPER -->
<div id="wrapper">

	<!--MENU-->
    @include('menu.menutop')
	@include('menu.menuleft')

<
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
                            <h3 class="panel-title"><i class="lnr lnr-file-empty"></i> Gestion des Demandes d'Interventions</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"> Demande d'intervention : <span class="label label-primary"> {{ $di->numero }} </span>
									<h4 class="col-md-12 text-right"> Etat : @if ($di->etat == "Suspendu")
														<span class="label label-danger">
														@elseif( $di->etat == "Demandé"  )
														<span class="label label-info">
														@elseif( $di->etat == "En attente de validation" || $di->etat == "En Cours"  )
														<span class="label label-warning">
														@else
														<span class="label label-success">
														
														@endif
														{{$di->etat}}</span> </h4>
								</div>
							<div class="panel-body">
								<h3> CLIENT :  
								@foreach ($clients as $client )
									@if ($di->idclient == $client->id_client )
									{{ $client->clientname }}
									@endif
									
								@endforeach </h3>

								<h4> ◾​ EQUIPEMENT :  
								@foreach ($equipements as $equipement )
									@if ($di->idmachine == $equipement->id_equipement )
									{{ $equipement->designation }}
									@endif
									
								@endforeach </h4>

								<h4> ◾​ SOUS EQUIPEMENT :  
								@foreach ($sousequipements as $sousequipement )
									@if ($di->sousequipement == $sousequipement->id_sousequipement )
									{{ $sousequipement->designation }}
									@endif
									
								@endforeach </h4>
							
								<h4> ◾​ ACCESSOIRES : 
								@foreach ($accessoires as $accessoire )
									@if ($di->accessoire == $accessoire->id_accessoire )   
									{{ $accessoire->designation }}
									@endif
									
								@endforeach</h4>
								<h4>◾​ Heure d'appel client : {{ $di->appel_client }}</h4>
								<h4>◾​ Commentaires :{{ $di->comemntaire }}</h4>
								<h5>◾​ Date de début d'intervention : {{ $di->date_intervention }}</h5>
								<h5>◾​ Date de fin d'intervention : {{ $di->date_fin_intervention }}</h5>
								
								<h5>◾​ Observations : {{ $di->observation }}</h5>
								
					        </div>
                    	</div>
								
							</div>
							<!-- END RECENT PURCHASES -->
                            </div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
	
		<div class="clearfix"></div>
	<footer>
		<div class="container-fluid">
			<p class="copyright">&copy; 2023 <a href="/" target="_blank">STIET</a>.</p>
		</div>
	</footer>
</div>
<!-- END WRAPPER -->

@endsection
