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
                            <h3 class="panel-title"><i class="lnr lnr-laptop-phone"></i> Gestion des Interventions </h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
                                  <h3 class="panel-title">Numéro : {{ $ointervention->numero}}</h3>
                                          <h5 class="panel-subtitle">Equipement: {{ $ointervention->idmachine}}</h5>
										  <h5 class="panel-subtitle">Client: {{ $ointervention->idclient}}</h5>
                             
									
                               
								</div>

                                <div class="row">
                            </div>                            
                            </div>    
                        </div>
                  
                                <div  class="panel-body">
                                      <!-- nav search--> 
                                  
                                <table class="table table-striped">
                                    <div>
                                        <form action="{{ route('search_modalite') }}" method="GET">
                                            <input type="text" name="query" placeholder="Recherche...">
                                            <button type="submit">Rechercher</button> 
                                        </form>
                                    </div>
                                  
                          
                        
  
    
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
  