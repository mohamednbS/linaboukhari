@extends('layouts.app')
@section('content')

<!-- WRAPPER -->
<div id="wrapper">

	<!--MENU-->
    
	@include('menu.menuleft')
	@include('menu.menutop')

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content"> 
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
                            <h3 class="panel-title"><i class="lnr lnr-file-empty"></i> Historiques des Interventions</h3>
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
										<i class="fa fa-check-circle"></i> Intervention Supprimée avec Succès
								</div>
                                @endif
                                            <table class="table table-striped">
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
                                                        <th>Equipement</th>
														<th>Client</th>
														<th>Panne/Mission</th>
														<th>Intervenant</th>
														<th>Etat</th>
                                                        <th>Commmentaires</th>
														@if (Auth::user()->role == "Administrateur")
							
                                                        <th>Rapport<a data-bs-toggle="modal" data-bs-target="#exampleModal"></a></th>

														<th> Action </th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                @foreach($alloi as $oi)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $oi->numero }}</td>
                                            
                                                    <td>    
                                                    @foreach($equipements as $equipement )
                                                        @if ( $equipement->id_equipement == $oi->equipement_name )
                                                              {{ $equipement->designation.'--'.$equipement->modele }} 
                                                        @endif
                                                        @endforeach
                                                    </td>

													<td>
														@foreach($clients as $client )
															@if ( $client->id_client == $oi->client_name )
																{{ $client->clientname }}  
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

													<td><span  class="label label-success">{{ $oi->etat }}</span></td>
									
                                                    <td>{{ $oi->commentaire }}</td>

													
                                                    <td>
			 
													
													<!-- POPUP-->
													<button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal">
														voir Rapport
													</button>
													
													  
													  <!-- Modal -->
													  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
														  <div class="modal-content">
															<div class="modal-header">
															  <h5 class="modal-title" id="exampleModalLabel">Exemple de popup</h5>
															  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															  </button>
															</div>
															<div class="modal-body">
																{{ route('download.document', $path = storage_path('app/public/' . $oi->document)) }}
																
															</div>
															<div class="modal-footer">
															  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
															</div> 

													</td>
                                                    
													@if (Auth::user()->role == "Administrateur")
													<td><a  data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-primary'  href="/ointervention/change/{{ $oi->id_intervention }}"><i class="lnr lnr-pencil"></i> </a> 
														<a  data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/ointervention/supprimer/{{ $oi->id_intervention  }}"><i class="lnr lnr-trash"></i></a></td>
													@endif
                                                    
                                                    
                                                </tr>
                                                @endforeach 
                                                </tbody>
                                            </table>
												{{$ointerventions->links()}}
                                      
                                    <!-- END TABLE STRIPED -->
                                </div>
                    	</div>
								<
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
