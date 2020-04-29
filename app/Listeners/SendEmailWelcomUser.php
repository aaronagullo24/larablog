<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailWelcomUser
{

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */

    private $event;
    public function handle(UserCreated $event)
    {
        $data['title'] = "Bienvenido " . $event->user->name;

        $this->event=$event;

        Mail::send('emails.email', $data, function ($message) {
            $message->to($this->event->user->email, $this->event->user->name)
                ->subject("Gracias por escribirnos " . $this->event->user->name);
        });
    }
}
