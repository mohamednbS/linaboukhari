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
							<h3 class="panel-title"><i class="lnr lnr-laptop-phone"></i> Gestion des equipements</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Modifier un equipement   </h3>
								</div>
                                
								<div class="panel-body">
                                @if( session()->get( 'addequipement' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Equipement modifié avec succèss <a href="/equipement/{{$equipement->id_equipement}}" class="btn btn-sm btn-default"> Consulter les modifications de l'équipement </a>
								</div>
                                @endif
                                <form action='/modequipement/{{ $equipement->id_equipement }}' method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }} 
                    
                                        <div class="row">
                                        
                                            <div class="col-md-3">
                                                <label > Code </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $equipement->name }}"  type="text" name="code">
                                                
                                            </div>
                                            <div class="col-md-3">
                                            <label > Modele du machine</label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $equipement->modele }}" type="text" name="modele">
                                            
                                            </div>

                                            <div class="col-md-3">
                                            <label > <label> Marque du machine </label> </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $equipement->marque }}" type="text" name="marque">
                                            
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <label > <label> Désignation </label> </label>  
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $equipement->designation }}" type="text" name="designation">
                                                
                                            </div>

                                            <div class="col-md-3">
                                            <label> Numéro Série </label>
                                            </div>

                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $equipement->numserie}}" type="text" name="numserie">
                                            </div>

                                            <div class="col-md-3">
                                                <label> Date d'installation </label>       
                                            </div>
                                            <div class="col-md-9">
                                            <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;" value="{{ $equipement->date_installation}}" type="date" name="date_installation" class="form-control" >
                                            </div>

                                            <div class="col-md-3">
                                                <label> Durée Planing Préventif/an  </label>
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $equipement->plan_prev}}" type="number" name="plan_prev">
                                            </div>

                                            <div class="col-md-3">
                                                <label> Client </label>
                                            </div>
                                            <div class="col-md-9">
                                            <select name="client_id_client" class="form-control">
                                                <option>-- selectionner un client --</option>
                                                    @foreach( $clients as $client )
                                                        @if ($client->id_client == $equipement->client_id_client )
                                                    <option selected value='{{ $client->id_client }}'>{{ $client->clientname }}</option>
                                                        @else
                                                    <option value='{{ $client->id_client }}'>{{ $client->clientname }}</option>
                                                    @endif
                                                    
                                                    @endforeach
                                                </select> 
                                            </div>

                                            <div class="col-md-3">
                                            <label> Software </label>
                                            </div>
                                            
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $equipement->software}}" type="text" name="software">
                                            </div>

                                            <div class="col-md-3">
                                                <label> Contrat </label>
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <select name="type_contrat" style="width:100%;margin-bottom:10px;" class="form-control">
                                                    @if ( $equipement->contrat == "oui")
                                                     
                                                        <option selected value='oui'>OUI</option>
                                                        <option value='non'>NON</option>
                                                        <option value="sous garantie">SOUS GARANTIE</option>
                                                    
                                                    @elseif ($equipement->contrat == "non")
                                                    
                                                       
                                                        <option value='oui'>OUI</option>
                                                        <option value='sous garantie'>SOUS GARANTIE</option>
                                                        <option selected value='non'>NON</option>
                                                    @else 
                                                        <option selectedvalue='sous garantie'>SOUS GARANTIE</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label > Type du Contrat </label>
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <select name="type_contrat" style="width:100%;margin-bottom:10px;" class="form-control">
                                                    @if ( $equipement->type_contrat == "Contrat de pièces et main oeuvre")
                                                        <option>-- Selectionner le type du contrat --</option>
                                                        <option selected value='Contrat de pièces et main oeuvre'>Contrat depièces et main d'oeuvre</option>
                                                        <option value='Contrat main oeuvre'>Contrat main d'oeuvre</option>
                                                    
                                                    @else
                                                    
                                                        <option>-- Selectionner le type du contrat --</option>
                                                        <option value='Contrat de pièces et main oeuvre'>Contrat depièces et main d'oeuvre</option>
                                                        <option selected value='Contrat main oeuvre'>Contrat main d'oeuvre</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                            <label> Documentation du machine </label>
                                            </div>
                                            <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;" class="form-control"  type="file" name="document">
                                            </div>
                                        </div>
                                                               
                                                           
                                                            
                                      
                                    <!-- END TABLE STRIPED -->
                                </div>
                    	</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6 text-right"><input type="submit" value="Modifier" class="btn btn-primary"></div></form>
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
