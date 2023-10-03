<?php
use Illuminate\Support\Facades\Input;
namespace App\Http\Controllers;
use Auth;
use File;
use App\User;
use App\Message;
use App\Activite;
use Carbon\Carbon;
use App\Equipement;
use App\Sousequipement;
use App\Accessoire;
use App\Client;
use App\Maintenance;
use App\Typepanne;
use App\Mpreventive;
use App\Notification;
use App\Ointervention;
use Illuminate\Http\Request;

class OinterventionsController extends Controller
{
    //
    public function index(Request $request){
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $users = User::all();
        $equipements = Equipement::all();
        $typepannes = Typepanne::all();
        $clients = Client::all();
        $techniciens = User::where('role',"Technicien")->get();
        $ingenieurs = User::where('role',"Ingenieur")->get();
        $ointerventions = Ointervention::where('etat',"!=","Terminé")   
                                        ->get(); 
        $ointerventions = Ointervention::paginate(5);
        return view('dmdinterventions.index')->with('messages',$messages)->with('notifications',$notifications)->with('ointerventions',$ointerventions)->with('equipements',$equipements)->with('clients',$clients)->with('users',$users)->with('typepannes',$typepannes)->with('techniciens', $techniciens)->with('ingenieurs',$ingenieurs);
    }
    public function create(){
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $equipements = Equipement::all();
        $sousequipements = Sousequipement::all();
      
        $typepannes = Typepanne::all();
        $techniciens = User::where('role',"Technicien")->get();
        $ingenieurs = User::where('role',"Ingenieur")->get();
        $users = User::all();
        return view('dmdinterventions.ajout')->with('users',$users)->with('equipements',$equipements)->with('techniciens',$techniciens)->with('messages',$messages)->with('notifications',$notifications)->with('typepannes',$typepannes)->with('sousequipements',$sousequipements)->with('ingenieurs',$ingenieurs);
    }
    public function store(Request $request){
        $numero = $request->input('numero');
        $idclient = $request->input('idclient');
        $idmachine = $request->input('machine');
        $sousequipement = $request->input('sousequipement');
        $type_panne = $request->input('type_panne');
        $destinateurs = $request->input('iduser');
        $appel_client = $request->input('appel_client');
        $priorite = $request->input('priorite');
        $commentaire = $request->input('commentaire');
        $etat = $request->input('etat');
       
       $oi = new Ointervention();
       $oi->numero = $numero;
       $oi->idclient = $idclient;
       $oi->idmachine = $idmachine;
       $oi->sousequipement = $sousequipement;
       $oi->type_panne = $type_panne;
       $oi->destinateur = implode(',', $destinateurs);
       $oi->appel_client = $appel_client ; 
       $oi->priorite = $priorite; 
       $oi->commentaire = $commentaire;
       $oi->etat = $etat;
       $oi->save();

       $notification = new Notification();
       $notification->stat = "unseen";  
       $notification->touser = "Technicien";
       $notification->iduser = $oi->destinateur;
       $notification->content = "l'administrateur a ajouté une intervention pour vous";
       $notification->save();

       return redirect('/di/add')->with("addoi","success"); 

    }

    public function show($id_intervention){
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $di = Ointervention::find($id_intervention);
        $typepannes = Typepanne::all();  
        $users = User::all();
        $equipements = Equipement::all();
        $sousequipements = Sousequipement::all();
        $clients = Client::all();
        return view('dmdinterventions.affiche')->with('di',$di)->with('messages',$messages)->with('notifications',$notifications)->with('typepannes',$typepannes)->with('equipements',$equipements)->with('clients',$clients)->with('users',$users)->with('sousequipements',$sousequipements);
    }
    
    public function change($id_intervention){
        $oi = Ointervention::find($id_intervention);
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $techniciens = User::where('role',"Technicien")->get();
        $clients = Client::all();
        $techniciens = User::where('role',"Technicien")->get();
        $ingenieurs = User::where('role',"Ingenieur")->get();
        $typepannes = Typepanne::all();
        $equipements = Equipement::all();
        $sousequipements = Sousequipement::all();
        return view('dmdinterventions.modifier')->with('oi',$oi)->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('equipements',$equipements)->with('clients',$clients)->with('techniciens',$techniciens)->with('ingenieurs',$ingenieurs)->with('typepannes',$typepannes)->with('sousequipements',$sousequipements);
    }
    public function update(Request $request,$id_intervention){
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $techniciens = User::where('role',"Technicien")->get();
        $ingenieurs = User::where('role',"Ingenieur")->get();
        $document = $request->file('document');
        $destinateurs = $request->input('iduser');
        if ($request->hasFile('document'))
        {
        $documentname = $document->getClientOriginalName();
        //uniqid() is php function to generate uniqid but you can use time() etc.
        $destinationPath = storage_path('app/public');
        $document->move($destinationPath,$documentname);
        //
        $oi = Ointervention::find($id_intervention);
        $oi->numero = $request->input("numero");
        $oi->idmachine = $request->input("machine");
        $oi->sousequipement = $request->input("sousequipement");
        $oi->idclient = $request->input("idclient");
        $oi->type_panne = $request->input("type_panne");
        $oi->destinateur = implode(',', $destinateurs);
        $oi->priorite = $request->input("priorite");
        $oi->commentaire = $request->input("commentaire");  
        $oi->etat = $request->input("etat");
        $oi->document = $document -> getClientOriginalName();
        }
        else 
        {
            $destinationPath['document'] = null;
            $oi = Ointervention::find($id_intervention);
            $oi->numero = $request->input("numero");
            $oi->idmachine = $request->input("machine");
            $oi->sousequipement = $request->input("sousequipement");
            $oi->idclient = $request->input("idclient");
            $oi->type_panne = $request->input("type_panne");
            $oi->destinateur = implode(',', $destinateurs);
            $oi->priorite = $request->input("priorite");
            $oi->commentaire = $request->input("commentaire");  
            $oi->etat = $request->input("etat");
        }
      
        $oi->save();

        return redirect("/ointervention/change/".$oi->id_intervention)->with('addoi',"success");

    }
    public function destroy($id_intervention)
    {
         //
         $oi = Ointervention::find($id_intervention);
         $oi->delete();
         return redirect('/di')->with("addoi","deleted");
         
    }

    public function destroyHistorique($id_intervention)
    {
         //
         $oi = Ointervention::find($id_intervention);
         $oi->delete();
         return redirect('/di/historique')->with("addoi","deleted");
         
    }
    public function ordretravaille($id_intervention){
        $oi = Ointervention::find($id_intervention);
        return view('ointerventions.ordret')->with('oi',$oi); 
    }
  
    public function ordretravailleshow($id_intervention){
        
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $oi = Ointervention::find($id_intervention);
        return view('dmdinterventions.observation')->with('oi',$oi)->with('messages',$messages)->with('notifications',$notifications);

    }
    public function valider($id_intervention,Request $request){
        
        $oi = Ointervention::find($id_intervention);
        $oi->etat = "Terminé";
        $oi->update();
        

           // Lister les administrateurs
           $admins = User::where('role','=','Administrateur')->get();
           
           foreach($admins as $admin ){
               $notification = new Notification();
               $notification->stat = "unseen";
               $notification->touser = "Administrateur";
               $notification->iduser =$admin->id_user;
               $notification->content = "Ordre de travail ".$oi->numero." validé par ".Auth::user()->name; 
               $notification->save();
           }
           
            $notification = new Notification();
            $notification->stat = "unseen";
            $notification->touser = "Technicien";
            $notification->iduser = $oi->destinateur;
            $notification->content = "Ordre de travail ".$oi->numero." validé par ".Auth::user()->name; 
            $notification->save();

        return redirect('/di');

    }
    /*début des interventions par les techniciens*/

    public function addobservationoi(Request $request , $id_intervention){
        $oi = Ointervention::find($id_intervention);
        $numero = $oi->numero;
        $oi->date_intervention = $request->input("date_debut");
        $oi->commentaire = $request->input("commentaire");
        $oi->etat = $request->input("etat");  
        $oi->date_fin_intervention = $request->input("date_fin_intervention");        
        $oi->update();
                //Enregistrer l'activité
        $ac = new Activite();
        $ac->iduser = Auth::user()->id_user;
        $ac->description = "a commencé l'Intervention ".$oi->numero." "."le"." ".$oi->date_intervention;
        $ac->save();

                // Envoyer une notification à l'administrateur
        $admins = User::where('role','=','Administrateur')->get();
        foreach($admins as $admin ){
            $notification = new Notification();
            $notification->stat = "unseen";
            $notification->touser = "Administrateur";
            $notification->iduser =$admin->id_user;
            $notification->content =  $oi->destinateur." "." a démarré l'ordre du travail pour".$numero; 
            $notification->save();
        }

        return redirect('/homet');
        //return view('dmdinterventions.observation');

    }
    //Modifier l'ordre d'intervention 
    public function modordretravail($id_intervention){
        
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $oi = Ointervention::find($id_intervention);
        return view('dmdinterventions.modobservation')->with('oi',$oi)->with('messages',$messages)->with('notifications',$notifications);

    }
    public function modobservationoi(Request $request , $id_intervention){
        $oi = Ointervention::find($id_intervention);
        $numero = $oi->numero;
        $oi->date_intervention = $request->input("date_debut");
        $oi->commentaire = $request->input("commentaire");
        $oi->etat = $request->input("etat");      
        $oi->update();
        $ac = new Activite();
        $ac->iduser = Auth::user()->id_user;
        $ac->description = "Modifier l'Ordre d'Intervention ".$numero;
        $ac->save();
        // Lister les administrateurs
        $admins = User::where('role','=','Administrateur')->get();
      
        foreach($admins as $admin ){
            $notification = new Notification();
            $notification->stat = "unseen";
            $notification->touser = "Administrateur";
            $notification->iduser =$admin->id_user;
            $notification->content = "Le Technicien a Modifié l'Ordre d'Intervention ".$numero; 
            $notification->save();
        }

        return redirect('/homet');
        //return view('dmdinterventions.observation');

    }
    public function ordretravaillempshow($id_mpreventive){
        $equipements = Equipement::all();
        //$mp = Mpreventive::find($id);
        $maintenances = Maintenance::where('idmp',$id_maintenance)->get(); 
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $mp = Mpreventive::find($id_mpreventive);
        $today = date("Y-m-d");
        $maintenance = Maintenance::where('idmp',$mp->id_mpreventive)->where('date_maintenance',$today)->get();
        return view('mpreventives.observation')->with('equipements',$equipements)->with('maintenances',$maintenances)->with('mp',$mp)->with('maintenance',$maintenance)->with('messages',$messages)->with('notifications',$notifications);

    }
    public function historiquempshow($id_mpreventive){
        $equipements = Equipement::all();
        //$mp = Mpreventive::find($id);
        $mp = Mpreventive::find($id_mpreventive);
        $maintenances = Maintenance::where('idmp',$mp->id_mpreventive)->get(); 
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $clients = Client::all();
        $today = date("Y-m-d");
        $maintenance = Maintenance::where('idmp',$mp->id_mpreventive)->where('date_maintenance',$today)->get();
        return view('mpreventives.historique')->with('equipements',$equipements)->with('maintenances',$maintenances)->with('mp',$mp)->with('maintenance',$maintenance)->with('messages',$messages)->with('notifications',$notifications)->with('clients',$clients);

    }
    public function addobservationmp(Request $request , $id_maintenance){
        $m = Maintenance::find($id_maintenance);
        $m->observation = $request->input('observation');
        $m->etat = "En attente de validation";
        $m->update();
        $mp = Mpreventive::find($m->idmp);
        $mp->date_prochaine = Carbon::parse($mp->date_prochaine)->addDays($mp->intervalle);
        $mp->save();
        $numero = $mp->numero;
        
        $ac = new Activite();
        $ac->iduser = Auth::user()->id_user;
        $ac->description = "valider la maintenance preventive ".$numero;
        $ac->save();
        $admins = User::where('role','=','Administrateur')->get();
    
        foreach($admins as $admin ){
            $notification = new Notification();
            $notification->stat = "unseen";
            $notification->touser = "Administrateur";
            $notification->iduser =$admin->id_user;
            $notification->content = "le technicien a démaré la maintenance preventive".$numero; 
            $notification->save();
        }
        return redirect('/homet');
     
    }

    public function historiqueoi(){
        $alloi = Ointervention::where('etat',"Terminé")->get();
        $equipements = Equipement::all();
        $typepannes = Typepanne::all();
        $users = User::all();
        $clients = Client::all(); 
        $techniciens = User::where('role',"Technicien")->get();
        $ingenieurs = User::where('role',"Ingenieur")->get();
        $ointerventions = Ointervention::paginate(10);
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        return view('dmdinterventions.historique')->with('alloi',$alloi)->with('equipements',$equipements)->with('messages',$messages)->with('notifications',$notifications)->with('clients',$clients)->with('users',$users)->with('techniciens',$techniciens)->with('ointerventions',$ointerventions)->with('ingenieurs',$ingenieurs)->with('typepannes',$typepannes);
    
    }
    public function find(Request $request){
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->i_userd)->where('stat',"unseen")->get();
        $users = User::all();
        $typepannes = Typepanne::all();
        $clients = Client::all();
        $equipements = Equipement::all();
        $query = $request->input('query');
        $ointerventions = Ointervention::where("numero",'like','%'.$query.'%')
                                        ->orwhere('type_panne', 'like', '%'.$query.'%')
                                        ->orwhere('destinateur', 'like', '%'.$query.'%')
                                        ->orwhere('idclient', 'like', '%'.$query.'%')
                                        ->orwhere('priorite', 'like', '%'.$query.'%')
                                        ->orwhere('etat', 'like', '%'.$query.'%')
                                        ->orwhere('commentaire', 'like', '%'.$query.'%')
                                        ->orwhere('idmachine', 'like', '%'.$query.'%')->get();
        return view('dmdinterventions.search')->with('messages',$messages)->with('notifications',$notifications)->with('ointerventions',$ointerventions)->with('equipements',$equipements)->with('clients',$clients)->with('users',$users)->with('typepannes',$typepannes);

    }

}
