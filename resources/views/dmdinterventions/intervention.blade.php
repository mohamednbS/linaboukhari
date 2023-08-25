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
                            <h3 class="panel-title"><i class="lnr lnr-laptop-phone"></i> Gestion des interventions </h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"> Intervention : {{ $oi->numero }} </h3>
                                    <h3 class="panel-title"> Client : {{ $oi->idclient }} </h3>
                                 
                                    
                                        
                                    @endif
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
                                  
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>N° Intervention</th> 
                                          <th> Equipement</th>
                                          <th>Sous Equipement</th>
										  <th>Accessoire </th>
                                          <th>Client </th>
                                          <th>Heure d'Appel Client</th>
                                       
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php $i=0; ?>
                                @foreach($ointerventions as $oi)
                                  <?php $i++; ?>
                                    <tr>
                                      <td>{{ $i }}</td>
                                      <td>{{ $oi->numero }}</a></td>
                                      <td>{{ $oi->numserie}}</td>
                                      <td>  
                                        @foreach($equipements as $equipement )
                                                        @if ( $equipement->id_equipement == $oi->idmachine )
                                                            {{ $equipement->designation }} 
                                                        @endif
                                        @endforeach
                                       </td>
                                        <td>    
                                            @foreach($sousequipements as $sousequipement )
                                                @if ( $sousequipement->id_sousequipement == $oi->sousequipement )
                                                    {{ $sousequipement->designation }} 
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>    
                                        @foreach($accessoires as $accessoire )
                                            @if ( $accessoire->id_accessoire == $oi->accessoire )
                                                {{ $accessoire->designation }} 
                                            @endif
                                        @endforeach
                                        </td>

                                        <td> {{$oi->appel_client}} </td>
                    
                                    </tr>
                                @endforeach 
                                  </tbody>
                                </table>
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
  