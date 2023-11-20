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
                                <table  class="table table-bordered" >
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
                                            <th style="text-align: center;">N° MP</th>
                                            <th style="text-align: center;">Etat</th>
                                            <th style="text-align: center;">Client</th>
                                            <th style="text-align: center;">Equipement</th>
                                            <th style="text-align: center;">Intervenant</th>
                                            <th style="text-align: center;">Date de Maintenance</th>
                                            <th style="text-align: center;">Observations</th>
                                            <th style="text-align: center;">Validation</th>
                                       
                                            @if (Auth::user()->role == "Administrateur")
                                            <th style="text-align: center;">Action</th>
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
                                            
                                                @if ($mp->etat == "Reporté")
                                                <span class="label label-danger">
                                                @elseif( $mp->etat == "Planifié"  )
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
                                            <td>
												<a href="{{ route('download.document', ['document' => $mp->document]) }}"> le Rapport d'Intervention</a>
											</td>
                                            @endif
                                            
                                        
                                            
                                            @if (Auth::user()->role == "Administrateur")
                                            <td style="text-align: center;"><a data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-info' href="/mpreventive/change/{{ $mp->id_mpreventive }}"><i class="lnr lnr-pencil"></i> </a> 
                                                <a  data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/mpreventive/delete/{{ $mp->id_mpreventive  }}" onclick="return confirm ('voulez vous vraiment supprimer la maintenance' {{ $mp['id']}})"><i class="lnr lnr-trash"></i></a>
                                                <a data-toggle="tooltip" data-placement="top" class='btn btn-primary' href="/mp/show/{{ $mp->id_mpreventive }}">
                                                <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                </svg></i>
                                            </td>
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