<?php

namespace App\Http\Controllers;

use Auth;
use App\user;
use App\Message;
use App\Maintenance;  
use App\Mpreventive;
use App\Notification;   
use App\Ointervention;
use App\Client;
use App\Equipement;
use Illuminate\Http\Request;

class PlanmaintenancesController extends Controller
{
    //
    public function index(){
        $users = User::all();
<<<<<<< HEAD
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
=======
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
        $mpreventives = Mpreventive::all();
        $maintenances = Maintenance::all(); 
        $clients = Client::all(); 
        $equipements = Equipement::all(); 
        $ointerventions = Ointervention::all();
        return view('planmaintenance.index')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('ointerventions',$ointerventions)->with('maintenances',$maintenances)->with('mpreventives',$mpreventives)->with('clients',$clients)->with('equipements',$equipements);
    }
}