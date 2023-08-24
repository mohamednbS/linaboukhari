<?php

namespace App\Http\Controllers;
use App\Mail\AlerteContrat;
use Auth;
use App\User;
use App\Contrat;  
use App\Message;
use App\Equipement;
use App\Sousequipement;
use App\Accessoire;
use App\Client;
use App\Notification;
use Illuminate\Http\Request;
use Mail;

class ContratsController extends Controller
{
    //
    public function index(){
        $users = User::all(); 
        $clients = Client::all();
        $equipements = Equipement::all();
        $sousequipements = Sousequipement::all();
        $accessoires = Accessoire::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $contrats =  Contrat::all();
        $today = date('Y-m-d');
        return view('contrats.index')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('contrats',$contrats)->with('equipements',$equipements)->with('sousequipements',$sousequipements)->with('accessoires',$accessoires)->with('clients',$clients);
    }
    public function filter(Request $request)
    {
         $clients = Client::all();
         $equipements = Equipement::all();
         $sousequipements = Souquipement::all();
         $accessoires = Accessoire::all();
         $users = User::all();
         $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
         $contrats =  Contrat::where("name",'like','%'.$request->input("searchcontrat").'%')->get();
         return view('contrats.index')->with('users',$users)->with('contrats',$contrats)->with('messages',$messages)->with('equipements',$equipements)->with('clients',$clients)-with('sousequipements',$sousequipements)-with('accessoires',$accessoires)->with('notifications',$notifications);
    }
    public function add(Request $request){
        $contrat = new Contrat();
        $contrat->client_name = $request->input('client_name');
        $contrat->equipement_name = $request->input('equipement_name');
        $contrat->souseq_name = $request->input('souseq_name');
        $contrat->accessoire_name = $request->input('accessoire_name');
        $contrat->date_debut= $request->input('date_debut');
        $contrat->date_fin = $request->input('date_fin');
        $contrat->type_contrat = $request->input('type_contrat');
        $contrat->note = $request->input('note');

        $contrat->save();
        return redirect('/cm/create')->with("addcontrat","success"); 
    }
    public function create(){
        $users = User::all();
        $clients = Client::all();
        $equipements = Equipement::all();
        $sousequipements = Sousequipement::all();
        $accessoires = Accessoire::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $ordres = array();
       
        return view('contrats.ajout')->with('messages',$messages)->with('users',$users)->with('equipements',$equipements)->with('sousequipements',$sousequipements)->with('accessoires',$accessoires)->with('clients',$clients)->with('notifications',$notifications);
    }

            /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function show($id_contrat)
    {
        //
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $contrat = Contrat::find($id_contrat);
        $equipements = Equipement::all();
        $clients = Client::all();
        $sousequipements = Equipement::all();
        $users = User::all();
        $accessoires = Accessoire::all();
        $mailer= new AlerteContrat();
        Mail::to('gmao5657@gmail.com')->send(new AlerteContrat());
        /* dd($mailer->build());*/ 
        return view('contrats.contrat')->with('users',$users)->with('contrat',$contrat)->with('equipements',$equipements)->with('sousequipements',$sousequipements)->with('accessoires',$accessoires)->with('clients',$clients)->with('messages',$messages)->with('notifications',$notifications); 
    }

    public function modification($id_contrat)
    {
         //
         $ordres = array();
     
         $users = User::all();
         $clients = Client::all(); 
         $equipements = Equipement::all();
         $sousequipements = Sousequipement::all();
         $accessoires = Accessoire::all();
         $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
         $contrat=  Contrat::find($id_contrat);
         return view('contrats.modification')->with('users',$users)->with('contrat',$contrat)->with('messages',$messages)->with('equipements',$equipements)->with('sousequipements', $sousequipements)->with('accessoires', $accessoires)->with('clients',$clients)->with('notifications',$notifications);
    }

    
    public function edit(Request $request,$id_contrat){
        $contrat = Contrat::find($id_contrat);
        $contrat->client_name = $request->input('client_name');
        $contrat->equipement_name = $request->input('equipement_name');
        $contrat->souseq_name = $request->input('souseq_name');
        $contrat->accessoire_name = $request->input('accessoire_name');
        $contrat->date_debut= $request->input('date_debut');
        $contrat->date_fin = $request->input('date_fin');
        $contrat->type_contrat = $request->input('type_contrat');
        $contrat->note = $request->input('note');
        $contrat->update();
        return redirect("/cm/mod/".$contrat->id_contrat)->with('addcontrat',"success");
    }
    public function destroy($id_contrat){
        $contrat = Contrat::find($id_contrat);
        $contrat->delete();
        return redirect('/cm')->with("addcontrat","deleted");
    }
    public function recherche(Request $request)  
    {
         //
       
         $clients = Client::all();
         $equipements = Equipement::all();
         $users = User::all();
         $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
         $query = $request->input('query');
         $contrats = Contrat::where('name', 'like', '%'.$query.'%')
                            ->orwhere('date_debut', 'like', '%'.$query.'%')
                            ->orwhere('date_fin', 'like', '%'.$query.'%')
                            ->orwhere('idclient', 'like', '%'.$query.'%')
                            ->orwhere('note', 'like', '%'.$query.'%')
                            ->orwhere('idequipement', 'like', '%'.$query.'%')->get();
         return view('contrats.search')->with('users',$users)->with('contrats',$contrats)->with('messages',$messages)->with('equipements',$equipements)->with('clients',$clients)->with('notifications',$notifications);
    }

}
