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
                            <h3 class="panel-title"><i class="lnr lnr-license"></i> Contrats  </h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED --> 
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">@isset($searchuser) Resultat de recherche pour : <span class="text-primary"> " {{ $searchuser }} "</span> @else Liste des Contrats @endisset </h3>
								</div>
							
								<div class="panel-body">
								@if( session()->get( 'addcontrat' ) == "deleted" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i>Contrat supprimé avec succès
								</div>
                                @endif
                                            <table class="table table-striped">
												<div>
												<!-- nav search--> 
								<form action="{{ route('recherche') }}" method="GET">
									<input type="text" name="query" placeholder="Recherche...">
									<button type="submit">Rechercher</button> 
								</form></div>
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
														<th>Type du contrat</th>
                                                        <th>Client</th>
                                                        <th>Equipement</th>
														<th>Date de Début</th>
														<th>Date de fin</th>
													
														<th>Note</th>
													
														
														@if (Auth::user()->role == "Administrateur")
														<th> Actions </th>
														@endif
														
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                @foreach($contrats as $contrat)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
													<td><a href="/contrat/{{$contrat->id_contrat}}"> {{ $contrat->type_contrat }}</a></td>
                                                    
													<td>
														@foreach($clients as $client )
															@if ( $client->id_client == $contrat->client_name)
																{{ $client->clientname }} 
															@endif
														@endforeach
													</td>
                                                    <td>
														@foreach($equipements as $equipement )
															@if ( $equipement->id_equipement == $contrat->equipement_name)
																{{ $equipement->designation }} 
															@endif
														@endforeach
													</td>
													<td>{{ $contrat->date_debut }}</td>
													<td>{{ $contrat->date_fin }}</td>
												
													<td>{{ $contrat->note }}</td>

													@if (Auth::user()->role == "Administrateur")
														<td><a href="/cm/mod/{{ $contrat->id_contrat }}" data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-primary'><i class="lnr lnr-pencil"></i> </a> 
															<a  data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/cm/del/{{ $contrat->id_contrat }}"  onclick="return confirm ('voulez vous vraiment supprimer le contrat' {{ $contrat['id']}})"><i class="lnr lnr-trash"></i></a> </td>
														@endif
                                                </tr>
                                                @endforeach 
                                                </tbody>
                                            </table>
											{{ $contrats->links()}}
                                      
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
