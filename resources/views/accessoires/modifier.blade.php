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
							<h4 class="panel-title"><i class="lnr lnr-laptop-phone"></i> Gestion des Accessoires</h4>
							<p class="panel-subtitle">Aujourd'hui : <?php echo date('M')." ".date('d')." , ".date('Y'); ?> </p>
						</div>
						<div class="panel-body">
                        <div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
                                
								<div class="panel-heading">
									<h3 class="panel-title"> Modification :<span class="text-primary"> {{$accessoire->designation}} </span> </h3>
								</div>
                                
								<div class="panel-body">
                                @if( session()->get( 'addaccessoire' ) == "success" )
                                <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Accessoire modifié avec succès <span  class="btn btn-sm btn-default"> Routouner à la page précédente pour voir les modifications </span>
								</div>
                                @endif
                                <form action='/modaccessoire/{{ $accessoire->id_accessoire }}' method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }} 
                                          
                                                            <div class="row">
                                                            
                                                                <div class="col-md-3">
                                                                    <label > Identifiant </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $accessoire->identifiant }}"  type="text" name="identifiant">
                                                                    
                                                                </div>
                                                                <div class="col-md-3">
                                                                <label > Désignation </label>
                                                                
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input style="width:100%;margin-bottom:10px;" class="form-control" value="{{ $accessoire->designation }}" type="text" name="designation">
                                                                
                                                                </div>

                                                                <div class="col-md-3">
                                                                <label > <label> Date d'Achat </label> </label>
                                                                   
                                                                </div> 
                                                                <div class="col-md-9">
                                                                    <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;" value="{{ $accessoire->date_achat}}" type="date" name="date_achat" class="form-control" >
                                                                    </div>
                                                                
                                                                <div class="col-md-3">
                                                                    <label > <label> Date de Mise en Service </label> </label>  
                                                                 </div>
                                                                 <div class="col-md-9">
                                                                    <input min="{{ Carbon\Carbon::now() }}" style="width:100%;margin-bottom:10px;" value="{{ $accessoire->date_arrive}}" type="date" name="date_arrive" class="form-control" >
                                                                    </div>

                                                               
                                                            </div>
                                 
                                    <!-- END TABLE STRIPED -->
                                </div>
                    	</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6 text-right"><input type="submit" value="Modifier" class="btn btn-primary"></div></form>
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