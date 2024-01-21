<?php

namespace App\Listeners;

use App\Events\NotifyAdminEvent;
use App\Mail\NotifyAdminEmail;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotifyListener
{
    public function __construct()
    {}

    public function handle(NotifyAdminEvent $event): void
    {
        Mail::to('test@mailtrap.com')->send(new NotifyAdminEmail($event->order));
        Order::query()->find($event->order->id)->update([
            'notifyAdmin' => true
        ]);
    }
}
