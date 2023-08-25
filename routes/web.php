<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index')->name('home')->middleware('auth');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/homet', 'HomeController@indextechnicien')->middleware('auth');
Route::get('/equipements','EquipementsController@index')->middleware('auth');

/* Users route */
Route::get('/profile','UsersController@profile')->middleware('auth');
Route::get('/profile/mod','UsersController@profilemod')->middleware('auth');
Route::post('/modprofile','UsersController@modprofile')->middleware('auth');
Route::get('/users','UsersController@index')->middleware('auth');
Route::get('/user/add','UsersController@create')->middleware('auth');
Route::post('/adduser','UsersController@store')->middleware('auth');
Route::post('/user/filter','UsersController@filter')->middleware('auth');
Route::get('/user/{id_user}','UsersController@edit')->middleware('auth');
Route::post('/moduser/{id_user}','UsersController@update')->middleware('auth');
Route::get('/user/delete/{id_user}','UsersController@destroy')->middleware('auth');
Route::get('/users/loop', "UsersController@loop")->name('loop')->middleware('auth');

/* Equipements route 

Route::get('/equipement/add','EquipementsController@create')->middleware('auth');
Route::post('/addequipement','EquipementsController@store')->middleware('auth');*/
Route::post('/equipement/filter','EquipementsController@filter')->middleware('auth');
Route::get('/equipement/{id_equipement}','EquipementsController@show')->middleware('auth');
Route::get('/equipement/mod/{id_equipement}','EquipementsController@edit')->middleware('auth'); 
Route::get('/equipement/del/{id_equipement}','EquipementsController@destroy')->middleware('auth');
Route::post('/modequipement/{id_equipement}','EquipementsController@update')->middleware('auth');
Route::get('/equipements/detect', "EquipementsController@detect")->name('detect')->middleware('auth');
Route::post('/modalites/{modalite_id_modalite}/equipements','EquipementsController@store')->name('Equipements.store')->middleware('auth');
Route::get('/modalites/{modalite_id_modalite}/equipements/create', 'EquipementsController@create');
/* voir la documementation */ 
Route::get('download-document/{document}', function ($document) {
    $path = storage_path('app/public/' . $document);  

    return response()->download($path, $document);})->name('download.document')->middleware('auth');
Route::get('/equipements/{id_client}', 'EquipementController@getEquipementsByClient');

/* Sous Equipements route */

Route::post('/addsousequipement','SousequipementsController@store')->middleware('auth');
Route::post('/sousequipement/filter','SousequipementsController@filter')->middleware('auth');
Route::get('/sousequipements','SousequipementsController@index')->middleware('auth');
Route::get('/sousequipement/{id}','SousequipementsController@show')->middleware('auth');
Route::get('/sousequipement/mod/{id_sousequipement}','SousequipementsController@edit')->middleware('auth');
Route::post('/modsousequipement/{id_sousequipement}','SousequipementsController@update')->middleware('auth');
Route::get('/equipements/{equipement_id_equipement}/sousequipements','SousequipementsController@delete')->middleware('auth');
Route::post('/equipements/{equipement_id_equipement}/sousequipements','sousequipementsController@store')->name('Sousequipements.store')->middleware('auth');
Route::get('/equipements/{equipement_id_equipement}/sousequipements/create', 'SousequipementsController@create');

/* Accessoires route */
   
Route::post('/sousequipement/filter','AccessoiresController@filter')->middleware('auth');
Route::get('/accessoires','AccessoiresController@index')->middleware('auth'); 
Route::get('/sousequipement/{id}','SouequipementsController@show')->middleware('auth');
Route::get('/accessoire/mod/{id_accessoire}','AccessoiresController@edit')->middleware('auth');
Route::post('/modaccessoire/{id_accessoire}','AccessoiresController@update')->middleware('auth');
Route::get('/equipement/del/{id}','EquipementsController@delete')->middleware('auth');
Route::post('/equipements/{equipement_id_equipement}/accessoires','AccessoiresController@store')->name('Accessoires.store')->middleware('auth');
Route::get('/equipements/{equipement_id_equipement}/accessoires/create', 'AccessoiresController@create');

/* Demande d'intervention route */
Route::get('/di','OinterventionsController@index')->middleware('auth');
Route::get('/di/add','OinterventionsController@create')->middleware('auth');
Route::post('/addoi','OinterventionsController@store')->middleware('auth');
Route::post('/oi/filter','OinterventionsController@filter')->middleware('auth');
Route::get('/intervention/{id_intervention}','OinterventionsController@intervention')->middleware('auth');
Route::post('/ointervention/mod/{id_intervention}',"OinterventionsController@update")->middleware('auth'); 
Route::get('/ointervention/change/{id_intervention}',"OinterventionsController@change")->middleware('auth');
Route::get('/ointervention/delete/{id_intervention}',"OinterventionsController@destroy")->middleware('auth');
Route::get('/ointervention/supprimer/{id_intervention}',"OinterventionsController@destroyHistorique")->middleware('auth');
Route::get('/di/valider/{id_intervention}','OinterventionsController@valider')->middleware('auth');
Route::get('/di/historique','OinterventionsController@historiqueoi')->middleware('auth'); 

Route::get('/ot/{id_intervention}','OinterventionsController@ordretravaille')->middleware('auth');
Route::get('/otoi/show/{id_intervention}','OinterventionsController@ordretravailleshow')->middleware('auth');
Route::get('/otmp/show/{id_intervention}','OinterventionsController@ordretravaillempshow')->middleware('auth');
Route::get('/otmp/historique/{id_mpreventive}','OinterventionsController@historiquempshow')->middleware('auth');
Route::get('/ot/refus/{id_intervention}','OinterventionsController@ordrerefus')->middleware('auth');
Route::get('/otmp/refus/{id_intervention}','OinterventionsController@ordremprefus')->middleware('auth');
Route::post('/ot/addobservation/{id_intervention}','OinterventionsController@addobservationoi')->middleware('auth');
/* Route modifier l'ordre d'intervention */ 
Route::get('/otoi/mod/{id_intervention}','OinterventionsController@modordretravail')->middleware('auth');
Route::post('/ot/modobservation/{idintervention}','OinterventionsController@modobservationoi')->middleware('auth');
/*FIN Route modifier l'ordre d'intervention */  

Route::post('/otmp/addobservation/{id_intervention}','OinterventionsController@addobservationmp')->middleware('auth');
Route::get('/notification/seen/{id_intervention}','NotificationsController@seen')->middleware('auth');
Route::get('/oi/find', "OinterventionsController@find")->name('find')->middleware('auth'); 

/* Rapport d'intervention*/ 
Route::get('download-document/{document}', function ($document) {
    $path = storage_path('app/public/' . $document);

    return response()->download($path, $document);})->name('download.document')->middleware('auth');




/* maintenance preventives route */
Route::get('/mp','MpreventivesController@index')->middleware('auth');
Route::get('/mp/show/{id_mpreventive}','MpreventivesController@show')->middleware('auth');
Route::get('/m/{id_mpreventive}','MaintenancesController@show')->middleware('auth');
Route::get('/mp/add','MpreventivesController@create')->middleware('auth');
Route::post('/addmp','MpreventivesController@store')->middleware('auth');
Route::post('/mp/filter','MpreventivesController@filter')->middleware('auth');
Route::post('/mpreventive/mod/{id_mpreventive}',"MpreventivesController@update")->middleware('auth'); 
Route::get('/mpreventive/change/{id_mpreventive}',"MpreventivesController@change")->middleware('auth');
Route::get('/mpreventive/delete/{id_mpreventive}',"MpreventivesController@destroy")->middleware('auth');
Route::get('/mpreventive/search_mp', "MpreventivesController@search_mp")->name('search_mp')->middleware('auth');
Route::get('/mp/historique','MpreventivesController@historiqueMp')->middleware('auth'); 

/* plan maintenance route */
Route::get('/pm','PlanmaintenancesController@index')->middleware('auth');

/* Contrats du maintenance route */
Route::get('/cm','ContratsController@index')->middleware('auth');
Route::get('/cm/create','ContratsController@create')->middleware('auth');
Route::post('/cm/filter','ContratsController@filter')->middleware('auth');
Route::post('/addcontrat','ContratsController@add')->middleware('auth');
Route::get('/contrat/{id_contrat}','ContratsController@show')->middleware('auth');
Route::get('/cm/del/{id_contrat}','ContratsController@destroy')->middleware('auth');
Route::get('/cm/mod/{id_contrat}','ContratsController@modification')->middleware('auth');
Route::post('/cm/mod/{id_contrat}','ContratsController@modification')->middleware('auth');
Route::post('/cm/mod/{id_contrat}/valide','ContratsController@edit')->middleware('auth');
Route::get('/cm/recherche', "ContratsController@recherche")->name('recherche')->middleware('auth');





/* Messages Route */

Route::get('/messages',"MessagesController@index")->middleware('auth');
Route::get('/conversation/{id}',"MessagesController@conversation")->middleware('auth');
Route::post('/addmessage',"MessagesController@store")->middleware('auth');

/* Departments routes */

Route::post('/department/filter',"DepartmentsController@filter")->middleware('auth');
Route::get('/department/create',"DepartmentsController@create")->middleware('auth');
Route::post('/department/add',"DepartmentsController@add")->middleware('auth');
Route::post('/department/mod/{id_departement}',"DepartmentsController@update")->middleware('auth');
Route::get('/department/change/{id_departement}',"DepartmentsController@change")->middleware('auth');
Route::get('/departments',"DepartmentsController@index")->middleware('auth');
Route::get('/department/delete/{id}',"DepartmentsController@destroy")->middleware('auth');
Route::get('/department/search', "DepartmentsController@search")->name('search')->middleware('auth');

/*Clients routes */
Route::post('/client/filter',"clientsController@filter")->middleware('auth');
Route::get('/client/create',"ClientsController@create")->middleware('auth');
Route::post('/client/add',"ClientsController@add")->middleware('auth');
Route::post('/client/mod/{id_client}',"ClientsController@update")->middleware('auth');
Route::get('/client/change/{id_client}',"ClientsController@change")->middleware('auth');
Route::get('/clients',"ClientsController@index")->middleware('auth');
Route::get('/client/delete/{id_client}',"ClientsController@destroy")->middleware('auth');
Route::get('/clients/filter', "clientsController@filter")->name('filter')->middleware('auth');
Route::get('/equipementclient/{id_client}','ClientsController@show')->middleware('auth');


/* Modalités routes */

Route::post('/modalite/filter',"ModalitesController@filter")->middleware('auth');
Route::get('/modalite/create',"ModalitesController@create")->middleware('auth');
Route::post('/modalite/add',"ModalitesController@add")->middleware('auth');  
Route::post('/modalite/mod/{id_modalite}',"ModalitesController@update")->middleware('auth');
Route::get('/modalite/change/{id_modalite}',"ModalitesController@change")->middleware('auth');
Route::get('/modalites',"ModalitesController@index")->middleware('auth');
Route::get('/modalite/delete/{id}',"ModalitesController@destroy")->middleware('auth');
Route::get('/modalite/{id_modalite}','ModalitesController@show')->middleware('auth');
Route::get('/modalite/search_modalite', "clientsController@search_modalite")->name('search_modalite')->middleware('auth');

/* Type de panne routes */

Route::post('/department/filter',"DepartmentsController@filter")->middleware('auth');
Route::get('/typepanne/create',"TypepannesController@create")->middleware('auth');
Route::post('/typepanne/add',"TypepannesController@add")->middleware('auth');
Route::post('/department/mod/{id_departement}',"DepartmentsController@update")->middleware('auth');
Route::get('/department/change/{id_departement}',"DepartmentsController@change")->middleware('auth');
Route::get('/typepannes',"TypepannesController@index")->middleware('auth');
Route::get('/typepanne/delete/{id_typepanne}',"TypepannesController@destroy")->middleware('auth');


/* ajouter un sous équipement
Route::get('/sousequipements/ajout', function () {
    return view('sousequipements/ajout');
}); */

/* ajouter accessoires*
Route::get('/Equipements/equipement', function () {
    return view('Equipements/equipement');
});  

Route::get('/addsousequipement', function () {
    return view('sousequipements/index'); 
}); */
















