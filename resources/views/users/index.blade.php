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
                            <h3 class="panel-title"><i class="lnr lnr-users"></i> Gestion Des Utilisateurs</h3>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('M')." ".date('d')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
		
								<div class="panel-body">
								@if( session()->get( 'adduser' ) == "deleted" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Utilisateur supprimé avec succès
								</div>
                                @endif
                                <table class="table table-bordered">
								<!-- nav search--> 
								<form action="{{ route('loop') }}" method="GET">
								
									<input type="text" name="query" placeholder="Recherche...">
									<button type="submit">Rechercher<i  aria-hidden="True"></i></button> 
									
								</form>
								<thead>
									<tr>
										<th style="text-align: center;">Nom</th>
										<th style="text-align: center;">Matricule</th>
										<th style="text-align: center;">Email</th>
										<th style="text-align: center;">Mobile</th>
										<th style="text-align: center;"> Rôle</th>
										<th style="text-align: center;">Modalité </th>
										<th style="text-align: center;"> Département </th>
										
										
										@if (Auth::user()->role == "Administrateur")
										<th style="text-align: center;">Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
								<?php $i=0; ?>
								@foreach($users as $user)
								<?php $i++; ?>
								<tr>
									
									<td>{{ $user->name}}</td>
									<td>{{ $user->matricule }}</td>
									<td>{{ $user->email }}</td> 
									<td>{{ $user->phone }}</td>
									<td>{{ $user->role }}</td>
									<td>
										@foreach($modalites as $modalite )
										@if ($user->modalité == $modalite->id_modalite )
											{{ $modalite->name }}
										@endif
									
									@endforeach
									</td>
									
									<td>
										@foreach($departments as $dep )
											@if ($user->iddep == $dep->id_departement )
												{{ $dep->name }}
											@endif
										
										@endforeach

									</td>
									
									
									@if (Auth::user()->role == "Administrateur")
									<td  style="text-align: center;"><a data-toggle="tooltip" data-placement="top" title="Modifier" class='btn btn-info' href="/user/{{$user->id_user}}"><i class="lnr lnr-pencil"></i>  </a> 
									
										<a data-toggle="tooltip" data-placement="top" title="supprimer" class='btn btn-danger' href="/user/delete/{{ $user->id_user }}" onclick="return confirm ('voulez vous vraiment supprimer cet utilisateur' {{ $user['id']}})"><i class="lnr lnr-trash" ></i></a></td>
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
