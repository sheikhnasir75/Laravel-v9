<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function generic($notification)
     {
         if(!$notification->user->is(Auth::user())){
             return abort(403);
         }
     }
    public function index()
    {
        //
       // $userId=Auth::id();
       $message="";
        //$notifications=Notification::where('user_id',Auth::id())->paginate(5);
        //$notifications=Auth::user()->notifications()->latest('updated_at')->paginate(5);
        $notifications=Notification::whereBelongsTo(Auth::user())->latest('updated_at')->paginate(5);
        //dd($notifications);
       return view('notification.index')->with('notifications',$notifications)->with('message',$message);
        //$notification->each(function($notification){
            //dump($notification->title);

       // });
       // dd($notification);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //new item
        //$notifications=Notification::where('user_id',Auth::id())->paginate(5);
        return view('notification.create');//->with('notifications',$notifications);
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save
        //dd($request);
        $request->validate([
            'title'=>'required|max:120',
            'textarea'=>'required'
        ]);
       /* $notification=new Notification([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'textarea'=>$request->text
        ]);
        $note->save();*/
        //Notification::create([
            Auth::user()->notifications()->create([
            'uuid'=>Str::uuid(),
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'text'=>$request->textarea
        ]);
        return to_route('notification.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
       
    
        $notification=Notification::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();
        if(!$notification->user->is(Auth::user())){
            return abort(403);
        }
        //return view('notification.show',$notification)->with('notification',$notification)->with($message);
        return view('notification.show')
            ->with('notification',$notification)
            ->with('success','Notification updated successfully');
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
      //  if($notification->user_id!=Auth::id()){
        if(!$notification->user->is(Auth::user())){
            return abort(403);
        }

        return view('notification.edit')->with('notification',$notification);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        this.generic($notification);

        $request->validate([
            'title'=>'required|max:120',
            'textarea'=>'required'
        ]);
        //
        $notification->update([
            'title'=>$request->title,
            'text'=>$request->textarea
        ]);
            
        return to_route('notification.edit',$notification)
        ->with('success','Notification updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
        if(!$notification->user->is(Auth::user())){
            return abort(403);
        }
        $notification->delete();
     
        return to_route('notification.index',$notification)->with('success','You have move  the data to trash');

    }
   
}
