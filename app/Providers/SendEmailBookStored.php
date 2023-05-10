<?php

namespace App\Providers;

use App\Mail\BookStored;
use App\Providers\BookStoredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendEmailBookStored
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
    public function handle(BookStoredEvent $event): void
    {
        Mail::to(Auth::user())->send(new BookStored($event->book, $event->user));
    }
}
