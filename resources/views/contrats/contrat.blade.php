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
                            <h3 class="panel-title"><i class="lnr lnr-laptop-phone"></i> Gestion des Contrats</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3  class="font-weight-bold" class="panel-title" > Contrat : {{ $contrat->type_contrat}} </h3>
								</div>
								<div class="panel-body">
							
                            <div class="row">
                         
                                  <div class="col-md-4">
                                    <!-- PANEL NO PADDING -->
                                    <div class="panel">
                                          <div class="panel-heading">
                                            <h3 class="p-3 mb-2 bg-info text-white" class="panel-title">   @foreach($clients as $client )
                                                @if ($contrat->client_name == $client->id_client)
                                                    {{ $client->clientname}}
                                                @endif
                                                @endforeach</h3>
                                          
                                          </div>

                                    </div>
                                    <!-- END PANEL NO PADDING -->
                                  </div>
                                  <div class="col-md-8">
                                      <!-- PANEL HEADLINE -->
                                      <div class="panel panel-headline">
                                        <div class="panel-heading">
                                        <h3 class="panel-title">Equipement : 
                                            @foreach($equipements as $equipement )
                                            @if ($contrat->equipement_name == $equipement->id_equipement)
                                                {{ $equipement->designation}}
                                            @endif
                                            @endforeach
                                        </h3>
                                        
                                        </div>
                                        <div class="panel-body">
										     <h4>Sous Equipement:  @foreach($sousequipements as $sousequipement )
                                                @if ($contrat->souseq_name == $sousequipement->id_sousequipement)
                                                    {{ $sousequipement->designation}}
                                                @endif
                                                @endforeach</h4>
	
										    <h4> Accessoire:  @foreach($accessoires as $accessoire )
                                                @if ($contrat->accessoire_name == $accessoire->id_accessoire)
                                                    {{ $accessoire->designation}}
                                                @endif
                                                @endforeach</h4>
										   <h5>Date de Début  : {{ $contrat->date_debut}}</h5>
										   <h5>Date de Fin: {{ $contrat->date_fin}}</h5>
										   
										   
									   
									    @if (Auth::user()->role == "Administrateur") 
										   <a href="/equipement/mod/{{ $equipement->id }}" class="btn btn-primary"><i class="lnr lnr-pencil"></i>Modifier</a>
										   <a href="/equipement/del/{{ $equipement->id}}"  class='btn btn-danger' ><i class="lnr lnr-trash">Supprimer</i></a>

										@endif
                                        </div> 
                                      </div>      
                                     
                                      <!-- END PANEL HEADLINE -->
					                        	</div>
                               
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
