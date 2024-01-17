<?php

namespace App\Listeners;

use App\Events\SeriesCreatedEvent;
use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailUsersAboutSeriesCreatedListener implements ShouldQueue
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
    public function handle(SeriesCreatedEvent $event)
    {
        $users = User::all();
        foreach ($users as $index => $user) {
            $sendMail = new SeriesCreated(
                nameSerie: $event->name,
                quantitySeasons: $event->seasonsQuantity,
                episodesPerSeasons: $event->episodesPerSeason,
                idSerie: $event->id
            );
            $when = now()->addSeconds($index * 5);
            Mail::to($user)->later($when, $sendMail);
        }
    }
}
