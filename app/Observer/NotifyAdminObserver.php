<?php

namespace App\Observer;

use App\Models\Concerns\Model;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NotifyAdminObserver
{
    public function created(Order $order)
    {
       Order::SendNotifyAdmin($order);
    }
}
