@extends('layouts.app')

<!-- LEFT SIDEBAR -->

		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
                        <li><a href="/home" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
							<path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
							<path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
						  </svg> <span>Dashboard</span></a></li>

						<li><a href="/profile" ><i class="lnr lnr-user"></i> <span>Compte</span></a></li>

						<li>
                        <a  href="#subusers" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Utilisateurs</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                            <div id="subusers" class="collapse ">
								<ul class="nav">
								@if (Auth::user()->role == "Administrateur")
									<li> <a href="/user/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
								@endif
									<li> <a href="/users" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									
								</ul>
							</div>
                         </li>

						<li>
							<a href="#subdepartments" data-toggle="collapse" class="collapsed"><i class="lnr lnr-store"></i> <span>Départements</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
	
								<div id="subdepartments" class="collapse ">
								<ul class="nav">
									@if (Auth::user()->role == "Administrateur")
									<li> <a href="/department/create" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
									@endif
									<li> <a href="/departments" class=""><i class="lnr lnr-list"></i> Liste</a></li>
	
								</ul>
								</div>
						</li>

						<li>
							<a href="#submodalites" data-toggle="collapse" class="collapsed"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" fill="currentColor" class="bi bi-menu-button-wide" viewBox="0 0 16 16">
							<path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v2A1.5 1.5 0 0 1 14.5 5h-13A1.5 1.5 0 0 1 0 3.5v-2zM1.5 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-13z"/>
							<path d="M2 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm10.823.323-.396-.396A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
							</svg></i> <span>Modalités</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		
								<div id="submodalites" class="collapse ">
								<ul class="nav">
									@if (Auth::user()->role == "Administrateur")
									<li> <a href="/modalite/create" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
									@endif
									<li> <a href="/modalites" class=""><i class="lnr lnr-list"></i> Liste</a></li>
		
								</ul>
								</div>
						</li>

						<li>
                        <a href="#subeqpmt"  data-toggle="collapse" class="collapsed"><i class="lnr lnr-laptop-phone"></i> <span>Equipements</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                            <div id="subeqpmt" class="collapse ">
								<ul class="nav">
							
									<li> <a href="/equipements" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									
								</ul>
							</div>
                        </li>


                        <li>
                        <a href="#subdi"  data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Demande Intervention</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                            <div id="subdi" class="collapse ">
								<ul class="nav">
								@if (Auth::user()->role == "Administrateur")
									<li> <a href="/di/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
								
								@endif
									<li> <a href="/di" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									<li> <a href="/di/historique" class=""><i class="lnr lnr-list"></i> Historique</a></li>
								</ul>
							</div>
                        </li>

						<li>
                        <a href="#submp" class="active" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-cog"></i> <span>Maintenance Préventive</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
                             <div id="submp" class="collapse ">
								<ul class="nav">
								@if (Auth::user()->role == "Administrateur")
									<li> <a href="/mp/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
								@endif
									<li> <a href="/mp" class=""><i class="lnr lnr-list"></i> Liste</a></li>
									<li> <a href="/mp/historique" class=""><i class="lnr lnr-list"></i> Historique</a></li>
								</ul>
							</div>
                        </li>

						<li>
                        <a href="/pm" class=""><i class="lnr lnr-calendar-full"></i> <span>Plan De Maintenance</span></a>
					    </li>

						<li>
						<a href="#subcm"  data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-license"></i> <span>Contrats Maintenance</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							
							<div id="subcm" class="collapse ">
							   <ul class="nav">
							   @if (Auth::user()->role == "Administrateur")
								   <li> <a href="/cm/create" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
							   @endif
								   <li> <a href="/cm" class=""><i class="lnr lnr-list"></i> Liste</a></li>
								   
							   </ul>
						   </div>
						</li>

						<li>
						<a href="#subclients" data-toggle="collapse" class="collapsed"><i class="lnr lnr-store"></i> <span>Gestion Clients</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
	
							<div id="subclients" class="collapse ">
								<ul class="nav">
									@if (Auth::user()->role == "Administrateur")
									<li> <a href="/client/create" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
									@endif
									<li> <a href="/clients" class=""><i class="lnr lnr-list"></i> Liste</a></li>
	
								</ul>
							</div>
						</li>

							<li>
							<a href="#subtypepannes" data-toggle="collapse" class="collapsed"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-exclamation" viewBox="0 0 16 16">
  							<path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm-.55 8.502L7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0zM8.002 12a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
							</svg> <span>Gestion des pannes</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
	
								<div id="subtypepannes" class="collapse ">
								<ul class="nav">
									@if (Auth::user()->role == "Administrateur")
									<li> <a href="/typepanne/create" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
									@endif
									<li> <a href="/typepannes" class=""><i class="lnr lnr-list"></i> Liste</a></li>
	
								</ul>
								</div>
						</li>

					

					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->

  
	<!-- Javascript -->
	<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('vendor/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
	<script src="{{ asset('scripts/klorofil-common.js') }}"></script>