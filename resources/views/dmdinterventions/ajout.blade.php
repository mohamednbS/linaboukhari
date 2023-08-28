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
							<h3 class="panel-title"><i class="lnr lnr-file-empty"></i> Gestion des Interventions</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Ajouter une Demande d'Intervention   </h3>
								</div>
                                 
								<div class="panel-body">
                                @if( session()->get( 'addoi' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Demande  Ajoutée avec Succès <a href="/di" class="btn btn-sm btn-default"> Consulter Liste des Demandes d'Interventions </a>
								</div>
                                @endif
                                <form action='/addoi' method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }} 
                                         
                                                            <div class="row">
                                                            
                                                                <div class="col-md-3">
                                                                <label > N° Intervention </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input style="width:100%;margin-bottom:10px;" disabled class="form-control" value="{{ 'DI'.uniqid() }}" type="text" >
                                                                <input style="width:100%;margin-bottom:10px;"  class="form-control" value="{{ 'DI'.uniqid() }}" type="hidden" name="numero">
                                                                
                                                                </div>
                                                             

                                                                 <div class="col-md-3">
                                                                    <label > <label>  Client </label> </label>
                                                                    
                                                                </div>

                                                                <div class="col-md-9" class="search_box_select">
                                                                <select style="width:100%;margin-bottom:10px;" data-live-search="true" class="form-control"  name="idclient">
                                                             
                                                                    <option >Sélectionner un client</option>  
                                                                @foreach($clients as $client )
                                                                    
                                                                    <option value="{{ $client->id_client }}">{{ $client->clientname }}</option>
                                                          
                                                                @endforeach
                                                                </select>
                                                              
                                                                </div>
                                            
                                                                <div class="col-md-3">
                                                                <label > <label>  Equipement </label> </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <select style="width:100%;margin-bottom:10px;" class="form-control" name="machine">
                                                                    <option >Sélectionner un Equipement</option>
                                                                @foreach($equipements as $equipement )
                                                                        
                                                                        <option value="{{ $equipement->id_equipement }}">{{ $equipement->designation.'---'.$equipement->modele}}</option>
                                                                        
                                                                        
                                                                @endforeach
                                                                </select>
                                                                </div>

                                                                <div class="col-md-3">
                                                                <label > <label>  Sous Equipement </label> </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <select style="width:100%;margin-bottom:10px;" class="form-control" name="sousequipement">
                                                                    <option>Sélectionner un Sous Equipement</option>
                                                                @foreach($sousequipements as $sousequipement )
                                                                        
                                                                        <option value="{{ $sousequipement->id_sousequipement }}">{{ $sousequipement->designation }}</option>
                                                                        
                                                                        
                                                                @endforeach
                                                                </select>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                    <label > <label>  Accessoire </label> </label>
                                                                </div>

                                                                <div class="col-md-9">
                                                                    <select style="width:100%;margin-bottom:10px;" class="form-control" name="accessoire">
                                                                        <option >Sélectionner un Accessoire</option>
                                                                @foreach($accessoires as $accessoire )
                                                                        
                                                                        <option value="{{ $accessoire->id_accessoire }}">{{ $accessoire->designation }}</option>
    
                                                                @endforeach
                                                                </select>
                                                                </div>
                                                               
        
                                                                <div class="col-md-3">
                                                                    <label> Type de panne/Mission </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select style="width:100%;margin-bottom:10px;" class="form-control" name="type_panne">
                                                                
                                                                        <option >Selectionner une Panne/Pission</option>
                                                                    @foreach($typepannes as $typepanne )
                                                                    
                                                                        <option value="{{ $typepanne->id_typepanne }}">{{ $typepanne->name }}</option>
                                                          
                                                                     @endforeach
                                                           
                                                                </select>
																</div>
															
                                                                <div class="col-md-3">
                                                                <label> Intervenant </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <select name="iduser[]" id="iduser"  multiple="multiple" style="width:100%;margin-bottom:10px;">   
                                                                    <option >Sélectionner l'intervenant</option>
                                                                    @foreach($techniciens as $technicien )
                                                                        <option value="{{ $technicien->name }}">{{ $technicien->name }}</option> 
                                                                    @endforeach
                                                                    @foreach($ingenieurs as $ingenieur )
                                                                        <option value="{{ $ingenieur->name }}">{{ $ingenieur->name }}</option> 
                                                                    @endforeach
                                                                </select>
                           
                                                                </div>

                                                                <div class="col-md-3">
                                                                <label> Heure d'appel Client </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input style="width:100%;margin-bottom:10px;" class="form-control"  type="datetime-local" name="appel_client">
                                                                
                                                                </div>


                                                                <div class="col-md-3">
                                                                <label> Priorité </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select style="width:100%;margin-bottom:10px;" class="form-control" name="priorite">
                                                                    
                                                                        <option >Selectionner une periorité</option>
                                                                        <option value="Très urgent">Très urgent</option>
                                                                        <option value="Urgent">Urgent</option>
                                                                        <option value="Normale">Normale</option>
                                                                    
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                    <label> Etat </label>
                                                                    
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select style="width:100%;margin-bottom:10px;" class="form-control" name="etat">
                                                                        
                                                                        <option >Sélectionner un Etat</option>
                                                                        <option value="Demandé">Demandé</option>
                                                                        <option value="En Cours">En Cours</option>
                                                                        <option value="Suspendu">Suspendu</option>
                                                                        <option value="Terminé">Terminé</option>
                                                                        <option value="Action Clôturé">Action Clôturé </option>
                                                                        
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-3">
                                                                <label> Description Complémentaire </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <textarea style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Ecrire une Description içi" name="commentaire"></textarea>
                                                                
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
