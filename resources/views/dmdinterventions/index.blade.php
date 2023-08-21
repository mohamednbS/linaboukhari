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
                            <h3 class="panel-title"><i class="lnr lnr-file-empty"></i> Gestion des Demandes d'Interventions</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">@isset($searchuser) Resultat de recherche pour : <span class="text-primary"> " {{ $searchuser }} "</span> @else Liste des Demandes d'Interventions @endisset </h3>
								</div>
							
								<div class="panel-body">
								@if( session()->get( 'addoi' ) == "deleted" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Demande Supprimée avec Succès
								</div>
                                @endif
                                            <table class="table table-striped"  enctype="multipart/form-data">
													<!-- nav search--> 
											<div>
											<form action="{{ route('find') }}" method="GET">
												<input type="text" name="query" placeholder="Recherche...">
												<button type="submit">Rechercher</button> 
											</form>
											</div>
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>N° Intervention</th>
														<th>Client</th>
                                                        <th>Equipement</th>
														<th>Sous Equipement</th>
														<th>Accessoire </th>
														<th>Panne/Mission</th>
														<th>Intervenant</th>
														<th>Heure d'Appel Client</th>
														<th>Etat</th>
                                                        <th>Commmentaires</th>
														@if (Auth::user()->role == "Administrateur")
							
                                                        <th>Validation</th>
														<th> Action </th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                @foreach($ointerventions as $oi)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $oi->numero }}</td>
													<td>
														@foreach($clients as $client )
															@if ( $client->id_client == $oi->idclient )
																{{ $client->clientname }}  
															@endif
														@endforeach
													</td>
                                            
                                                    <td>    
                                                    @foreach($equipements as $equipement )
                                                        @if ( $equipement->id_equipement == $oi->idmachine )
                                                            {{ $equipement->designation }} 
                                                        @endif
                                                        @endforeach
                                                    </td>
													  <td>    
                                                    @foreach($sousequipements as $sousequipement )
                                                        @if ( $sousequipement->id_sousequipement == $oi->sousequipement )
                                                            {{ $sousequipement->designation }} 
                                                        @endif
                                                        @endforeach
                                                    </td>

													<td>    
                                                    @foreach($accessoires as $accessoire )
                                                        @if ( $accessoire->id_accessoire == $oi->accessoire )
                                                            {{ $accessoire->designation }} 
                                                        @endif
                                                        @endforeach
                                                    </td>

													<td>
													    @foreach($typepannes as $typepanne )
															@if ( $typepanne->id_typepanne == $oi->type_panne )
																{{ $typepanne->name }}  
															@endif
														@endforeach
													</td>

													<td  class="table-info">
														{{ implode('/ ', explode(',', $oi->destinateur)) }}
                                                    </td>

													<td> {{$oi->appel_client}} </td>

													<td>

														@if ($oi->etat == "Suspendu")
														<span class="label label-danger">
														@elseif( $oi->etat == "Demandé"  )
														<span class="label label-info">
														@elseif( $oi->etat == "En attente de validation" || $oi->etat == "En Cours"  )
														<span class="label label-warning">
														@else
														<span class="label label-success">
														
														@endif
														{{ $oi->etat }}</span>
													</td>
							
                                                    <td>{{ $oi->commentaire }}</td>

													@if (Auth::user()->role == "Administrateur")
                                                    <td>
													<a href="{{ route('download.document', ['document' => $oi->document]) }}"> le Rapport d'Intervention</a>
													</td>
                        
													<td><a  data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-primary'  href="/ointervention/change/{{ $oi->id_intervention }}"><i class="lnr lnr-pencil"></i> </a> 
														<a  data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/ointervention/delete/{{ $oi->id_intervention  }}"onclick="return confirm ('voulez vous vraiment supprimer la demande' {{ $oi['id']}})" ><i class="lnr lnr-trash" ></i></a>
													</td>
													@endif
                                                    
                                                    
                                                </tr>
                                                @endforeach 
                                                </tbody>
                                            </table>
                                      
                                    <!-- END TABLE STRIPED -->
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
