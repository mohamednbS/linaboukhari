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
							<h3 class="panel-title"><i class="lnr lnr-laptop-phone"></i> Gestion des Equipements</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Ajouter un Equipement   </h3>
								</div>
                                
								<div class="panel-body">
                                @if( session()->get( 'adduser' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Equipement ajouté avec succèss <a href="/users" class="btn btn-sm btn-default"> Consulter la Liste des Equipements</a>
								</div>
                                @endif
                                <form action="{{ route('Equipements.store', ['modalite' => $modalite]) }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }} 
                                         
                                        <div class="row">
                                        
                                            <div class="col-md-3"> 
                                            <label for="validationDefault01" > Code </label> 
                                             
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper le code de l'équipement içi" type="text" name="code" id="validationDefault01" required>
                                            
                                            </div>
                                            <div class="col-md-3">
                                            <label for="validationDefault02" > Modèle du machine</label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper la modele de l'équipement içi" type="text" name="modele" id="validationDefault02" required>
                                            
                                            </div>
                                            <div class="col-md-3">
                                            <label > <label  for="validationDefault02"> Marque du machine </label> </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper la marque de l'équipement içi" type="text" name="marque" id="validationDefault02" required>
                                            
                                            </div>
                                            <div class="col-md-3">
                                                <label > <label for="validationDefault03"> Désignation </label> </label>
                                                
                                                </div>
                                                <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper la désignation de l'équipement içi" type="text" name="designation" id="validationDefault03" required>
                                                
                                                </div>
                                        
                                            <div class="col-md-3">
                                            <label for="validationDefault04"> Numéro Série </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="tapper le numéro de série içi " type="text" name="numserie" id="validationDefault04" required>
                                            
                                            </div>

                                            <div class="col-md-3">
                                            <label> <label for="validationDefault06"> Date d'installation </label> </label>
                                                    
                                            </div>
                                                    <div class="col-md-9">
                                                    <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;" type="date" name="date_installation" class="form-control" id="validationDefault06" required >
                                                    
                                                    </div>

                                            <div class="col-md-3">
                                            <label for="validationDefault07"> Durée Planing Préventif/an  </label>
                                                    
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="tapper la durée du planing préventif par an içi " type="number" name="plan_prev" id="validationDefault07" required>
                                            </div>

                                            <div class="col-md-3">
                                            <label><label for="validationDefault08"> Client</label> </label>
                                                    
                                            </div>
                                            <div class="col-md-9">
                                            <select name="client_id_client" class="form-control" style="width:100%;margin-bottom:10px;" id="validationDefault08" required>
                                                <option>-- selectionner un Client --</option>
                                                @foreach($clients as $client ) 
                                                                        
                                                <option value="{{ $client->id_client }}">{{ $client->clientname }}</option>
                                                @endforeach
                                            </select>
                                            </div>

                                            <div class="col-md-3">
                                            <label for="validationDefault09"> Software </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="tapper le software installé içi " type="text" name="software" id="validationDefault09" required>
                                            
                                            </div>
                                            
                                            <div class="col-md-3">
                                            <label><label for="validationDefault010"> Documentation de l'équipement </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;" class="form-control"  type="file" name="document"  id="validationDefault010" required>
                                            
                                            </div> 
                                            
                                        </div>
                                    <!-- END TABLE STRIPED -->  
                                </div>
                    	    </div>
                                    <div class="panel-footer">
                                       <div class="row">
                                        <div class="col-md-6"></div>
                                       <div class="col-md-6 text-right"><input type="submit" value="Ajouter" class="btn btn-primary"></div></form> 
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
