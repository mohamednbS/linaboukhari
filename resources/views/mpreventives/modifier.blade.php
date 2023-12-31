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
									<h3 class="panel-title"> Modifier la  Maintenance Préventive   </h3>
								</div>
                                
								<div class="panel-body">
                                @if( session()->get( 'addmp' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Maintenance  modifiée avec succèss <a href="/mp" class="btn btn-sm btn-default"> Consulter la liste des Maintenances Préventives </a>
								</div>
                                @endif
                                <form action='/mpreventive/mod/{{ $mp->id_mpreventive }}' method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }} 
                            
                                            <div class="row">
                                            
                                                <div class="col-md-3">
                                                <label > Identifiant </label>
                                                
                                                </div>
                                                <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;" disabled class="form-control"  value="{{ $mp->numero}}"  type="text" >
                                                <input style="width:100%;margin-bottom:10px;"  class="form-control" value="{{ $mp->numero}}" type="hidden" name="numero">
                                                
                                                </div>

                                           
                                                <!--Générer la liste des clients et équipements -->
                                                                
                                                <!-- Styles livewire -->
                                                    @livewireStyles()

                                                <!-- Le composant app/Http/Livewire/ClientsEquipementsSelect.php -->
                                                    @livewire("client-equipement-select")

                                                <!-- Scripts livewire -->
                                                    @livewireScripts()
                                             
                                           

                                          
                    

                                                <div class="col-md-3">
                                                <label> Unité de mesure </label>   
                                                
                                                </div>
                                                <div class="col-md-9">
                                                <select style="width:100%;margin-bottom:10px;" class="form-control" name="unite_mesure">
                                            
                                                   
                                                        <option>-- selectionner l'unité de mesure --</option>
                                                        <option selected value='Mois'>Mois</option>
                                                        <option value='Mois'>Mois</option>
                                                
                                                </select>
                                                </div>

                                                <div class="col-md-3">
                                                <label> Intervalle </label>
                                                
                                                </div>
                                                <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;" value="{{ $mp->intervalle}}" type="number" name="intervalle" class="form-control" >
                                                
                                                </div>
                                                <div class="col-md-3">
                                                <label> Commencé le </label>
                                                
                                                </div>
                                                <div class="col-md-9">
                                                <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;"  value="{{ $mp->date_debut}}" type="date" name="date_debut" class="form-control" >
                                                
                                                </div>
                                                <div class="col-md-3">
                                                <label> Terminé le </label>
                                                
                                                </div>
                                                <div class="col-md-9">
                                                        <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;"  value="{{ $mp->date_fin}}" type="date" name="date_fin" class="form-control" >
                                                </div>

                                                <div class="col-md-3">
                                                    <label> Prochaine Date d'Execution </label>
                                                    
                                                    </div>
                                                <div class="col-md-9">
                                                    <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;"  value="{{ $mp->date_execution}}" type="date" name="date_execution" class="form-control" >
                                                </div>
                
                                        
                                                
                                                <div class="col-md-3">
                                                <label> Intervenant </label>
                                                
                                                </div>
                                                <div class="col-md-9">
                                                <select style="width:100%;margin-bottom:10px;" class="form-control" name="executeur[]" id="executeur" multiple="multiple">
                                                @foreach($techniciens as $technicien )
        
                                                    @if ($technicien->id_user == $mp->executeur )
                                                        <option selected value='{{ $technicien->name }}'>{{ $technicien->name }}</option>
                                                    @else
                                                        <option value='{{ $technicien->name }}'>{{ $technicien->name }}</option>
                                                    @endif
                                                @endforeach
                                                @foreach($ingenieurs as $ingenieur )
        
                                                    @if ($ingenieur->id_user == $mp->executeur )
                                                        <option selected value='{{ $ingenieur->name }}'>{{ $ingenieur->name }}</option>
                                                    @else
                                                        <option value='{{ $ingenieur->name }}'>{{ $ingenieur->name }}</option>
                                                    @endif
                                                @endforeach
                                                </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label> Etat </label>
                                                    
                                                </div>
                                                <div class="col-md-9">
                                                    <select style="width:100%;margin-bottom:10px;" class="form-control" name="etat">
                                        
                                                    @if ( $mp->etat == "Planifié")
                                                        <option>-- Sélectionner un Etat --</option>
                                                        <option selected value='Planifié'>Planifié</option>
                                                        <option value='En Cours'>En Cours</option>
                                                        <option value='Reporté'>Reporté</option>
                                                        <option value='Clôturé'>Clôturé</option>
                                                        <option value="Clôturé sans rapport">Clôturé sans rapport</option>

                                                    @elseif ($mp->etat == "En Cours")
                                                        <option>-- Sélectionner un Etat --</option>
                                                        <option selected value='En Cours'>En Cours</option>
                                                        <option value='Planifié'>Planifié</option>
                                                        <option value='Reporté'>Reporté</option>
                                                        <option value='Clôturé'>Clôturé</option>
                                                        <option value="Clôturé sans rapport">Clôturé sans rapport</option>
                                                    @elseif ($mp->etat == "Reporté")
                                                        <option>-- Sélectionner un Etat --</option>
                                                        <option selected value='Reporté'>Reporté</option>
                                                        <option value='En cours'>En cour</option>
                                                        <option value='Planifié'>Planifié</option>
                                                        <option value='Clôturé'>Clôturé</option>
                                                        <option value="Clôturé sans rapport">Clôturé sans rapport</option>

                                                    @elseif ($mp->etat == "Clôturé")
                                                        <option>-- Sélectionner un Etat --</option>
                                                        <option selected value='Clôturé'>Reporté</option>
                                                        <option value='Planifié'>Planifié</option>
                                                        <option value='En cours'>En cour</option> 
                                                        <option value='Reporté'>Reporté</option>
                                                        <option value="Clôturé sans rapport">Clôturé sans rapport</option>
                                                    @else
                                                        <option>-- Sélectionner un Etat --</option>
                                                        <option selected value="Clôturé sans rapport">Clôturé sans rapport</option>
                                                        <option value='En Cours'>En Cours</option>
                                                        <option value='Planifié'>Planifié</option>
                                                        <option value='Reporté'>Reporté</option>
                                                        <option value='Clôturé'>Clôturé</option>
                                                        
                                                    
                                                    @endif
                                                    </select> 
                                                </div> 

                                                    <div class="col-md-3">
                                                    <label > <label>  Commentaires </label> </label>   
                                                        </div>

                                                <div class="col-md-9">
                                                    <input style="width:100%;margin-bottom:10px;"  value="{{ $mp->observation}}" class="form-control" type='text' name="observation">
                                                </div>

                                                <div class="col-md-3">
                                                    <label> Rapport d'Intervention </label>
                                                    
                                                </div>
                                                <div class="col-md-9">
                                                    <input style="width:100%;margin-bottom:10px;"  class="form-control"  type="file" name="document">
                                                
                                                </div> 

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