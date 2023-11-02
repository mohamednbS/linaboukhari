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
							<h3 class="panel-title"><i class="lnr lnr-store"></i> Gestion des Sous-traitants</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Modifier un Sous-traitant   </h3>
								</div>
                                
								<div class="panel-body">
                                @if( session()->get( 'addsoustraitant' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Sous-traitant modifié avec succès <a href="/soustraitants" class="btn btn-sm btn-default"> Consulter la liste des sous-traitants </a>
								</div>
                                @endif
                                <form action='/soustraitant/modifier/{{$soustraitant->id_soustraitant}}' method="POST" >
										{{ csrf_field() }} 
                                         
										<div class="row">
										
											<div class="col-md-3">
											<label > Désignation </label>
											
											</div>
											<div class="col-md-9">
											<input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $soustraitant->name }}" type="text" name="name">
											
											</div>
											<div class="col-md-3">
											<label > N°Téléphone </label>
											
											</div>
											<div class="col-md-9">
											<input style="width:100%;margin-bottom:10px;" class="form-control"   name="phone" value="{{ $soustraitant->phone }}">
											
											</div>

                                            <div class="col-md-3">
                                            <label > Fax  </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" name="fax" type="num" value="{{ $soustraitant->fax }}">
                                            
                                            </div>

                                            <div class="col-md-3">
                                            <label > Email  </label>
                                            
                                            </div>
                                            <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control"  name="email" type="text" value="{{ $soustraitant->email }}">
                                            
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