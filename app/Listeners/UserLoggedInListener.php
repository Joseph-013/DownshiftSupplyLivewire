<?php

namespace App\Listeners;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLoggedInListener
{
    /**
     * Create the event listener.
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Handle the event.
     */
    public function handle(Authenticated $event)
    {
        $user = $event->user;

        if ($user->usertype = 'user') {

            $inTransitTransactions = Transaction::where('user_id', $user->id)->where('status', 'In Transit')->get();

            $modifiedTransactions = [];

            foreach ($inTransitTransactions as $transaction) {
                if (Carbon::now()->diffInDays($transaction->intransit_at) >= 7) {
                    $transaction->status = 'Complete';
                    $transaction->save();
                    $modifiedTransactions[] = $transaction->id;
                }
            }

            if (!empty($modifiedTransactions)) {
                session()->flash('complete', $modifiedTransactions);
            }
        }
    }
}
