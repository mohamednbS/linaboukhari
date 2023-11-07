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
                            <h3 class="panel-title"><i class="lnr lnr-store"></i> Gestion des Pannes</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('d')." ".date('M')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">@isset($searchuser) Resultat de recherche pour : <span class="text-primary"> " {{ $searchuser }} "</span> @else Type des pannes @endisset </h3>
								</div>
				
								<div class="panel-body">
								@if( session()->get( 'addpanne' ) == "deleted" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Panne Supprimé avec Succès
								</div>
                                @endif
                                            <table class="table table-bordered">
											
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th style="text-align: center;">Type de panne</th>
                                                        <th style="text-align: center;">Description</th>
                                                           
														@if (Auth::user()->role == "Administrateur")
														<th>Action</th>
														@endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                @foreach($typepanne as $typepanne)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $typepanne->name }}</td>
                                                    <td>{{ $typepanne->description }}</td>
                                                   @if (Auth::user()->role == "Administrateur")
                                                    <td><a data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-info'  href="/typepanne/change/{{ $typepanne->id_typepanne }}"><i class="lnr lnr-pencil"></i></a> 
														<a data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/typepanne/delete/{{ $typepanne->id_typepanne  }}" onclick="return confirm ('voulez vous vraiment supprimer la panne' {{ $typepanne['id']}})"><i class="lnr lnr-trash"></i></a></td>
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