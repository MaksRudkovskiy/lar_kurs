<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateLastLogin
{
    public function handle(Authenticated $event)
    {
        $user = $event->user;
        $user->last_login_at = now()->timezone(config('app.timezone'));
        $user->save();
    }
}