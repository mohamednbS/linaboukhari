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
                            <h3 class="panel-title"><i class="lnr lnr-laptop-phone"></i> Gestion des Clients </h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"> Client : {{ $client->clientname }} </h3>
                                 
                                    
                                        
                                  
								</div>

                                <div class="row">
                            </div>                            
                            </div>    
                        </div>
                        <!--LISTE DES EQUIPEMENTS-->
                           
                            <h3  class="text-info"> Liste des Equipements</h3>
                       
                                <div  class="panel-body">
                                      <!-- nav search--> 
                                  
                                <table class="table table-bordered">
                                    <div>
                                        <form action="{{ route('search_modalite') }}" method="GET">
                                            <input type="text" name="query" placeholder="Recherche...">
                                            <button type="submit">Rechercher</button> 
                                        </form>
                                    </div>
                                  
                                  <thead>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Désignation</th> 
                                        <th style="text-align: center;">Modèle</th>
                                        <th style="text-align: center;">Numéro de Série</th>
                                        
                                        <th>Software</th>
                                       
                                          
                                          @if (Auth::user()->role == "Administrateur")
                                          <th style="text-align: center;">Action</th>
                                          @endif
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php $i=0; ?>
                                  @foreach($equipements as $equipement)
                                  <?php $i++; ?>
                                    <tr>
                                      <td>{{ $i }}</td>
                                      <td><a href="/equipement/{{ $equipement->id_equipement }}">{{ $equipement->designation }}</a></td>
                                      <td>{{ $equipement->modele }}</td>
                                      <td>{{ $equipement->numserie}}</td>
                                      <td>{{ $equipement->software }}</td>
                                      @if (Auth::user()->role == "Administrateur")
														<td style="text-align: center;"><a href="/equipement/mod/{{ $equipement->id_equipement }}" data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-info'><i class="lnr lnr-pencil"></i> </a> 
															<a  data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger'  href="/equipement/del/{{ $equipement->id_equipement }}" onclick="return confirm ('voulez vous vraiment supprimer cet equipement' {{ $equipement['id']}})"><i class="lnr lnr-trash"></i></a>
                                                            <a  data-toggle="tooltip" data-placement="top" class='btn btn-primary' href="/equipement/{{ $equipement->id_equipement }}">
                                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg></i> 
                                                        </td>
														@endif
                                  
                                
                                    </tr>
                                  @endforeach 
                                  </tbody>
                                </table>
                                </div>
                              <!--FIN LISTE DES EQUIPEMENTS-->
  
    
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
  