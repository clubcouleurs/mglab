<?php

namespace App\Http\Controllers;


use App\Notification;
use App\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function showUnread()
    {

        $notificationsUnread = Notification::where('notifiable_id' , Auth::id())
                                    ->whereNull('read_at')->orderBy('created_at' , 'desc')->paginate(25);
                                   
        foreach ($notificationsUnread as $notification) {
            $notification->read_at = Carbon::now()->toDateTimeString();
            $notification->save();
        }

        return view('notifications.show', [ 'notifications' => $notificationsUnread ,
                                            'types' => Type::all(), 
                                         ]);    
    }

    public function showRead()
    {

        $notificationsRead = Notification::where('notifiable_id' , Auth::id())
                                    ->whereNotNull('read_at')->orderBy('created_at' , 'desc')->paginate(25);                                    
        return view('notifications.show', [ 
                                            'notifications' => $notificationsRead,
                                            'types' => Type::all(), 
                                         ]);    
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
