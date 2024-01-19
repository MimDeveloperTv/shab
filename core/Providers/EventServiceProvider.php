<?php

namespace Core\Providers;

use App\Events\GuessPanCard;
use App\Events\TransactionChanged;
use App\Events\TransactionsChanged;
use App\Listeners\FillPanCard;
use App\Listeners\InvalidateTransactionCache;
use App\Listeners\InvalidateTransactionsCache;
use App\Models\Identity;
use App\Observers\IdentityObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        TransactionChanged::class => [
            InvalidateTransactionCache::class,
        ],
        TransactionsChanged::class => [
            InvalidateTransactionsCache::class,
        ],
        GuessPanCard::class => [
            FillPanCard::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Identity::observe(IdentityObserver::class);
    }
}
