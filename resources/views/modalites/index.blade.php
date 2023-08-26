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
                            <h3 class="panel-title"><i class="lnr lnr-store"></i> Gestion des Modalités</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
                        <!-- ADD--> 
						<div class="panel-body">
							<div class="row">
							<div class="col-md-12">
								<!-- TABLE STRIPED -->
								<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title"> Liste des Modalités </h3>
							
									</div>
										
									<div class="panel-body">
								
								<div class="row">
								@foreach($modalites as $modalite)
									  <div class="col-md-4">
										<!-- PANEL NO PADDING -->
										<div class="panel">
											  <div  class="panel-heading" >
												<h3 class="table-info" class="panel-title"><a href="/modalite/{{ $modalite->id_modalite }}">{{ $modalite->name }}</a></h3>
											  
											  </div>
											
										</div>
										<!-- END PANEL NO PADDING -->
									  </div>
									  @endforeach
								</div>                            
												 
									</div>
								</div>

				
                                            
                                      
                                    <!-- END TABLE STRIPED -->
                                </div>
                    	    </div>
							 <!-- end comment--> 
								
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
