<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Message;
use App\Activite; 
use App\Department;
use App\Notification; 
use Illuminate\Http\Request;


class DepartmentsController extends Controller
{
    //
    public function index(){ 
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $departments = Department::all();
        return view('departments.index')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('departments',$departments);
    }
    public function create(){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        return view('departments.ajout')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
    }
    public function add(request $request){
        
        $department = new Department();
        $department->name=$request->input('nom');
        $department->description=$request->input('description');
        $department->save();
      
        return redirect("/department/create")->with('adddepartment',"success");
        
    }
    public function change($id_departement){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $department = Department::find($id_departement);
        return view('departments.mod')->with('department',$department)->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
    }
    public function update(Request $request,$id_departement){
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $department = Department::find($id_departement);
        $department->name = $request->input('nom') ;
        $department->description = $request->input('description');
        $department->save();
        return redirect("/department/change/".$department->id_departement)->with('adddepartment',"success");

    }
    public function filter(Request $request)
    {
         //
         $users = User::all();
         $messages = Message::where('iddestination',Auth::user()->i_user)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
         $departments = Department::where("name",'like','%'.$request->input("searchdepartment").'%')->get();
         return view('departments.index')->with('messages',$messages)->with('users',$users)->with('departments',$departments)->with('messages',$messages)->with('notifications',$notifications);
    }
    public function destroy($id_departement)
    {
         //
         
         $department = Department::find($id_departement);
         $department->delete();
         return redirect('/departments')->with('adddepartment',"deleted");
         
    }
   
    public function search(Request $request)
    {   $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $query = $request->input('query');
        $departments = Department::where('name', 'like', '%'.$query.'%')->get();
        $departments = Department::where('description', 'like', '%'.$query.'%')->get();
        
        return view('departments.search', compact('departments'))->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('departments',$departments);
    }
}
