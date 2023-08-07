<?php

namespace App\Http\Controllers;
use Auth;
use File;

use App\User;
use App\Message;
use App\Activite;
use App\Department;
use App\Modalite;
use App\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $departments = Department::all();
        $modalites = Modalite::all();
        $users = User::where( 'email',"!=", Auth::user()->email )->get();
        return view('users.index')->with('users',$users)->with('departments',$departments)->with('modalites',$modalites)->with('messages',$messages)->with('notifications',$notifications);
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        //
        $search = "resutat";
        $searchuser = $request->input('searchuser');
        $users = User::where( 'name',"like", '%'.$searchuser.'%' )->get();
        if (count($users) > 0 ){
            $search = NULL;
        }

        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $departments = Department::all();
        //$users = User::where( 'email',"!=", Auth::user()->email )->get();
        return view('users.index')->with('users',$users)->with('search', $search )->with('searchuser', $searchuser )->with('messages', $messages )->with('notifications', $notifications)->with('departments', $departments );
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $departments = Department::all();
        $modalites = Modalite::all();
        $users = User::all();
        return view('users.ajout')->with('departments',$departments)->with('users',$users)->with('modalites',$modalites)->with('messages',$messages)->with('notifications',$notifications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'usermat' => 'required',
            'usermail' => 'required',
            'userpw' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'modalité' => 'required', 
            'iddep' => 'required', 
            
        ]);
            
        
        //
        $user = new User();
        $user->name = $request->input("username") ;
        $user->matricule = $request->input("usermat") ;
        $user->email = $request->input("usermail");
        $user->password = Hash::make($request->input("userpw"));
        $user->phone =  $request->input("phone");
        $user->role =  $request->input("role");
        if ($request->input("iddep") != ""){
            $user->iddep =  $request->input("iddep");
        }
        $user->modalité =  $request->input("modalité");   
        $user->save();

        return redirect("/user/add")->with('adduser',"success");  
    }
    public function modprofile(Request $request){
      
        
        $user = User::find(Auth::user()->id_user);
        $user->name = $request->input("username") ;
        $user->matricule = $request->input("usermat") ;
        $user->email = $request->input("usermail");

        if ( $user->password != $request->input("userpw") ){
            $user->password = Hash::make($request->input("userpw"));
        }
        $user->iddep =  $request->input("iddep");
        $user->description =  $request->input("description");
        
        $user->phone =  $request->input("phone");
        $avatar = $request->file('avatar');
        if ($avatar != NULL){
            $avatarname = uniqid().".".File::extension($avatar->getClientOriginalName());
            //uniqid() is php function to generate uniqid but you can use time() etc.
            $destinationPath = 'uploads/profile';
            $avatar->move($destinationPath,$avatarname);
            $user->avatar = $avatarname;
        }
        $user->update();
    
        return redirect("/profile")->with('adduser',"success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        //
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $user = User::find($id_user);
        $departments = Department::all();
        $users = User::all();
        return view('users.modif')->with('departments',$departments)->with('user',$user)->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
    }
    public function profile(){
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $activities = Activite::where('iduser',Auth::user()->id)->get();
        $users = User::all();
        return view('users.profile')->with('users',$users)->with('activities',$activities)->with('messages',$messages)->with('notifications',$notifications);
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_user)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        //
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $user =User::find($id_user);
        $user->name = $request->input("username") ;
        $user->matricule = $request->input("usermat") ;
        $user->email = $request->input("usermail");
        $user->password = Hash::make($request->input("userpw"));
        $user->phone =  $request->input("phone"); 
        $user->role =  $request->input("role");
        $user->iddep =  $request->input("iddep");
        $user->modalité =  $request->input("modalité");
    
        $user->save();
  
        return redirect("/user/".$user->id_user)->with('adduser',"success")->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        //
        $user =User::find($id_user);
        $username = $user->name;
        $user->delete();
     
        return redirect("/users")->with('adduser',"deleted");
    }
    public function loop(Request $request)
    {
        //
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $departments = Department::all();
        $users = User::where( 'email',"!=", Auth::user()->email )->get();
        $query = $request->input('query');
        $users = User::where('name', 'like', '%'.$query.'%')
                           ->orwhere('matricule', 'like', '%'.$query.'%')
                           ->orwhere('role', 'like', '%'.$query.'%')
                           ->orwhere('phone', 'like', '%'.$query.'%')
                           ->orwhere('iddep', 'like', '%'.$query.'%')
                           ->orwhere('modalité', 'like', '%'.$query.'%')->get();
        return view('users.search')->with('users',$users)->with('departments',$departments)->with('messages',$messages)->with('notifications',$notifications);
    }

}
