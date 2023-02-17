<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedNoteController extends Controller
{
    public function index(){
        $message="";
        $notifications=Notification::whereBelongsTo(Auth::user())
        ->onlyTrashed()
        ->latest('updated_at')->paginate(5);
       return view('notification.index')->with('notifications',$notifications)->with('message',$message);
      
    }
    public function show(Notification $notification){
        //dd($notification);
        if(!$notification->user->is(Auth::user())){
            return abort(403);
        }
        return view('notification.show')->with('notification',$notification);
    }
    public function update(Notification $notification){
        if(!$notification->user->is(Auth::user())){
            return abort(403);
        }
        $notification->restore();

        return to_route('notification.show',$notification)
        ->with('success','Notification is restored');
    }
    public function destroy(Notification $notification)
    {
        //
        if(!$notification->user->is(Auth::user())){
            return abort(403);
        }
        $notification->forcedelete();
     
        return to_route('trashed.index',$notification)
        ->with('success','Notification deleted forever');

    }
}

