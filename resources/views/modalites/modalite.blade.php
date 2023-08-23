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
                            <h3 class="panel-title"><i class="lnr lnr-laptop-phone"></i> Gestion des Modalités </h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
					
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"> Modalité : {{ $modalite->name }} </h3>
                                    @if (Auth::user()->role == "Administrateur")
                                    <td class="table-info"><a  data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-primary'  href="/modalite/change/{{ $modalite->id_modalite }}"><i class="lnr lnr-pencil"></i></a> 
                                        <a  data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/modalite/delete/{{ $modalite->id_modalite  }}" ><i class="lnr lnr-trash"></i></a>
                                        <a href="/modalites/{{ $modalite->id_modalite }}/equipements/create" class="btn btn-info">Ajouter Equipement</a>   
                                    </td>

                                    
                                        
                                    @endif
								</div>

                                <div class="row">
                            </div>                            
                            </div>  
                        </div>
                        	<div class="col-md-12">
                        	<div class="panel-body">
                        	@if( session()->get( 'addequipement' ) == "deleted" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Equipement supprimé avec succès
								</div>
                            
                            @endif
                        <!--LISTE DES EQUIPEMENTS-->
                           
                            <h3  class="text-info"> Liste des Equipements</h3>
                       
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
                                          <th>Désignation</th> 
                                          <th>Numéro De Série</th>
                                          <th>Modèle</th>
                                          <th>Client</th>
                                          
                                          @if (Auth::user()->role == "Administrateur")
                                          <th>Action</th>
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
                                      <td>{{ $equipement->numserie}}</td>
                                      <td>{{ $equipement->modele }}</td>
                                      <td>@foreach($clients as $client )
                                        @if ($equipement->client_id_client == $client->id_client)
                                            {{ $client->clientname}}
                                        @endif
                                     
                                        @endforeach</td>
                                   
                                      <td>    
                                        @if (Auth::user()->role == "Administrateur") 

                                        <a  data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-primary' href="/equipement/mod/{{ $equipement->id_equipement }}"><i class="lnr lnr-pencil"></i> </a> 
                                        <a  data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger'  href="/equipement/del/{{ $equipement->id_equipement }}" onclick="return confirm ('voulez vous vraiment supprimer cet équipement' {{ $equipement['id']}})"><i class="lnr lnr-trash"></i></a></td>
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
  