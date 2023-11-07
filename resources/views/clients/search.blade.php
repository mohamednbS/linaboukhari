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
                            <h3 class="panel-title"><i class="lnr lnr-users"></i> Gestion des Clients</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">@isset($searchuser) Resultat de recherche pour : <span class="text-primary"> " {{ $searchuser }} "</span> @else Liste des Clients @endisset </h3>
								</div>
								<!-- nav search--> 
								<form action="{{ route('filter') }}" method="GET">
									<input type="text" name="query" placeholder="Recherche...">
									<button type="submit">Rechercher</button> 
								</form>
								
								<div class="panel-body">
								@if( session()->get( 'adduser' ) == "deleted" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Client supprimé avec succès
								</div>
                                @endif
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Nom client/Raison sociale</th>
														<th style="text-align: center;">Adresse</th>
													             
														<th style="text-align: center;">Email</th>
														<th style="text-align: center;">Mobile</th>   
														<th style="text-align: center;">Equipements</th>            
													
														
														@if (Auth::user()->role == "Administrateur")
														<th style="text-align: center;">Action</th>
														@endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                @foreach($clients as $client)
                                                <?php $i++; ?>
                                                <tr>
                                                 
                                                    <td>{{ $client->clientname}}</td>
                                                  
													<td>{{ $client->adresse }}</td>
												
                                                 
													<td>{{ $client->email }}</td>
													<td>{{ $client->mobile}}</td>
													<td><a href="/equipementclient/{{ $client->id_client }}"> voir les équipements</a></td>
													
													@if (Auth::user()->role == "Administrateur")
                                                    <td style="text-align: center;"><a data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-info' href="/client/change/{{$client->id_client}}"><i class="lnr lnr-pencil"></i>  </a> 
														<a data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/client/delete/{{ $client->id_client }}" onclick="return confirm ('voulez vous vraiment supprimer le client' {{ $client['id']}})"><i class="lnr lnr-trash"></i></a></td>
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