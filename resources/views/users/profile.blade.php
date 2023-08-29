@extends('layouts.app')
@section('content')


<!-- WRAPPER -->
<div id="wrapper">
	@include('menu.menutop')
	@include('menu.menuleft')


		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                <div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
							
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Informations basiques</h4>
										<ul class="list-unstyled list-justify">
											<li>Matricule <span>{{ Auth::user()->matricule }}</span></li>
											
											<li>Telephone <span>{{ Auth::user()->phone }}</span></li>
											<li>Email <span>{{ Auth::user()->email }}</span></li>
											<li>Role <span>{{ Auth::user()->role }}</span></li>
										</ul>
									</div>
                                    
									
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right" style="min-height: 500px;">
								<h4 class="heading">{{ Auth::user()->name }}</h4>
                                <div class="profile-info">
								@if( session()->get( 'adduser' ) == "success" )
								<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle"></i> Modification avec succès
									</div>
								@endif
									
									</div>
									
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Activités récentes</a></li>
										
									</ul>
								</div>
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-left1">
                                    
										<ul class="list-unstyled activity-timeline">
                                        @foreach ( $activities as $activity )
											<li>
												<i class="fa fa-comment activity-icon"></i>
												<p>{{ $activity->description }} </p>
											</li>
										@endforeach	
										</ul>
										
									</div>
									
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
		</div>			</div>
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


