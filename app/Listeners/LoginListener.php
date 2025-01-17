<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use App\Models\User;
use Illuminate\Http\Request;

class LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        User::where('id',$event->user->id)->update([
            'last_login' => now(),
            'last_login_ip' => request()->ip(),

        ]);
    }
}
