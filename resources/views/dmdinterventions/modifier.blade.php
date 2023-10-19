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
							<h3 class="panel-title"><i class="lnr lnr-file-empty"></i> Gestion Des Interventions</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Modifier Une Demande d'Intervention   </h3>
								</div>
                                
								<div class="panel-body">
                                @if( session()->get( 'addoi' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Demande  Modifiée avec succès <a href="/di" class="btn btn-sm btn-default"> Consulter Liste Des Demandes d'Interventions </a>
								</div>
                                @endif
                                <form action='/ointervention/mod/{{ $oi->id_intervention }}'method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }} 
                        
                                        <div class="row">
                                        
                                            <div class="col-md-3">
                                            <label > N° Intervention </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" disabled class="form-control" value="{{ $oi->numero}}" type="text" >
                                            <input style="width:100%;margin-bottom:10px;"  class="form-control" value="{{ $oi->numero}}" type="hidden" name="numero">
                                            
                                            </div>

                                        

                                            <!-- Le composant app/Http/Livewire/ClientsEquipementsSelect.php -->
                                            @livewire("client-equipement-select")

                                            <!-- Scripts livewire -->
                                            @livewireScripts()
                        
                                            <div class="col-md-3">
                                            <label> Etat initial d'équipement</label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <select style="width:100%;margin-bottom:10px;" class="form-control" name="type_panne">
                                                @foreach($typepannes as $typepanne )

                                                @if ($typepanne->id_typepanne == $oi->type_panne )
                                                    <option selected value='{{ $typepanne->id_typepanne }}'>{{ $typepanne->name }}</option>
                                                @else
                                                    <option value='{{ $typepanne->id_typepanne }}'>{{ $typepanne->name }}</option>
                                                @endif   
                                            @endforeach
                                    
                                            </select>
                                            </div>

                                            
                                            <div class="col-md-3">
                                                <label> Description de la panne </label>
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <textarea style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $oi->description_panne }}" name="description_panne"></textarea>
                                                
                                            </div>
                                        
                                            <div class="col-md-3">
                                            <label> Intervenant(s) </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <select style="width:100%;margin-bottom:10px;" class="form-control" name="iduser[]" id="iduser"  multiple="multiple">
                                             @foreach($techniciens as $technicien )
                                                    
                                                @if ($technicien->name == $oi->destinateur)
                                                    <option selected value='{{ $technicien->name }}'>{{ $technicien->name }}</option>
                                                @else
                                                    <option value='{{ $technicien->name }}'>{{ $technicien->name }}</option>
                                                @endif
                                                    
                                            @endforeach
                                            @foreach($ingenieurs as $ingenieur )
                                                    
                                                @if ($ingenieur->name == $oi->destinateur)
                                                    <option selected value='{{ $ingenieur->name }}'>{{ $ingenieur->name }}</option>
                                                @else
                                                    <option value='{{ $ingenieur->name }}'>{{ $ingenieur->name }}</option>
                                                @endif
                                                    
                                            @endforeach

                                            </select>
                                            
                                            </div>

                                            <div class="col-md-3">
                                            <label> Heure d'Appel Client </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;"  value="{{ $oi->appel_client}}" type="datetime-local" class="form-control"  name="appel_client">
                                            
                                            </div>


                                            <div class="col-md-3">
                                            <label> Priorité </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                                <select style="width:100%;margin-bottom:10px;" class="form-control" name="priorite">
                                                   @if ( $oi->priorite == "Tres urgent")
                                                
                                                    <option >Selectionner une Priorité</option>
                                                    <option selected value='Tres urgent'>Tres urgent</option>
                                                    <option value="Urgent">Urgent</option>
                                                    <option value="Normale">Normale</option>
                
                                                    @elseif ($oi->priorite == "Urgent")

                                                    <option>-- Sélectionner une priorité--</option>
                                                    <option selected value='Urgent'>Urgent</option>
                                                    <option value='Normale'>Normale</option>
                                                    <option value='Tres urgent'>Tres urgent</option>
                                       
                                                    @else

                                                    <option>-- Sélectionner une priorité --</option>
                                                    <option selected value='Normale'>Normale</option>
                                                    <option value='Tres urgent'>Tres urgent</option>
                                                    <option value='Urgent'>Urgent</option>
                                 
                                                @endif
                                                
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label > Date Début de l'intervention </label>
                                                
                                            </div> 
                                            <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $oi->date_intervention }}" type="datetime-local" name="date_debut">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <label > Date Fin de l'intervention </label>
                                                
                                            </div> 
                                            <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;" class="form-control"  type="datetime-local" name="date_fin_intervention">
                                                
                                            </div>

                                            <div class="col-md-3">
                                                <label> Etat </label>
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <select style="width:100%;margin-bottom:10px;" class="form-control" name="etat">
                                    
                                                @if ( $oi->etat == "Demandé")
                                                    <option>-- Sélectionner un Etat --</option>
                                                    <option selected value='Demandé'>Demandé</option>
                                                    <option value="Diagnostic en Cours">Diagnostic en Cours</option>
                                                    <option value="Reporté">Reporté</option>
                                                    <option value="Attente BC">Attente BC</option>
                                                    <option value="Attente Pièce">Attente Pièce</option>
                                                    <option value="Devis à fournir">Devis à fournir</option>
                                                    <option value="Mise en Attente">Mise en Attente</option>
                                                    <option value="Attente Rapport">Attente Rapport</option>
                                                    <option value="Clôturé Sans Rappport">Clôturé Sans Rappport</option>
                                                    <option value="Clôturé">Clôturé </option> 
                                                @elseif ($oi->etat == "Diagnostic en Cours")
                                                    <option>-- Sélectionner un Etat --</option>
                                                    <option selected value='Diagnostic en Cours'>Diagnostic en Cours</option>
                                                    <option value='Demandé'>Demandé</option>
                                                    <option value="Reporté">Reporté</option>
                                                    <option value="Attente BC">Attente BC</option>
                                                    <option value="Attente Pièce">Attente Pièce</option>
                                                    <option value="Devis à fournir">Devis à fournir</option>
                                                    <option value="Mise en Attente">Mise en Attente</option>
                                                    <option value="Attente Rapport">Attente Rapport</option>
                                                    <option value="Clôturé Sans Rappport">Clôturé Sans Rappport</option>
                                                    <option value="Clôturé">Clôturé </option> 
                                                @elseif ($oi->etat == "Reporté")
                                                    <option>-- Sélectionner un Etat --</option>
                                                    <option selected value='Reporté'>Reporté</option>
                                                    <option value='Demandé'>Demandé</option>
                                                    <option value="Diagnostic en Cours">Diagnostic en Cours</option>
                                                    <option value="Attente BC">Attente BC</option>
                                                    <option value="Attente Pièce">Attente Pièce</option>
                                                    <option value="Devis à fournir">Devis à fournir</option>
                                                    <option value="Mise en Attente">Mise en Attente</option>
                                                    <option value="Attente Rapport">Attente Rapport</option>
                                                    <option value="Clôturé Sans Rappport">Clôturé Sans Rappport</option>
                                                    <option value="Clôturé">Clôturé </option>
                                                @elseif ($oi->etat == "Attente BC")
                                                    <option>-- Sélectionner un Etat --</option>
                                                    <option selected value='Attente BC'>Attente BC</option>
                                                    <option value='Demandé'>Demandé</option>
                                                    <option value="Diagnostic en Cours">Diagnostic en Cours</option>
                                                    <option value="Reporté">Reporté</option>
                                                    <option value="Reporté">Reporté</option>
                                                    <option value="Attente BC">Attente BC</option>
                                                    <option value="Attente Pièce">Attente Pièce</option>
                                                    <option value="Devis à fournir">Devis à fournir</option>
                                                    <option value="Mise en Attente">Mise en Attente</option>
                                                    <option value="Attente Rapport">Attente Rapport</option>
                                                    <option value="Clôturé Sans Rappport">Clôturé Sans Rappport</option>
                                                    <option value="Clôturé">Clôturé </option>
                                                @elseif ($oi->etat == "Attente Pièce")
                                                    <option>-- Sélectionner un Etat --</option>
                                                    <option selected value='Attente Pièce'>Attente Pièce</option>
                                                    <option value='Demandé'>Demandé</option>
                                                    <option value="Diagnostic en Cours">Diagnostic en Cours</option>
                                                    <option value="Reporté">Reporté</option>
                                                    <option value="Attente BC">Attente BC</option>
                                                    <option value="Devis à fournir">Devis à fournir</option>
                                                    <option value="Mise en Attente">Mise en Attente</option>
                                                    <option value="Attente Rapport">Attente Rapport</option>
                                                    <option value="Clôturé Sans Rappport">Clôturé Sans Rappport</option>
                                                    <option value="Clôturé">Clôturé </option>
                                                @elseif ($oi->etat == "Devis à fournir")
                                                    <option>-- Sélectionner un Etat --</option>
                                                    <option selected value='Devis à fournir'>Devis à fournir</option>
                                                    <option value='Demandé'>Demandé</option>
                                                    <option value="Diagnostic en Cours">Diagnostic en Cours</option>
                                                    <option value="Reporté">Reporté</option>
                                                    <option value="Attente BC">Attente BC</option>
                                                    <option value="Attente Pièce">Attente Pièce</option>
                                                    <option value="Mise en Attente">Mise en Attente</option>
                                                    <option value="Attente Rapport">Attente Rapport</option>
                                                    <option value="Clôturé Sans Rappport">Clôturé Sans Rappport</option>
                                                    <option value="Clôturé">Clôturé </option>
                                                @elseif ($oi->etat == "Mise en Attente")
                                                    <option>-- Sélectionner un Etat --</option>
                                                    <option selected value='Mise en Attente'>Mise en Attente</option>
                                                    <option value='Demandé'>Demandé</option>
                                                    <option value="Diagnostic en Cours">Diagnostic en Cours</option>
                                                    <option value="Reporté">Reporté</option>
                                                    <option value="Attente BC">Attente BC</option>
                                                    <option value="Attente Pièce">Attente Pièce</option>
                                                    <option value="Devis à fournir">Devis à fournir</option>
                                                    <option value="Attente Rapport">Attente Rapport</option>
                                                    <option value="Clôturé Sans Rappport">Clôturé Sans Rappport</option>
                                                    <option value="Clôturé">Clôturé </option>
                                                @elseif ($oi->etat == "Attente Rapport")
                                                    <option>-- Sélectionner un Etat --</option>
                                                    <option selected value='Attente Rapport'>Attente Rapport</option>
                                                    <option value='Demandé'>Demandé</option>
                                                    <option value="Diagnostic en Cours">Diagnostic en Cours</option>
                                                    <option value="Reporté">Reporté</option>
                                                    <option value="Attente BC">Attente BC</option>
                                                    <option value="Attente Pièce">Attente Pièce</option>
                                                    <option value="Devis à fournir">Devis à fournir</option>
                                                    <option value="Mise en Attente">Mise en Attente</option>
                                                    <option value="Clôturé Sans Rappport">Clôturé Sans Rappport</option>
                                                    <option value="Clôturé">Clôturé </option>
                                                @elseif ($oi->etat == "Clôturé Sans Rappport")
                                                    <option>-- Sélectionner un Etat --</option>
                                                    <option selected value='Clôturé Sans Rappport'>Clôturé Sans Rappport</option>
                                                    <option value='Demandé'>Demandé</option>
                                                    <option value="Diagnostic en Cours">Diagnostic en Cours</option>
                                                    <option value="Reporté">Reporté</option>
                                                    <option value="Attente BC">Attente BC</option>
                                                    <option value="Attente Pièce">Attente Pièce</option>
                                                    <option value="Devis à fournir">Devis à fournir</option>
                                                    <option value="Mise en Attente">Mise en Attente</option>
                                                    <option value="Attente Rapport">Attente Rapport</option>
                                                    <option value="Clôturé">Clôturé </option>
                                                    <option value='Terminé'>Terminé</option>
                                                
                                                @else
                                                    <option>-- Sélectionner un Etat --</option>
                                                    <option selected value='Clôturé'>Clôturé</option>
                                                    <option value='Demandé'>Demandé</option>
                                                    <option value="Diagnostic en Cours">Diagnostic en Cours</option>
                                                    <option value="Reporté">Reporté</option>
                                                    <option value="Attente BC">Attente BC</option>
                                                    <option value="Attente Pièce">Attente Pièce</option>
                                                    <option value="Devis à fournir">Devis à fournir</option>
                                                    <option value="Mise en Attente">Mise en Attente</option>
                                                    <option value="Attente Rapport">Attente Rapport</option>
                                                    <option value='Clôturé'>En Cours</option>
                                                    <option value="Clôturé Sans Rappport">Clôturé Sans Rappport</option>
                                                   
                                                    
                                                
                                                @endif
                                                </select> 
                                            </div> 

                                            <div class="col-md-3">
                                            <label> Description de l'intervention </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <textarea style="width:100%;margin-bottom:10px;" class="form-control"  name="commentaire"></textarea>
                                            
                                            </div>

                                            <div class="col-md-3">
                                                <label> Rapport d'Intervention </label>
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;"  class="form-control"  type="file" name="document">
                                            
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

                                                   
												
                                                

												

													