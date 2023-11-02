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
                                            <table class="table table-bordered"  enctype="multipart/form-data">
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
                                                        <th style="text-align: center;">N° Intervention</th>
														<th style="text-align: center;">Client</th>
                                                        <th style="text-align: center;">Equipement</th>
														<th style="text-align: center;">Panne Equipement</th>
														<th style="text-align: center;">Intervenant(s)</th>													
														<th style="text-align: center;">Etat</th>
                                                        <th style="text-align: center;">Description</th>
														@if (Auth::user()->role == "Administrateur")			
                                                        <th style="text-align: center;">Validation</th>
														<th style="text-align: center;">Action </th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                @foreach($ointerventions as $oi)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td> <a href="/di/show/{{ $oi->id_intervention }}">{{ $oi->numero }}</a></td>
													<td>
														@foreach($clients as $client )
															@if ( $client->id_client == $oi->client_name )
																{{ $client->clientname }}  
															@endif
														@endforeach
													</td>
                                            
                                                    <td>    
                                                    @foreach($equipements as $equipement )
                                                        @if ( $equipement->id_equipement == $oi->equipement_name )
                                                            {{ $equipement->modele.'--'.$equipement->numserie }} 
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

													<td>

														@if ($oi->etat =="Mise en Attente")
														<span class="label label-danger">
														@elseif( $oi->etat == "Demandé"  )
														<span class="label label-info">
														@elseif( $oi->etat == "Clôturé" )
														<span class="label label-success">
														
														@elseif( $oi->etat == "Diagnostic en Cours " )
														<span class="label label-primary">
														@else
														<span class="label label-warning">
														
														
														@endif
														{{ $oi->etat }}</span>
													</td>
							
                                                    <td>{{ $oi->description_panne }}</td>

													@if (Auth::user()->role == "Administrateur")
                                                    <td>
													<a href="{{ route('download.document', ['document' => $oi->document]) }}"> le Rapport d'Intervention</a>
													</td>
                        
													<td><a  data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-info'  href="/ointervention/change/{{ $oi->id_intervention }}"><i class="lnr lnr-pencil"></i> </a> 
														<a  data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/ointervention/delete/{{ $oi->id_intervention  }}"onclick="return confirm ('voulez vous vraiment supprimer la demande' {{ $oi['id']}})" ><i class="lnr lnr-trash" ></i></a>
														<a  data-toggle="tooltip" data-placement="top" class='btn btn-primary' href="/di/show/{{ $oi->id_intervention }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
														<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
														</svg>
													</td>
													@endif
                                                    
                                                    
                                                </tr>
                                                @endforeach 
                                                </tbody>
                                            </table>
											{{$ointerventions->links()}}
                                      
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
