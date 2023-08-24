<?php

namespace App\Http\Controllers;

use App\Equipement;
use App\Maintenance;
use App\Mpreventive;
use App\Ointervention;

use Illuminate\Http\Request;

class MaintenancesController extends Controller
{   
    //
    public function show($id_maintenance){
        $equipements = Equipement::all();
        //$mp = Mpreventive::find($id);
        $maintenances = Maintenance::where('idmp',$id_maintenance)->get(); 
        $m = Maintenance::find($idmaintenance);
        $mp = Mpreventive::find($m->idmp);
        $oi = Ointervention::find($m->idmp);
        return view('maintenances.affiche')->with('m',$m)->with('mp',$mp);

    }
}
