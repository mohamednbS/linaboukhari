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
							<h3 class="panel-title"><i class="lnr lnr-store"></i> Gestion des Départements</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Ajouter Un Département   </h3>
								</div>
                                
								<div class="panel-body">
                                @if( session()->get( 'adddepartment' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Département ajouté avec succès <a href="/departments" class="btn btn-sm btn-default"> Consulter la Liste des Départements</a>
								</div>
                                @endif
                        
                                <form action='/department/add' method="POST" >
										{{ csrf_field() }} 
							
											<div class="row">
											
												<div class="col-md-3">
												<label > Nom du Département </label>
												
												</div>
												<div class="col-md-9">
												<input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper le nom du departement ici" type="text" name="nom">
												
												</div>
												<div class="col-md-3">
												<label > Description  </label>
												
												</div>
												<div class="col-md-9">
												<textarea style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper la description du departement ici"  name="description"></textarea>
												
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
