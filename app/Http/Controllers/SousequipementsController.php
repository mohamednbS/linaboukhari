<?php

namespace App\Http\Controllers;
use Auth;
use File;
use App\User;
use App\Message;
use App\Activite;
use App\Equipement;
use App\Department; 
use App\Sousequipement; 
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class SousequipementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //
<<<<<<< HEAD
         $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
=======
         $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
         $sousequipements = Sousequipement::all();
         $users = User::all();
         return view('sousequipements.index')->with('users',$users)->with('sousequipements',$sousequipements)->with('messages',$messages)->with('notifications',$notifications);
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
<<<<<<< HEAD
         $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
=======
         $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
         $sousequipements = Sousequipement::where("name",'like','%'.$request->input("searchequipement").'%')->get();
         return view('sousequipements.index')->with('users',$users)->with('sousequipements',$sousequipements)->with('messages',$messages)->with('notifications',$notifications);
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
        return view('sousequipements.ajout')->with('equipement',$equipement)->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
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
    $sousequipement = new Sousequipement();
    $sousequipement->identifiant=$request->input("identifiant");
    $sousequipement->designation=$request->input("designation");
    $sousequipement->date_achat=$request->input("date_achat");
    $sousequipement->date_arrive=$request->input("date_arrive");

    $sousequipement->equipement_id_equipement=$equipement;
    $sousequipement->save();


    return redirect()->back()->with("addsousequipement","success");
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
<<<<<<< HEAD
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
=======
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
        $departments = Department::all();
        $equipement = Equipement::find($id_equipement);
        $users = User::all();
        return view('equipements.equipement')->with('users',$users)->with('sousequipement',$sousequipement)->with('equipements',$equipements)->with('messages',$messages)->with('notifications',$notifications); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_sousequipement)
    {
        //
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $sousequipement = Sousequipement::find($id_sousequipement); 
<<<<<<< HEAD
        return view('sousequipements.modifier')->with('sousequipement',$sousequipement)->with('messages',$messages)->with('notifications',$notifications);
=======
        $equipement= Equipement::all(); 
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
    public function update(Request $request, $id_sousequipement)
    {
        //
      
      
        $sousequipement = Sousequipement::find($id_sousequipement);
        $sousequipement->identifiant=$request->input("identifiant");
        $sousequipement->designation=$request->input("designation");
        $sousequipement->date_achat=$request->input("date_achat");
        $sousequipement->date_arrive=$request->input("date_arrive");

<<<<<<< HEAD
       
=======
        $sousequipement->equipement_id_equipement=$equipement;
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271

        
        $sousequipement->update();
        

<<<<<<< HEAD
        return redirect()->back()->with("addsousequipement","success");
=======
        return redirect("/equipement/".$equipement->id_equipement);
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id_sousequipement)
    {
        //
        $sousequipement = Sousequipement::find($id_sousequipement);
        $sousequipement->delete();
        return redirect()->back();
    }  

} 
