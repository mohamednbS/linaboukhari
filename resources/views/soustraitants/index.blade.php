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
                            <h3 class="panel-title"><i class="lnr lnr-store"></i> Gestion des Sous-Traitants</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">@isset($searchuser) Resultat de recherche pour : <span class="text-primary"> " {{ $searchuser }} "</span> @else Liste des Sous-traitants @endisset </h3>
								</div>
				
								<div class="panel-body">
								@if( session()->get( 'addsoustraitant' ) == "deleted" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Sous-traitant Supprimé avec Succès
								</div>
                                @endif
                                            <table class="table table-bordered">
											
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th style="text-align: center;">Désignation</th>
                                                        <th style="text-align: center;">N°Téléphone</th>
                                                        <th style="text-align: center;">Fax</th>
                                                        <th style="text-align: center;">Email</th>
                                                           
														@if (Auth::user()->role == "Administrateur")
														<th style="text-align: center;">Action</th>
														@endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                @foreach($soustraitant as $soustraitant)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $soustraitant->name }}</td>
                                                    <td>{{ $soustraitant->phone }}</td>
                                                    <td>{{ $soustraitant->fax }}</td>
                                                    <td>{{ $soustraitant->email }}</td>
                                                   @if (Auth::user()->role == "Administrateur")
                                                    <td style="text-align: center;"><a data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-info'  href="/soustraitant/change/{{ $soustraitant->id_soustraitant }}"><i class="lnr lnr-pencil"></i></a> 
														<a data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/soustraitant/delete/{{ $soustraitant->id_soustraitant  }}" onclick="return confirm ('voulez vous vraiment supprimer le sous-traitant' {{ $soustraitant['id']}})"><i class="lnr lnr-trash"></i></a></td>
                                                    @endif
                                                </tr>
                                                @endforeach 
                                                </tbody>
                                            </table>
                                      
                                    <!-- END TABLE STRIPED -->
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