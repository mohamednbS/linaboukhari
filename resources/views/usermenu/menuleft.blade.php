
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
			<nav>
					<ul class="nav">
                        <li><a href="/homet" class="active"><i class="lnr lnr-home"></i> <span>Tableau de bord</span></a></li>
						<li><a href="/profile" ><i class="lnr lnr-user"></i> <span>Compte</span></a></li>
						<li>
							<a  href="#subusers" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Utilisateurs</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
								
								<div id="subusers" class="collapse ">
									<ul class="nav">
									
										<li> <a href="/users" class=""><i class="lnr lnr-list"></i> Liste</a></li>
										
									</ul>
								</div>
							 </li>
	
							<li>
							<a href="#submodalites" data-toggle="collapse" class="collapsed"><i class="lnr lnr-store"></i> <span>Equipements</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		
								<div id="submodalites" class="collapse ">
								<ul class="nav">
									@if (Auth::user()->role == "Administrateur")
									<li> <a href="/modalite/create" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
									@endif
									<li> <a href="/modalites" class=""><i class="lnr lnr-list"></i> Liste</a></li>
		
								</ul>
							</li>
	
							<li>
							<a href="#subdi"  data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Historique Intervention</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
								
								<div id="subdi" class="collapse ">
									<ul class="nav">
									@if (Auth::user()->role == "Administrateur")
										<li> <a href="/di/add" class=""><i class="lnr lnr-file-add"></i> Ajouter</a></li>
										<li> <a href="/di" class=""><i class="lnr lnr-list"></i> Liste</a></li>
										<li> <a href="/di/add" class=""><i class="lnr lnr-file-add"></i> Historique</a></li>
									@endif
										
										<li> <a href="/di/add" class=""><i class="lnr lnr-file-add"></i> Historique</a></li>
										
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
	
					</ul>
				</nav>
			</div>
		</div>