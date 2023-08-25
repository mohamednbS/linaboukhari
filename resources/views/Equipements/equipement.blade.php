@extends('layouts.app')
@section('content')

<!-- WRAPPER -->
<div id="wrapper">

	<!--MENU-->
    @include('menu.menutop')
	@include('menu.menuleft')

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
                            <h3 class="panel-title"><i class="lnr lnr-laptop-phone"></i> Gestion des Equipements</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3  class="font-weight-bold" class="panel-title" > Equipement : {{ $equipement->designation}} </h3>
								</div>
								<div class="panel-body">
							
                            <div class="row">
                         
                                  <div class="col-md-4">
                                    <!-- PANEL NO PADDING -->
                                    <div class="panel">
                                          <div class="panel-heading">
                                            <h3 class="p-3 mb-2 bg-info text-white" class="panel-title"><a href="/equipement/{{ $equipement->id_equipement}}">{{ $equipement->marque }}</a></h3>
                                          
                                          </div>

                                    </div>
                                    <!-- END PANEL NO PADDING -->
                                  </div>
                                  <div class="col-md-8">
                                      <!-- PANEL HEADLINE -->
                                      <div class="panel panel-headline">
                                        <div class="panel-heading">
                                          <h3 class="panel-title">Modèle : {{ $equipement->modele}}</h3>
                                          <h5 class="panel-subtitle">Numéro de série: {{ $equipement->numserie}}</h5>
										  <h5 class="panel-subtitle">Code: {{ $equipement->name}}</h5>
                                        </div>
                                        <div class="panel-body">
										     <h4>Marque : {{ $equipement->marque }}</h4>
	
										    <h4>Client : @foreach($clients as $client )
												            @if ($equipement->client_id_client == $client->id_client)
																{{ $client->clientname}}
															@endif
														 
														    @endforeach</h4>
										   <h5>Date Mise en Service : {{ $equipement->date_service}}</h5>
										   <h5>Durée planing préventif par an: {{ $equipement->plan_prev}}</h5>
										   
										   <p><a href="{{ route('download.document', ['document' => $equipement->document]) }}">voir la documentation</a></p>

									   
									    @if (Auth::user()->role == "Administrateur") 
										   <a href="/equipement/mod/{{ $equipement->id_equipement }}" class="btn btn-primary"><i class="lnr lnr-pencil"></i>Modifier</a>
										   <a href="/equipement/del/{{ $equipement->id_equipement }}" class='btn btn-danger' onclick="return confirm ('voulez vous vraiment supprimer cet équipement' {{ $equipement['id']}})"><i class="lnr lnr-trash"></i>Supprimer</a>
										   <a href="/equipements/{{ $equipement->id_equipement}}/sousequipements/create"class="btn btn-info">Ajouter sous Equipement</a>
										   <a href="/equipements/{{ $equipement->id_equipement}}/accessoires/create" class="btn btn-info">Ajouter Accessoire</a>
										@endif
                                        </div> 
                                      </div>      
                                     
                                      <!-- END PANEL HEADLINE -->
					                        	</div>
                               
                            </div>                            
                                               
                                </div>  
                    	    </div>
							<!-- liste des sous-équipemnts-->
						

                            <h3  class="text-info"> Liste des Sous-Equipements</h3>

							<table class="table table-striped">
								<thead>
									<tr>
										<th class="p-3 mb-2 bg-info text-white">#</th>
										<th class="p-3 mb-2 bg-info text-white">Identifiant</th> 
										<th class="p-3 mb-2 bg-info text-white">Désignation</th>
										<th class="p-3 mb-2 bg-info text-white">Date d'Achat</th>
										<th class="p-3 mb-2 bg-info text-white">Date d'Arrivée</th>
										
										@if (Auth::user()->role == "Administrateur")
										<th class="p-3 mb-2 bg-info text-white">Action</th>
										@endif
									</tr>
								</thead>
							<tbody>
								<?php $i=0; ?>
								@foreach($sousequipements as $sousequipement)
								<?php $i++; ?>
								<tr>
									<td>{{ $i }}</td>
									<td>{{ $sousequipement->identifiant }}</td>
									<td>{{ $sousequipement->designation }}</td>
									<td>{{ $sousequipement->date_achat }}</td>
									<td>{{ $sousequipement->date_arrive }}</td>
									@if (Auth::user()->role == "Administrateur")
									<td><a data-toggle="tooltip" data-placement="top" title="Modifier"class="btn btn-primary" href="/sousequipement/mod/{{ $sousequipement->id_sousequipement }}"><i class="lnr lnr-pencil"></i></a>
<<<<<<< HEAD
										<a data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/accessoire/mod/"><i class="lnr lnr-trash"></i></a></td>
=======
										<a data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/equipements/{equipement_id_equipement}/sousequipements/{{ $sousequipement->id_sousequipement }}"><i class="lnr lnr-trash"></i></a></td>
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
									@endif
								</tr>
								@endforeach 
								</tbody>
							</table>

							<!--liste des accessoires--> 

                            <h3  class="text-info"> Liste des Accessoires</h3>
							<table class="table table-striped">
								<thead>
									<tr>
										<th class="p-3 mb-2 bg-info text-white">#</th>
										<th class="p-3 mb-2 bg-info text-white">Identifiant</th>
										<th class="p-3 mb-2 bg-info text-white">Désignation</th>
										<th class="p-3 mb-2 bg-info text-white">Date d'Achat</th>
										<th class="p-3 mb-2 bg-info text-white">Date d'Arrivée</th>
										
										@if (Auth::user()->role == "Administrateur")
										<th class="p-3 mb-2 bg-info text-white">Action</th>
										@endif
									</tr>
								</thead>
							<tbody>
								<?php $i=0; ?>
								@foreach($accessoires as $accessoire)
								<?php $i++; ?>
								<tr>
									<td>{{ $i }}</td>
									<td>{{ $accessoire->identifiant }}</td>
									<td>{{ $accessoire->designation}}</td>
									<td>{{ $accessoire->date_achat }}</td>
									<td>{{ $accessoire->date_arrive }}</td>
									@if (Auth::user()->role == "Administrateur")
<<<<<<< HEAD
									<td><a class="table-info"><a  data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-primary' href="/accessoire/mod/{{ $accessoire->id_accessoire }}"><i class="lnr lnr-pencil"></i></a>
										<a data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/department/delete/{{ $accessoire->id_accessoire  }}"><i class="lnr lnr-trash"></i></a></td>
=======
									<td><a class="table-info"><a  data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-primary' href="/department/change/{{ $accessoire->id }}"><i class="lnr lnr-pencil"></i></a>
										<a data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/department/delete/{{ $accessoire->id  }}"><i class="lnr lnr-trash"></i></a></td>
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
									@endif
								</tr>
									@endforeach 
							</tbody>
							</table>
							
								
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
