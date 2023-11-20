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
							<h3 class="panel-title"><i class="lnr lnr-file-empty"></i> Gestion des Maintenances Préventives </h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Maintenance Préventive 
                                     </h3>
								</div>
                                <div class="panel-body">
                                
							
                                <form action = "/mp/indexmp/{id_mpreventive}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }} 
                        
                                        <div class="row">
                                            <div class="col-md-3">
                                            <label > Date Début de Maintenance</label>
                                                
                                            </div> 
                                            <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;" class="form-control"  type="datetime-local" name="datedebut">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <label > Date Fin de Maintenance </label>
                                                
                                            </div> 
                                            <div class="col-md-9">
                                                <input style="width:100%;margin-bottom:10px;" class="form-control"  type="datetime-local" name="datefin">
                                                
                                            </div>


                                            <div class="col-md-3">
                                                <label> Etat </label>
                                                
                                            </div>

                                            <div class="col-md-9">
                                                <select style="width:100%;margin-bottom:10px;" class="form-control" name="etat">
                                                    
                                                    <option >Selectionner un Etat</option>
                                                    <option value="Planifié">Planifié</option>
                                                    <option value="En Cours">En Cours</option>
                                                    <option value="Reporté">Reporté</option>
                                                    <option value="Clôturé sans rapport">Clôturé sans rapport</option>
                                                    <option value="Clôturé">Clôturé</option>
                                                    
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                            <label> Commentaires </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <textarea style="width:100%;margin-bottom:10px;" class="form-control"  name="commentaire"></textarea>
                                            
                                            </div>

                                            <div class="col-md-3">
                                                <label> Rapport de Maintenance </label>
                                                
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