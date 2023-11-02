<?php

namespace App\Http\Controllers;
use App\User;
use File;
use App\Message;
use Carbon\Carbon;
use App\Equipement;
use App\Maintenance;
use App\Client;
use App\Mpreventive;
use App\Notification; 
use App\Soustraitant; 
use Illuminate\Http\Request;
use Auth;

class MpreventivesController extends Controller
{
    //
    public function index(){
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $users = User::all();
        $equipements = Equipement::all();
        $dateprochaine = date("Y-m-d");
        $today = date("Y-m-d");
        $techniciens = User::where('role',"Technicien")->get();
        $clients = Client::all();
        $mpreventives = Mpreventive::where('etat',"!=","Terminé")->get();
        $mpreventives = Mpreventive::paginate(5);
        return view('mpreventives.index')->with('messages',$messages)->with('notifications',$notifications)->with('mpreventives',$mpreventives)->with('equipements',$equipements)->with('clients',$clients)->with('techniciens',$techniciens)->with('users',$users)->with('dateprochaine',$dateprochaine)->with('today',$today);
    }
    public function filter(Request $request){
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
        $users = User::all();
        $equipements = Equipement::all();
        $techniciens = User::where('role',"Technicien")->get();
        $clients =Client::all();
        $mpreventives = Mpreventive::where("numero",'like','%'.$request->input("searchmp").'%')->get();
        return view('mpreventives.index')->with('messages',$messages)->with('notifications',$notifications)->with('mpreventives',$mpreventives)->with('equipements',$equipements)->with('clients',$clients)->with('techniciens',$techniciens)->with('users',$users);
    }
    public function create(){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $equipements = Equipement::all();
        $clients = Client::all();
        $soustraitants = Soustraitant::all();
        $techniciens = User::where('role',"Technicien")->get();
        $ingenieurs = User::where('role',"Ingenieur")->get();
         return view('mpreventives.ajout')->with('messages',$messages)->with('notifications',$notifications)->with('equipements',$equipements)->with('clients',$clients)->with('techniciens',$techniciens)->with('users',$users)->with('ingenieurs',$ingenieurs)->with('soustraitants',$soustraitants);
     }
    public function store(Request $request){
        $intervalle = $request->input("intervalle");
        $datedebut = $request->input("date_debut"); 
        $datefin = $request->input("date_fin");
        $numero= $request->input("numero");
        $status = $request->input("status");
        $equipement_name = $request->input("equipement_name");
        $client_name = $request->input("client_name");
        $umesure = $request->input("unite_mesure");
        $executeurs = $request->input("executeur");
        $soustraitant = $request->input("soustraitant");
        $date_execution = $request->input("date_execution");
        $observation = $request->input("observation");
        $etat = $request->input("etat");

        if ( $request->input("unite_mesure") == "Jours"){
            $dateprochaine = Carbon::parse($datedebut)->addDays($intervalle);
        
        }else if ($request->input("unite_mesure") == "Mois"){
            $dateprochaine = Carbon::parse($datedebut)->addMonths($intervalle);
        }
        $mp = new Mpreventive();
        $mp->numero = $numero;
        $mp->status = $status;
        $mp->equipement_name  = $equipement_name ;
        $mp->client_name = $client_name;
        $mp->umesure = $umesure;
        $mp->executeur = implode(',', $executeurs);
        $mp->soustraitant = $soustraitant;
        $mp->intervalle = $intervalle;
        $mp->date_debut = $datedebut;
        $mp->date_fin = $datefin;
        $mp->date_execution = $date_execution;
        $mp->observation = $observation;
        $mp->date_prochaine = $dateprochaine ;
        $mp->etat = $etat;
        
        $mp->save();

        while( $dateprochaine <= $datefin ){
            $maintenance = new Maintenance();
            $maintenance->idmp = $mp->id_mpreventive ;
            $maintenance->date_maintenance = $dateprochaine;
      
            $maintenance->save();
            
            if ( $request->input("unite_mesure") == "Jours"){
                $dateprochaine =Carbon::parse($dateprochaine)->addDays($intervalle);
            
            }else if ($request->input("unite_mesure") == "Mois"){
                $dateprochaine = Carbon::parse($dateprochaine)->addMonths($intervalle);
            }
            

        }
        $notification = new Notification();
        $notification->stat = "unseen";  
        $notification->touser = "Technicien";
        $notification->iduser = $request->executeur = implode(',', $executeurs);
        $notification->content = "l'administrateur a ajouté une maintenance préventive pour vous";
        $notification->save();
        return redirect('/mp/add')->with("addmp","success");
 
     }
  
 public function show($id_mpreventive){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $equipements = Equipement::all();
        $clients = Client::all();
        $mp = Mpreventive::find($id_mpreventive);   
        $maintenances = Maintenance::where('idmp',$mp->id_mpreventive)->get(); 
        return view('mpreventives.affiche')->with('users',$users)->with('mp',$mp)->with('messages',$messages)->with('notifications',$notifications)->with('maintenances',$maintenances)->with('equipements',$equipements)->with('clients',$clients);
    }

    public function change($id_mpreventive){
        $mp = Mpreventive::find($id_mpreventive);
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $techniciens = User::where('role',"Technicien")->get();
        $ingenieurs = User::where('role',"Ingenieur")->get();
        $clients = Client::all();
        $equipements = Equipement::all();
        return view('mpreventives.modifier')->with('mp',$mp)->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('equipements',$equipements)->with('clients',$clients)->with('techniciens',$techniciens)->with('ingenieurs',$ingenieurs);
    }
    public function update(Request $request,$id_mpreventive){
        $executeurs = $request->input("executeur");
        $intervalle = $request->input("intervalle");
        $datedebut = $request->input("date_debut");
        $datefin = $request->input("date_fin");
        if ( $request->input("unite_mesure") == "Jours"){
            $dateprochaine = Carbon::parse($datedebut)->addDays($intervalle);
        
        }else if ($request->input("unite_mesure") == "Mois"){
            $dateprochaine = Carbon::parse($datedebut)->addMonths($intervalle);
        }
        $document = $request->file('document');
        if ($request->hasFile('document'))
        {
        $documentname = $document->getClientOriginalName();
        //uniqid() is php function to generate uniqid but you can use time() etc.
        $destinationPath = storage_path('app/public');
        $document->move($destinationPath,$documentname);
        
        $mp = Mpreventive::find($id_mpreventive);
        $mp->numero = $request->input("numero");
        $mp->status = $request->input("status");
        $mp->idmachine = $request->input("machine");
        $numserie = $request->input("numserie");
        $mp->idclient = $request->input("client");
        $mp->umesure = $request->input("unite_mesure");   
        $mp->executeur = implode(',', $executeurs);
        $mp->intervalle = $request->input("intervalle");
        $mp->date_debut = $request->input("date_debut");
        $mp->date_fin = $request->input("date_fin");
        $mp->date_execution = $request->input("date_execution");
        $mp->observation = $request->input("observation");
        $mp->date_prochaine = $dateprochaine ;
        $mp->etat = $request->input("etat");
        $mp->document = $document -> getClientOriginalName();
        }
        else 
        {
            $destinationPath['document'] = null;
            $mp = Mpreventive::find($id_mpreventive);
            $mp->numero = $request->input("numero");
            $mp->status = $request->input("status");
            $mp->idmachine = $request->input("machine");
            $mp->numserie = $request->input("numserie");
            $mp->idclient = $request->input("client");
            $mp->umesure = $request->input("unite_mesure");   
            $mp->executeur = implode(',', $executeurs);
            $mp->intervalle = $request->input("intervalle");
            $mp->date_debut = $request->input("date_debut");
            $mp->date_fin = $request->input("date_fin");
            $mp->date_execution = $request->input("date_execution");
            $mp->observation = $request->input("observation");
            $mp->date_prochaine = $dateprochaine ;
            $mp->etat = $request->input("etat");
        }
        
        $mp->save();

        while( $dateprochaine <= $datefin ){
            $maintenance = new Maintenance();
            $maintenance->idmp = $mp->id_mpreventive ;
            $maintenance->date_maintenance = $dateprochaine;
         
            $maintenance->save();
            $request->input("unite_mesure") == "Mois";
                $dateprochaine = Carbon::parse($dateprochaine)->addMonths($intervalle);

        }
     
        return redirect("/mpreventive/change/".$mp->id_mpreventive)->with('addmp',"success");
 
     }
    public function destroy($id_mpreventive)
    {
         //
         $mp = Mpreventive::find($id_mpreventive);
         $mp->delete();
         return redirect('/mp')->with('addmp',"deleted");
          
    }
    public function historiqueMp(){
        $allmp = Mpreventive::where('etat',"Terminé")->get();
        $equipements = Equipement::all();
        $users = User::all();
        $clients = Client::all();
        $techniciens = User::where('role',"Technicien")->get();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        return view('mpreventives.historiqueMp')->with('allmp',$allmp)->with('equipements',$equipements)->with('messages',$messages)->with('notifications',$notifications)->with('clients',$clients)->with('users',$users)->with('techniciens',$techniciens);
    
    }
      
    public function search_mp(Request $request)
    {   $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $techniciens = User::where('role',"Technicien")->get();
        $clients = Client::all();
        $equipements = Equipement::all();
        $query = $request->input('query');
        $mpreventives = Mpreventive::where('numero', 'like', '%'.$query.'%')
                          ->orwhere('status', 'like', '%'.$query.'%')
                          ->orwhere('umesure', 'like', '%'.$query.'%')
                          ->orwhere('idmachine', 'like', '%'.$query.'%')
                          ->orwhere('idclient', 'like', '%'.$query.'%')
                          ->orwhere('executeur', 'like', '%'.$query.'%')
                          ->orwhere('intervalle', 'like', '%'.$query.'%')
                          ->orwhere('date_debut', 'like', '%'.$query.'%')
                          ->orwhere('date_fin', 'like', '%'.$query.'%')
                          ->orwhere('etat', 'like', '%'.$query.'%')
                          ->orwhere('observation', 'like', '%'.$query.'%')->get();

        return view('mpreventives.search')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('mpreventives',$mpreventives)->with('equipements',$equipements)->with('clients',$clients)->with('techniciens',$techniciens);
    }
   

}
