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
							<h3 class="panel-title"><i class="lnr lnr-cog"></i> Gestion des Maintenance Préventives</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Ajouter une Maintenance Préventive   </h3>
								</div>
                                
								<div class="panel-body">
                                @if( session()->get( 'addmp' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Maintenance  ajoutée avec succèss <a href="/mp" class="btn btn-sm btn-default"> Consulter la liste des Maintenances Préventives </a>
								</div>
                                @endif
                                <form action='/addmp' method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }} 
                            
                                            <div class="row">
                                            
                                                <div class="col-md-3">
                                                <label > Identifiant </label>
                                                
                                                </div>
                                                <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;" disabled class="form-control" value="{{ 'MP'.uniqid() }}" type="text" >
                                                <input style="width:100%;margin-bottom:10px;"  class="form-control" value="{{ 'MP'.uniqid() }}" type="hidden" name="numero">
                                                
                                                </div>
                                                <!--Générer la liste des clients et équipements -->
                                                                
                                                <!-- Styles livewire -->
                                                    @livewireStyles()

                                                <!-- Le composant app/Http/Livewire/ClientsEquipementsSelect.php -->
                                                    @livewire("client-equipement-select")

                                                <!-- Scripts livewire -->
                                                    @livewireScripts()


                                                <div class="col-md-3">
                                                <label for="validationDefault03"> Unité de mesure </label> 
                                                
                                                </div>
                                                <div class="col-md-9">
                                                <select style="width:100%;margin-bottom:10px;" class="form-control" name="unite_mesure" id="validationDefault03" required>
                                                
                                                        <option >Selectionner l'unite de mesure</option>
                    
                                                        <option value="Jours">Jours</option>
                                                        <option value="Mois">Mois</option>
                                                </select>
                                                </div>

                                                <div class="col-md-3">
                                                <label for="validationDefault04"> Intervalle </label>
                                                
                                                </div>
                                                <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;" type="number" name="intervalle" class="form-control" id="validationDefault04 " required>
                                                
                                                </div>
                                                <div class="col-md-3">
                                                <label for="validationDefault05"> Commencé le </label>
                                                
                                                </div>
                                                <div class="col-md-9">
                                                <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;" type="date" name="date_debut" class="form-control" id="validationDefault05 " required >
                                                
                                                </div>
                                                <div class="col-md-3">
                                                <label for="validationDefault06"> Terminé le </label>
                                                
                                                </div>
                                                <div class="col-md-9">
                                                        <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;" type="date" name="date_fin" class="form-control" >
                                                </div>

                                                <div class="col-md-3">
                                                    <label> Prochaine Date d'Execution </label>
                                                    
                                                    </div>
                                                <div class="col-md-9">
                                                    <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;"   type="date" name="date_execution" class="form-control" id="validationDefault06 " required >
                                                </div>
                
                                        
                                                
                                                <div class="col-md-3">
                                                <label for="validationDefault07"> Intervenant </label>
                                                
                                                </div>
                                                <div class="col-md-9">
                                            
                                                    <select name="executeur[]" id="executeur"  multiple="multiple" style="width:100%;margin-bottom:10px;" id="validationDefault07 " required>   
                                                        <option >Selectionner l'intervenant</option>
                                                        @foreach($techniciens as $technicien )
                                                            <option value="{{ $technicien->name }}">{{ $technicien->name }}</option> 
                                                        @endforeach
                                                        @foreach($ingenieurs as $ingenieur )
                                                            <option value="{{ $ingenieur->name }}">{{ $ingenieur->name }}</option> 
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="validationDefault08"> Etat </label>
                                                    
                                                </div>
                                                <div class="col-md-9">
                                                    <select style="width:100%;margin-bottom:10px;" class="form-control" name="etat" id="validationDefault08" required>
                                                        
                                                        <option >Selectionner un Etat</option>
                                                        <option value="Programé">Programé</option>
                                                        <option value="En Cours">En Cours</option>
                                                        <option value="Suspendu">Suspendu</option>
                                                        <option value="Terminé">Terminé</option>
                                                        
                                                    </select>
                                                </div>

            
                                                <div class="col-md-3">
                                                    <label > <label> Commmentaires </label> </label>
                                                                
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <input style="width:100%;margin-bottom:10px;" class="form-control" type='text' name="observation" placeholder="saisir un commentaire içi">
                                                
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
