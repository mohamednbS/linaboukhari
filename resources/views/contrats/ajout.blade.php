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
							<h3 class="panel-title"><i class="lnr lnr-users"></i> Gestion des Contrats </h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Ajouter un Contrat  </h3>
								</div>
                                
								<div class="panel-body">   
                                @if( session()->get( 'addcontrat' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Contrat Ajouté avec Succès <a href="/cm" class="btn btn-sm btn-default"> Consulter la Liste des Contrats</a>
								</div>
                                @endif
                                <form action='/addcontrat' method="POST" >
									{{ csrf_field() }} 
									
						
										<div class="row">
										
										<!--Générer la liste des clients et équipements et sous-equipements-->
										
										<!-- Styles livewire -->
										    @livewireStyles()

										<!-- Le composant app/Http/Livewire/ClientsEquipementsSelect.php -->
											@livewire("client-equipement-select")

										<!-- Scripts livewire -->
										    @livewireScripts()

											<div class="col-md-3">
											    <label> Date de Début </label>
											</div>

											<div class="col-md-9">
												<input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;" type="date" name="date_debut" class="form-control" >
											</div>
											
											
											<div class="col-md-3">
											    <label> Date de Fin </label>
											</div>
											<div class="col-md-9">
											    <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;" type="date" name="date_fin" class="form-control" >
											</div>

											<div class="col-md-3">
												<label> Type du Contrat </label>
											</div>

											<div class="col-md-9">
												<select  name="type_contrat" class="form-control"  style="width:100%;margin-bottom:15px;" >
													<option>-- Selectionner le Type du Contrat  --</option>
													<option value='Contrat de pièces et main oeuvre'>Contrat de pièces et main d'oeuvre</option>
													<option value='Contrat main oeuvre'>Contrat main d'oeuvre</option>
												</select> 
											</div>

											<div class="col-md-3">
												<label for="validationDefault06"> Etat Contrat </label>
															
											</div>
											<div class="col-md-9">
												<select style="width:100%;margin-bottom:10px;" class="form-control" name="status">
												
													<option >Sélectionner l'état du contrat'</option>
													<option value="En cours">En cours</option>
													<option value="Proche expiration">Proche expiration</option>
													<option value="Renouvelé">Renouvelé</option>
													<option value="Expiré">Expiré</option>
													<option value="Attente approbation">Attente approbation</option>
													<option value="En cours rénégociation">En cours rénégociation</option>
												
												</select>
											</div>
											
											 
											<div class="col-md-3">
											    <label> Note </label>
											</div>

											<div class="col-md-9">
											<input class="form-control" name="note" placeholder="tapper une note ici" type="text">
											</div>
											
											
										
										</div>

                                    <!-- END TABLE STRIPED -->
                                </div>
                    	    </div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6 text-right"><input type="submit" value="Ajouter" class="btn btn-primary"></div>
								</form>
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