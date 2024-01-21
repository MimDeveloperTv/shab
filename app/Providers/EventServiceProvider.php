<?php

namespace App\Providers;

use App\Events\NotifyAdminEvent;
use App\Listeners\SendNotifyListener;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Observer\NotifyAdminObserver;
use App\Observer\UlidKeyObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            NotifyAdminEvent::class => [
                SendNotifyListener::class,
            ]
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Product::observe(UlidKeyObserver::class);
        Image::observe(UlidKeyObserver::class);
        Order::observe(UlidKeyObserver::class);
        OrderProduct::observe(UlidKeyObserver::class);

        /** Notify Admin Observer. */
        Order::observe(NotifyAdminObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return true;
    }
}
