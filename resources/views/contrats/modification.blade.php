@extends('layouts.app')
@section('content')

<!-- WRAPPER -->
<div id="wrapper">
	
	<!--MENU-->
    @include('menu.menutop')
	@include('menu.menuleft')
	

		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->  
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="lnr lnr-users"></i> Gestion des Contrats</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Modification du Contrat   </h3>
								</div>
                                
								<div class="panel-body">
                                @if( session()->get( 'addcontrat' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Contrat Modifié avec Succèss <a href="/cm" class="btn btn-sm btn-default"> Consulter Liste des Contrats </a>
								</div>
                                @endif
                                <form action='/cm/mod/{{ $contrat->id_contrat }}/valide' method="POST" >
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
													<label > Date de Début </label>
													
													</div>
													<div class="col-md-9">
													<input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $contrat->date_debut }}" type="date" name="date_debut">
												</div>

												<div class="col-md-3">
													<label > Date de Fin </label>
													
													</div>
													<div class="col-md-9">
													<input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $contrat->date_fin }}" type="date" name="date_fin">
												</div>

												<div class="col-md-3">
													<label > Type du Contrat </label>
													
												</div>
												<div class="col-md-9">
													<select name="type_contrat" style="width:100%;margin-bottom:10px;" class="form-control">
														@if ( $contrat->type_contrat == "Contrat de pièces et main oeuvre")
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
													<label for="validationDefault06"> Etat Contrat </label>
																
												</div>
												<div class="col-md-9">
												<select style="width:100%;margin-bottom:10px;" class="form-control" name="status">
												
													@if ( $contrat->status == "En cours")
														<option >Sélectionner l'état du contrat</option>
														<option selected value='En cours'>En cours</option>
														<option value='Proche expiration'>Proche expiration</option>
														<option value='Renouvelé'>Renouvelé</option>
														<option value='Expiré'>Expiré</option>
														<option value='Attente approbation'>Attente approbation</option>
														<option value='En cours rénégociation'>En cours rénégociation</option>

													@elseif ( $contrat->status == "Proche expiration")
														<option >Sélectionner l'état du contrat</option>
														<option selected value='Proche expiration'>Proche expiration</option>
														<option value='En cours'>En cours</option>
														<option value='Renouvelé'>Renouvelé</option>
														<option value='Expiré'>Expiré</option>
														<option value='Attente approbation'>Attente approbation</option>
														<option value='En cours rénégociation'>En cours rénégociation</option>

													@elseif ( $contrat->status == "Renouvelé")
														<option >Sélectionner l'état du contrat</option>
														<option selected value='Renouvelé'>Renouvelé</option>
														<option value='En cours'>En cours</option>
														<option value='Proche expiration'>Proche expiration</option>
														<option value='Expiré'>Expiré</option>
														<option value='Attente approbation'>Attente approbation</option>
														<option value='En cours rénégociation'>En cours rénégociation</option>

													@elseif ( $contrat->status == "Expiré")
														<option >Sélectionner l'état du contrat</option>
														<option selected value='Expiré'>Expiré</option>
														<option value='En cours'>En cours</option>
														<option value='Proche expiration'>Proche expiration</option>
														<option value='Renouvelé'>Renouvelé</option>
														<option value='Attente approbation'>Attente approbation</option>
														<option value='En cours rénégociation'>En cours rénégociation</option>

													@elseif ( $contrat->status == "Attente approbation")
														<option >Sélectionner l'état du contrat</option>
														<option selected value='Attente approbation'>Attente approbation</option>
														<option value='En cours'>En cours</option>
														<option value='Proche expiration'>Proche expiration</option>
														<option value='Renouvelé'>Renouvelé</option>
														<option value='Expiré'>Expiré</option>
														<option value='En cours rénégociation'>En cours rénégociation</option>
													

													@else
													<option >Sélectionner l'état du contrat</option>
													
													<option value='En cours rénégociation'>En cours rénégociation</option>
													<option selected value='En cours'>En cours</option>
													<option selected value='Proche expiration'>Proche expiration</option>
													<option selected value='Renouvelé'>Renouvelé</option>
													<option selected value='Expiré'>Expiré</option>
													<option selected value='Attente approbation'>Attente approbation</option>
									
												@endif
												</select>
												</div>
												
												
												<div class="col-md-3">
												<label> Note </label>
												
												</div>
												<div class="col-md-9">
												<textarea class="form-control" name="note" >{{ $contrat->note }}</textarea>
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
			<p class="copyright">&copy; 2017 <a href="/" target="_blank">TAVGMAO</a>.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<div class="clearfix"></div>
	<footer>
		<div class="container-fluid">
			<p class="copyright">&copy; 2023 <a href="/" target="_blank">STIET</a>.</p>
		</div>
	</footer>
</div>
<!-- END WRAPPER -->
@endsection
