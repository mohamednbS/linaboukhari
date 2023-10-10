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
                            <h3 class="panel-title"><i class="lnr lnr-cog"></i> Gestion des Maintenances Préventives</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">@isset($searchuser) Resultat de recherche pour : <span class="text-primary"> " {{ $searchuser }} "</span> @else Liste des Maintenances Préventives @endisset </h3>
								</div>
                                
								
								<div class="panel-body">
								@if( session()->get( 'addmp' ) == "deleted" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Maintenance supprimée avec succèss 
								</div>
                                @endif
                                            <table class="table table-striped">
                                            <!-- nav search--> 
                                            <div>
                                            <form action="{{ route('search_mp') }}" method="GET">
                                                <input type="text" name="query" placeholder="Recherche...">
                                                <button type="submit">Rechercher</button> 
                                            </form>
                                            </div>
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>N°Maintenance</th>
                                                        <th>Etat</th>
                                                        <th>Client</th>
                                                        <th>Equipement</th>
                                                        <th>Intervenant</th>
                                                        <th>Date de Maintenance</th>
                                                        <th>Observations</th>
                                                        <th>Rapport</th>
                                                        @if (Auth::user()->role == "Administrateur")
														<th>Action</th>
														@endif
                                                        
                                                        
                                                    </tr>
                                                </thead>
                                                
                                                <tbody> 
                                                <?php $i=0; ?>
                                                @foreach($mpreventives as $mp)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td><a href="/mp/show/{{ $mp->id_mpreventive }}">{{ $mp->numero }}</a></td> 
                                                    <td>
													
														@if ($mp->etat == "Suspendu")
														<span class="label label-danger">
														@elseif( $mp->etat == "Programé"  )
														<span class="label label-info">
														@elseif( $mp->etat == "En attente de validation" || $mp->etat == "En Cours"  )
														<span class="label label-warning">
														@else
														<span class="label label-success">
														
														@endif
														{{ $mp->etat }}</span>
													</td>
                                                   
                                                    <td>
                                                        @foreach($clients as $client )
                                                            @if ( $client->id_client == $mp->client_name )
                                                                {{ $client->clientname }} 
                                                            @endif
                                                        @endforeach
                                                    </td>

                                                    <td>
                                                        @foreach($equipements as $equipement )
                                                            @if ( $equipement->id_equipement == $mp->equipement_name )
                                                               {{ $equipement->designation.'--'.$equipement->modele }}  
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                    {{ implode('/ ', explode(',', $mp->executeur)) }}
                                                    </td>
                                         
                                                    <td> {{ $mp->date_execution }}</td>
                                              
                                                    <td>{{ $mp->observation }} </td>
                                                 
                                                
                                                   
                                                    @if (Auth::user()->role == "Administrateur")
                                                    <td><a data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-primary' href="/mpreventive/change/{{ $mp->id_mpreventive }}"><i class="lnr lnr-pencil"></i> </a> 
                                                        <a  data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/mpreventive/delete/{{ $mp->id_mpreventive  }}" onclick="return confirm ('voulez vous vraiment supprimer la maintenance' {{ $mp['id']}})"><i class="lnr lnr-trash"></i></a></td>
                                                    @endif
                                                      
                                                </tr>
                                                @endforeach 
                                                </tbody>
                                            </table>
                                            {{$mpreventives->links()}}
                                      
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
