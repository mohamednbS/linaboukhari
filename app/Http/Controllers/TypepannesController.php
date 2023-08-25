<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Message;
use App\Activite; 
use App\Notification; 
use App\Typepanne;

use Illuminate\Http\Request;

class TypepannesController extends Controller
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
        $typepanne = Typepanne::all();
        return view('typepannes.index')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('typepanne',$typepanne);
    }
    public function create(){
        $users = User::all();
<<<<<<< HEAD
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
=======
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
        return view('typepannes.ajout')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
    }
    public function add(request $request){
        
        $typepanne = new Typepanne();
        $typepanne->name=$request->input('name');
        $typepanne->description=$request->input('description');
        $typepanne->save();
      
        return redirect('/typepanne/create')->with('addpanne',"success");
        
    }
    public function change($id_departement){
        $users = User::all();
<<<<<<< HEAD
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
=======
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
        $department = Department::find($id_departement);
        return view('departments.mod')->with('department',$department)->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
    }
    public function update(Request $request,$id_departement){
<<<<<<< HEAD
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
=======
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
>>>>>>> e121b86aa98783be36c6b4fe44980a592ea45271
        $department = Department::find($id_departement);
        $department->name = $request->input('nom') ;
        $department->description = $request->input('description');
        $department->save();
        return redirect('/departments');

    }
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
         $departments = Department::where("name",'like','%'.$request->input("searchdepartment").'%')->get();
         return view('departments.index')->with('messages',$messages)->with('users',$users)->with('departments',$departments)->with('messages',$messages)->with('notifications',$notifications);
    }
    public function destroy($id_typepanne)
    {
         //
         
         $typepanne = Typepanne::find($id_typepanne);
         $typepanne->delete();
         return redirect('/typepannes')->with('addpanne',"deleted");
         
    }
   

}

   
   

