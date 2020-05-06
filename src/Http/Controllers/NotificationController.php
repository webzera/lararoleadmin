<?php

namespace Webzera\Lararoleadmin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Webzera\Lararoleadmin\Admin;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('checkrole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function allnotify()
    {
        $adminn=Admin::find(1);
        $allnotify=$adminn->notifications();
        return view('admin::notification.allnotify')->with('allnotify',$allnotify);
    }
    public function viewnotify($id)
    {
        $adminn=\App\Admin::find(1);
        $notify=$adminn->notifications()->find(['id' => $id])->first();
        // $notify->unreadNotifications()->update(['read_at' => now()]);

        // return $notify;

        return view('admin.notification.viewnotify')->with('notify',$notify);
    }
}
