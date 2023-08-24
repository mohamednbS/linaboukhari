<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\User;
use App\Message;
use App\Activite;
use App\Client; 
use App\Equipement;
use App\Notification;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClientsController extends Controller
{
    //
    public function index(){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $clients = Client::all();
        ConfirmDelete($title, $text);
        $equipements = $client->equipements ?? null ;
       
        return view('clients.index')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('clients',$clients)->with('equipements',$equipements);
    }
    public function create(){
        $users = User::all();
       
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        return view('clients.ajout')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
    }
    public function add(request $request){
        $clientname = $request->input('clientname');
        $adresse = $request->input('adresse');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
      
      /*dd($request->all());*/  
    
        $client = new Client();
        $client->clientname = $clientname;
        $client->adresse = $adresse;
        $client->email = $email;
        $client->mobile = $mobile;
       
      
        $client->save();
    
        return redirect('/client/create')->with("addclient","success");
        
    }

         /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function show($id_client)
    {
        //
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $client = Client::find($id_client);
        
        $equipement = Equipement::all();
     
        $users = User::all();
        
        $equipements = $client->equipements; // Filtrer les sous-équipements par id de l'équipement
        return view('clients.equipementclient')->with('users',$users)->with('client',$client)->with('equipement',$equipement)->with('equipements',$equipements)->with('messages',$messages)->with('notifications',$notifications); 
    }
    public function change($id_client){
        $users = User::all();
        $equipements = Equipement::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $client = Client::find($id_client);
        return view('clients.mod')->with('client',$client)->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('equipements',$equipements);
    }
    public function update(Request $request,$id_client){
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $client = Client::find($id_client);
        $client->clientname =$request->input('clientname') ;
        $client->adresse=$request->input('adresse');
        $client->email=$request->input('email');
        $client->mobile=$request->input('mobile');
     
        
        $client->save();
        return redirect("/client/change/".$client->id_client)->with('addclient',"success");

    }
    public function filter(Request $request)
    {
         //
         $users = User::all();
         $equipements = Equipement::all(); 
         $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
         $query = $request->input('query');
         $clients = Client::where('name', 'like', '%'.$query.'%')
                            ->orwhere('adresse', 'like', '%'.$query.'%')
                            ->orwhere('email', 'like', '%'.$query.'%')
                            ->orwhere('mobile', 'like', '%'.$query.'%')->get();
       
  
         return view('clients.search', compact('clients'))->with('messages',$messages)->with('users',$users)->with('clients',$clients)->with('messages',$messages)->with('notifications',$notifications)->with('equipements',$equipements);
    }
    public function destroy($id_client)
    {
         //
         $client = Client::find($id_client);
        
        
         $client->delete();
         return redirect('/clients')->with('addclient',"deleted");
         
    }


   public function search(Request $request)
    {   $users = User::all();
        $equipements = Equipement::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $query = $request->input('query');
        $clients = Client::where('clientname', 'like', '%'.$query.'%')->get();
        $clients = Client::where('adresse', 'like', '%'.$query.'%')->get();
        $clients = Client::where('distance', 'like', '%'.$query.'%')->get();
        $clients = Client::where('email', 'like', '%'.$query.'%')->get();
        $clients = Client::where('mobile', 'like', '%'.$query.'%')->get();
        $clients = Client::where('idmachine', 'like', '%'.$query.'%')->get();
        return view('clients.search', compact('clients'))->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('clients',$clients)->with('equipements',$equipements);
    }


}