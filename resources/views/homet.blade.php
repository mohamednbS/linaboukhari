@extends('layouts.app')
@section('content')


<div id="wrapper">
@include('usermenu.menutop')
@include('usermenu.menuleft')

		
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
						<!-- OVERVIEW -->
                        <div class="panel panel-headline">
						<div class="panel-heading">
                            <h3 class="panel-title"><i class="lnr lnr-users"></i>Tableau des Maintenances </h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('M')." ".date('d')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						
						
								<div class="panel-body">
                                     <br>
                                     <hr>
                                     <h4 class="text-light bg-dark" class="panel-title"> Liste des Ordres d'Interventions </h4>
								     <hr>
                                     <br>
                                     <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        
														<th>#</th>
														<th>Client</th>
														<th>Equipement</th>
														<th>Equipement</th>
														<th>Intervenant</th>
														<th> Priorité </th>
														<th>Etat</th>
                                                        <th>Commentaire</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                @foreach( $ointerventions as $oi )
                                                <?php $i++; ?>
                                                <tr>                                                                                                                                           <tr>
													<td>{{ $i }}</td>
													<td>
														@foreach( $clients as $client )
															 @if ($client->id_client == $oi->idclient)
																{{ $client->clientname }} 
															 @endif
														@endforeach 
													</td>

													<td>
                                                    @foreach( $equipements as $eq )
                                                         @if ($eq->id_equipement == $oi->idmachine)
                                                            {{ $eq->designation }} 
                                                         @endif
                                                    @endforeach 
													</td>

													<td>
													    @foreach($typepannes as $typepanne)
														    @if ($typepanne->id_typepanne == $oi->type_panne)
																{{ $typepanne->name }} 
															 @endif
														@endforeach
													</td>

													<td>{{ implode('/ ', explode(',', $oi->destinateur)) }}</td>
                     
													<td>
														@if ( $oi->priorite == "Normale")
															<span class="label label-success">{{ $oi->priorite }}</span>
														@elseif ( $oi->priorite == "Urgent" )
														<span class="label label-warning">{{ $oi->priorite }}</span>
														@else
														<span class="label label-danger">{{ $oi->priorite }}</span>
	
														@endif
													</td>  

													<td>
														@if ( $oi->etat == "Demandé")
															<span class="label label-info">{{ $oi->etat }}</span>
														@elseif ( $oi->etat == "En Cours" )
														<span class="label label-warning">{{ $oi->etat }}</span>
														@else
														<span class="label label-danger">{{ $oi->etat }}</span>
	
														@endif 
													</td>
												
                                                    <td> {{ $oi->commentaire }} </td>
                                            
                                                
                                                    <td><a class='btn btn-primary btn-sm' href="/otoi/show/{{ $oi->id_intervention }}"> <i class="lnr lnr-highlight"></i> Démarrer </a>
														<a class='btn btn-secondary btn-sm' href="/otoi/mod/{{ $oi->id_intervention }}"> <i class="lnr lnr-pencil"></i> Modifier </a></td>
                                                    
                                                </tr>
                                                 @endforeach
                                                </tbody>
                                            </table>
                                      
									<!-- END TABLE STRIPED -->
									<hr>
                                     <h4 class="text-light bg-dark" class="panel-title"> Liste des Maintenances Préventives   </h4>
								     <hr>
                                     <br>
                                     <table class="table table-striped">
                                                <thead>
                                                    <tr>
														<th>#</th>
														<th>Client</th>
                                                        <th>Equipement</th>
														<th>Intervenant</th>
														<th>Prochaine Execution</th>
														<th>Etat</th>
														<th>Commentaire </th>
														<th>Action </th>
													
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                @foreach( $allmpreventives as $amp )
                                                <?php $i++; ?>
                                                <tr>                                                                                  
                                                    <td>{{ $i }}</td>
                                                   	<td>
													@foreach( $clients as $client )
													    @if ($client->id_client== $amp->idclient)
															{{ $client->clientname }} 
														@endif
													@endforeach </td>
					
													<td>
													@foreach( $equipements as $eq )
														@if ($eq->id_equipement == $amp->idmachine)
															{{ $eq->designation }} 
														@endif
													@endforeach </td>

													<td> 
														{{ implode('/ ', explode(',', $amp->executeur)) }}
												
													</td>

													<td>{{ $amp->date_execution }}</td>

													<td>
														@if ( $amp->etat == "Programé")
															<span class="label label-info">{{ $amp->etat }}</span>
														@elseif ( $amp->etat == "En Cours" )
														<span class="label label-warning">{{ $amp->etat }}</span>
														@else
														<span class="label label-danger">{{ $amp->etat }}</span>
	
														@endif 
													</td>

													<td> {{ $amp->commentaire }} </td>
												
													<td><a class='btn btn-primary' href="/otmp/historique/{{ $amp->id_mpreventive }}">Consulter</a></td>
                                                </tr>
                                                 @endforeach
                                                </tbody>
                                            </table>
                                      
                                    <!-- END TABLE STRIPED -->

                                </div>
                    	
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"></div>
										</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
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
	</div>
	<!-- END WRAPPER -->

@endsection




