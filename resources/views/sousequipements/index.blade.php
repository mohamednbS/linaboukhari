@extends('layouts.app')
@section('content')

<!-- WRAPPER -->
<div id="wrapper">

	<!--MENU-->
  
	@include('menu.menuleft')

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
                            <h3 class="panel-title"><i class="lnr lnr-laptop-phone"></i> Gestion des Sou Equipements</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('M')." ".date('d')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"> Liste des Sous Equipements </h3>
								</div>

								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Identifiant</th>
											<th>Désignation</th>
											<th>Date d'Achat</th>
											<th>Date d'Arrivée</th>
											
											@if (Auth::user()->role == "Administrateur")
											<th>Action</th>
											@endif
										</tr>
									</thead>
									<tbody>
									<?php $i=0; ?>
									@foreach($sousequipements as $sousequipement)
									<?php $i++; ?>
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $sousequipement->identifiant }}</td>
										<td>{{ $sousequipement->designation }}</td>
										<td>{{ $sousequipement->date_achat }}</td>
										<td>{{ $sousequipement->date_arrive }}</td>
									   @if (Auth::user()->role == "Administrateur")
										<td><a class='btn btn-primary' href="/sousequipement/mod/{id}/{{ $sousequipement->id }}"><i class="lnr lnr-pencil"></i> Modifier </a>
</td>
										@endif
									</tr>
									@endforeach 
									</tbody>
								</table>
							
								
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
		
		<div class="clearfix"></div>
	<footer>
		<div class="container-fluid">
			<p class="copyright">&copy; 2023 <a href="/" target="_blank">STIET</a>.</p>
		</div>
	</footer>
</div>
<!-- END WRAPPER -->
@endsection