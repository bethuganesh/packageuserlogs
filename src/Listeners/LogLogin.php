<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use App\Models\UserActivity;
use Illuminate\Support\Facades\Http;

class LogLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        UserActivity::create([
            'user_id' => $event->user->id,
            'login_at' => now(),
            'ip_details' => json_encode($this->getIpDetails(request()->ip()))
        ]);
    }
    public function getIpDetails($ip)
    {
        try {
            $url = "http://ip-api.com/json/{$ip}";
            $response = Http::get($url);
            if ($response->successful()) {
                return $response->json();
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }
}
