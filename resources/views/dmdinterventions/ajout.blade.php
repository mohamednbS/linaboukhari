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
                                <form action='/addoi' method="POST" enctype="multipart/form-data" wire:submit.prevent="save">
                                                        {{ csrf_field() }} 
                                         
                                                            <div class="row">
                                                            
                                                                <div class="col-md-3">
                                                                <label > N° Intervention </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input style="width:100%;margin-bottom:10px;" disabled class="form-control" value="{{ 'DI'.uniqid() }}" type="text" >
                                                                <input style="width:100%;margin-bottom:10px;"  class="form-control" value="{{ 'DI'.uniqid() }}" type="hidden" name="numero">
                                                                
                                                                </div>
                                                                <!--Générer la liste des clients et équipements et sous-equipements-->
                                                                
                                                                <!-- Styles livewire -->


              
                                                                @livewireStyles()
                                                                 <!-- Le composant app/Http/Livewire/ClientsEquipementsSelect.php -->
                                                                    @livewire("client-equipement-select")
                        

                                                                <!-- Scripts livewire -->
                                                                @livewireScripts()
             
                                                                <div class="col-md-3"> 
                                                                    <label for="validationDefault03"> Etat initial d'équipement </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select style="width:100%;margin-bottom:10px;" class="form-control" name="type_panne" id="validationDefault03" required>
                                                                
                                                                        <option >Sélectionner une Panne/Mission</option>
                                                                    @foreach($typepannes as $typepanne )
                                                                    
                                                                        <option value="{{ $typepanne->id_typepanne }}">{{ $typepanne->name }}</option>
                                                          
                                                                     @endforeach
                                                           
                                                                </select>
																</div>

                                                                <div class="col-md-3">
                                                                    <label> Description de la panne </label>
                                                                    
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <textarea style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Ecrire une Description içi" name="description_panne"></textarea>
                                                                    
                                                                </div>
															
                                                                <div class="col-md-3">
                                                                <label for="validationDefault04"> Intervenant(s) </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <select name="iduser[]" id="iduser"  multiple="multiple" style="width:100%;margin-bottom:10px;" id="validationDefault04" required>   
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
                                                                <label> Sous-traitant </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select style="width:100%;margin-bottom:10px;" class="form-control" name="soustraitant">
                                                                
                                                                        <option >Sélectionner un sous-traitant</option>
                                                                    @foreach($soustraitants as $soustraitant )
                                                                    
                                                                        <option value="{{ $soustraitant->id_soustraitant}}">{{ $soustraitant->name }}</option>
                                                          
                                                                     @endforeach
                                                           
                                                                </select>
																</div>
                           
                                                                

                                                                <div class="col-md-3">
                                                                <label for="validationDefault05"> Heure d'appel Client </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input style="width:100%;margin-bottom:10px;" class="form-control"  type="datetime-local" name="appel_client" id="validationDefault05" required>
                                                                
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <label for="validationDefault06"> Mode d'Appel Client </label>
                                                                    
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <select style="width:100%;margin-bottom:10px;" class="form-control" name="mode_appel" id="validationDefault06" required>
                                                                        
                                                                            <option >Sélectionner le mode d'appel</option>
                                                                            <option value="Mail">Mail</option>
                                                                            <option value="Téléphone">Téléphone</option>
                                                                            <option value="Fax">Fax</option>
                                                                            <option value="WhatsApp">WhatsApp</option>
                                                                        
                                                                        </select>
                                                                    </div>


                                                                <div class="col-md-3">
                                                                <label for="validationDefault06"> Priorité </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select style="width:100%;margin-bottom:10px;" class="form-control" name="priorite" id="validationDefault06" required>
                                                                    
                                                                        <option >Sélectionner une periorité</option>
                                                                        <option value="Très urgent">Très urgent</option>
                                                                        <option value="Urgent">Urgent</option>
                                                                        <option value="Normale">Normale</option>
                                                                    
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <label > Date Début de l'intervention </label>
                                                                    
                                                                </div> 
                                                                <div class="col-md-9">
                                                                    <input style="width:100%;margin-bottom:10px;" class="form-control"  type="datetime-local" name="date_debut">
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                    <label for="validationDefault07"> Etat </label>
                                                                    
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select style="width:100%;margin-bottom:10px;" class="form-control" name="etat" id="validationDefault07" required>
                                                                        
                                                                        <option >Sélectionner un Etat</option>
                                                                        <option value="Demandé">Demandé</option>
                                                                        <option value="Diagnostic en Cours">Diagnostic en Cours</option>
                                                                        <option value="Reporté">Reporté</option>
                                                                        <option value="Attente BC">Attente BC</option>
                                                                        <option value="Attente Pièce">Attente Pièce</option>
                                                                        <option value="Devis à fournir">Devis à fournir</option>
                                                                        <option value="Mise en Attente">Mise en Attente</option>
                                                                        <option value="Attente Rapport">Attente Rapport</option>
                                                                        <option value="Clôturé Sans Rappport">Clôturé Sans Rappport</option>
                                                                        <option value="Cloture">Clôturé </option> 
                                                                        
                                                                    </select>
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
