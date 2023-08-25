<?php

namespace App\Http\Controllers;
use Auth;
use File;
use App\User;
use App\Message;
use App\Activite;
use App\Equipement;
use App\Department; 
use App\Accessoire; 
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AccessoiresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //
         $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
         $accessoires = Accessoire::all();
         $users = User::all();
         return view('accessoires.index')->with('users',$users)->with('accessoires',$accessoires)->with('messages',$messages)->with('notifications',$notifications);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
         //
         $users = User::all();
         $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
         $accessoires = Accessoire::where("designation",'like','%'.$request->input("searchaccessoire").'%')->get();
         return view('accessoires.index')->with('users',$users)->with('accessoires',$accessoires)->with('messages',$messages)->with('notifications',$notifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $equipement_id_equipement) 
    {
        //
        $equipement= Equipement::find($equipement_id_equipement);
<<<<<<< HEAD
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
=======
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
        $users = User::all();
        return view('accessoires.ajout')->with('equipement',$equipement)->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */ 
    /*modification*/
    public function store(Request $request, $equipement)
{     
   // dd($equipement); 
    $accessoire = new Accessoire();
    $accessoire->identifiant=$request->input("identifiant");
    $accessoire->designation=$request->input("designation");
    $accessoire->date_achat=$request->input("date_achat");
    $accessoire->date_arrive=$request->input("date_arrive");

    $accessoire->equipement_id_equipement=$equipement;
    $accessoire->save();

    return redirect()->back()->with("addaccessoire","success");
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_equipement)
    {
        //
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
        $departments = Department::all();
        $equipement = Equipement::find($id_equipement);
        $users = User::all();
        return view('equipements.equipement')->with('users',$users)->with('accessoire',$accessoire)->with('equipements',$equipements)->with('messages',$messages)->with('notifications',$notifications); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function edit($id_accessoire)
    {
        //
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $accessoire = Accessoire::find($id_accessoire); 
        return view('accessoires.modifier')->with('accessoire',$accessoire)->with('messages',$messages)->with('notifications',$notifications); 
=======
    public function edit($id, $equipement_id)
    {
        //
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
        $sousequipement = SousEquipements::find($id); 
        $equipement= Equipement::find($equipement_id);
        return view('sousequipements.modifier')->with('sousequipement',$sousequipement)->with('messages',$messages)->with('notifications',$notifications); 
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Request $request,$id_accessoire)
=======
    public function update(Request $request, $id,$equipement)
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
    {
        //
      
     
<<<<<<< HEAD
        $accessoire = Accessoire::find($id_accessoire);
        $accessoire->identifiant=$request->input("identifiant");
        $accessoire->designation=$request->input("designation");
        $accessoire->date_achat=$request->input("date_achat");
        $accessoire->date_arrive=$request->input("date_arrive");

        $accessoire -> update();

        return redirect()->back()->with("addaccessoire","success");
=======
        $sousequipement = SousEquipements::find($id);
        $sousequipement->identifiant=$request->input("identifiant");
        $sousequipement->designation=$request->input("designation");
        $sousequipement->date_achat=$request->input("date_achat");
        $sousequipement->date_arrive=$request->input("date_arrive");

        $sousequipement->equipement_id=$equipement;
        
        $sousequipement->update();

        $activite = new Activite();
        $activite->iduser = Auth::user()->id;
        $activite->description = "modifier le sousequipement ".$request->input("designation");
        $activite->save();
        return redirect("/equipement/".$equipement->id);
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id,$equipement)
    {
        //
        $sousequipement = SousEquipements::find($id);
        $sousequipement->delete();
        return redirect("/equipement/".$equipement->id);
    }  

} 

