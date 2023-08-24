<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Message;
use App\Notification;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::where("id_user","<>",Auth::user()->id_user)->get();
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        return view('messages.index')->with('messages',$messages)->with('users',$users)->with('notifications',$notifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $iddestination = $request->input('iddestination');
        $message = new  Message();
        $message->idsender = Auth::user()->id_user;
        $message->iddestination = $request->input('iddestination');
        $message->content = $request->input('content');
        $message->stat = "unread";
        $message->save();
        return redirect('/conversation/'.$iddestination);

    }
    public function conversation($id){
        $messages = Message::where('iddestination',Auth::user()->id_user)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id_user)->where('stat',"unseen")->get();
        $users = User::where("id_user","<>",Auth::user()->id_user)->get();
        $messagesConv = Message::where('idsender',$id)
                             ->where('iddestination',Auth::user()->id_user)
                             ->orwhere('idsender',Auth::user()->id_user)
                             ->where('iddestination',$id)
                             ->orderBy('created_at', 'asc')
                             ->get();
        $listm = array();
        foreach( $messages as $message ){
            if ($message->iddestination == Auth::user()->id_user ){
                $listm[] = $message->id_user;
            }
           
        }  
        foreach ($listm as $idm ){
            $messagesReaded = Message::find($idm);
            $messagesReaded->stat = "readed";
            $messagesReaded->update();   
        }
              
        return view('messages.conversation')->with('iddestination',$id)->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('messagesConv',$messagesConv);

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
