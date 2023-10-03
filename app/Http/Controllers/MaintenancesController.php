<?php

namespace App\Http\Controllers;
use Auth;
use App\Equipement;   
use App\Maintenance;
use App\Mpreventive;
use App\Ointervention;
use App\Message;
use App\Notification;

use Illuminate\Http\Request;

class MaintenancesController extends Controller
{   
    //
    public function show($id_maintenance){
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $equipements = Equipement::all();
        //$mp = Mpreventive::find($id);
        $maintenances = Maintenance::where('idmp',$id_maintenance)->get(); 
        $m = Maintenance::find($id_maintenance);
        $mp = Mpreventive::find($m->idmp);
        $oi = Ointervention::find($m->idmp);
        return view('maintenances.affiche')->with('m',$m)->with('mp',$mp)->with('messages', $messages)->with('notifications',$notifications );

    }
}
