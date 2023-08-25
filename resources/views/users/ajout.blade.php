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
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Ajouter Un Utilisateur   </h3>
								</div>
                                
								<div class="panel-body">
                                @if( session()->get( 'adduser' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Utilisateur ajouté avec succès <a href="/users" class="btn btn-sm btn-default"> Consulter la Liste des Utilisateurs </a>
								</div>
                                @endif
                        

                                <form action='/adduser' method="POST" >
                                    {{ csrf_field() }} 
                                         
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="validationDefault01">Nom Utilisateur </label>
                                            
                                        </div>
                                        <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper le nom utilisateur içi" type="text" name="username" id="validationDefault01" required > 
                                           
                                        
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationDefault02"> Matricule </label>
                                            
                                        </div>
                                        <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper la matricule utilisateur içi" type="text" name="usermat" required >
                                            
                                        </div>
<<<<<<< HEAD
                                        <div class="col-md-3">
                                          <label > <label for="validationDefault03"> Email Utilisateur </label> </label>
                                                
                                        </div>
                                        <div class="col-md-9">
                                        <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper l'email içi" type="email" name="usermail"  id="validationDefault03" required>
=======
                                        <div class="col-md-3{{ $errors->has('usermail') ? ' has-error' : '' }}">
                                            <label for="usermail">  Email Utilisateur </label> 
                                                
                                        </div>
                                        <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper l'email içi" type="email" name="usermail" for="usermail"  required>
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
                                          
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationDefault04"> Mot de Passe </label>
                                            
                                        </div>
                                        <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper le mot de passe içi " type="password" name="userpw"  id="email" id="validationDefault04" required>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationDefault05"> Repeter Mot de Passe </label>
<<<<<<< HEAD
                                         
=======
                                        
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
                                        </div>
                                        <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Repeter le mot de passe içi " type="password" name="userrpw" id="validationDefault05" required>
                                        
                                        </div>

                                        <div class="col-md-3">
                                            <label for="validationDefault06"> Rôle Utilisateur </label>
                                            
                                            </div>
                                        <div class="col-md-9">
                                                <select  name="role" class="form-control"  style="width:100%;margin-bottom:15px;" id="validationDefault06" required>
                                                    <option>-- Selectionner Un Rôle  --</option>
                                                    <option value='Administrateur'>Administrateur</option>
                                                    <option value='Superviseur'>Superviseur</option>
<<<<<<< HEAD
                                                    <option value='Ingenieur'>Ingenieur</option>
=======
                                                    <option value='Ingenieur'>Ingénieur</option>
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
                                                    <option value='Technicien'>Technicien</option>
                                                
                                                
                                        </select> 
                                        </div>

                                        <div class="col-md-3">
                                            <label for="validationDefault07"> Mobile </label>
                                            
                                        </div>
                                        <div class="col-md-9">
                                            <input style="width:100%;margin-bottom:10px;" class="form-control" placeholder="Tapper le numéro ici" type="tel" name="phone" id="validationDefault07" required>
                                            
                                        </div>

                                        <div class="col-md-3">
                                            <label for="validationDefault08"> Modalité </label>
                                            
                                        </div>
                                        
                                        <div class="col-md-9">
                                            <select style="width:100%;margin-bottom:10px;" name="modalité" class="form-control" id="validationDefault08" required>
                                                    <option>-- Selectionner Une Modalité --</option>
                                                @foreach( $modalites as $modalite )
                                                <option value='{{ $modalite->id_modalite }}'>{{ $modalite->name }}</option>
                                                @endforeach
                                                    
                                            </select> 
                                        </div>
           
                                        <div class="col-md-3">
                                            <label for="validationDefault09"> Département </label>
                                        
                                        </div>
                                        <div class="col-md-9">
                                            <select name="iddep" class="form-control" id="validationDefault09" required>
                                            <option value="">-- Selectionner Un Département --</option>
                                                @foreach( $departments as $dep )
                                                <option value='{{ $dep->id_departement }}'>{{ $dep->name }}</option>
                                                @endforeach
                                            </select> 
                                        </div>


                  
                                    </div>
             
                                    <!-- END TABLE STRIPED -->
                                </div>
                    	    </div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6 text-right"><input type="submit" value="Ajouter" class="btn btn-primary"></div></form>
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
