<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Message;
use App\Activite; 
use App\Notification; 
use App\Soustraitant;

use Illuminate\Http\Request;

class SoustraitantsController extends Controller
{
    //
    public function index(){ 
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $soustraitant = Soustraitant::all();
        return view('soustraitants.index')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('soustraitant',$soustraitant);
    }
    public function create(){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        return view('soustraitants.ajout')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
    }
    public function add(request $request){
        
        $soustraitant = new Soustraitant();
        $soustraitant->name=$request->input('name');
        $soustraitant->phone=$request->input('phone');
        $soustraitant->fax=$request->input('fax');
        $soustraitant->email=$request->input('email');
        $soustraitant->save();
      
        return redirect('/soustraitant/create')->with('addsoustraitant',"success");
        
    }

    public function change($id_soustraitant){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $soustraitant = Soustraitant::find($id_soustraitant);
        return view('soustraitants.modifier')->with('soustraitant',$soustraitant)->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
    }
    public function update(Request $request,$id_soustraitant){
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $soustraitant =  Soustraitant::find($id_soustraitant);
        $soustraitant->name = $request->input('name') ;
        $soustraitant->phone = $request->input('phone');
        $soustraitant->fax = $request->input('fax');
        $soustraitant->email = $request->input('email');
        $soustraitant->save();
        return redirect('/soustraitants')->with('addsoustraitant',"success");

    }
    public function destroy($id_soustraitant)
    {
         //
         $soustraitant = Soustraitant::find($id_soustraitant);
         $soustraitant->delete();
         return redirect('/soustraitants')->with("addsoustraitant","deleted");
         
    }
}
