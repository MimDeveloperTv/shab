<?php

namespace Core\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class QueryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Contracts\TransactionQuery::class, function (Application $app) {
            $type = config('settings.query_builder_type');

            return $app->make('\\App\\QueryBuilder\\'.$type.'\\TransactionQueryBuilder');
        });

        $this->bindMonitoringQueries();

        $this->app->bind(\App\Contracts\Queries\CommissionSelectTransactionQuery::class, \App\QueryBuilder\Queries\DB\Commission\CommissionSelectTransaction::class);
        $this->app->bind(\App\Contracts\Queries\CommissionResourceQuery::class, \App\QueryBuilder\Queries\DB\Commission\CommissionResource::class);
        $this->app->bind(\App\Contracts\Queries\UserCommissionsStatsQuery::class, \App\QueryBuilder\Queries\DB\Commission\UserCommissionsStats::class);
        $this->app->bind(\App\Contracts\Queries\UserCommissionsQuery::class, \App\QueryBuilder\Queries\DB\Commission\UserCommissions::class);

        $this->app->bind(\App\Contracts\Queries\NonInquiredTransactionsQuery::class, \App\QueryBuilder\Queries\DB\Inquiry\NonInquiredTransactions::class);
        $this->app->bind(\App\Contracts\Queries\SubjectStatsQuery::class, \App\QueryBuilder\Queries\DB\SubjectStats::class);
        $this->app->bind(\App\Contracts\Queries\FetchTxByWebserviceQuery::class, \App\QueryBuilder\Queries\DB\FetchTxByWebservice::class);
        $this->app->bind(\App\Contracts\Queries\PayeeDepositsStatsQuery::class, \App\QueryBuilder\Queries\DB\PayeeDepositsStats::class);
        $this->app->bind(\App\Contracts\Queries\FetchTxByTrackIdQuery::class, \App\QueryBuilder\Queries\DB\FetchTxByTrackId::class);
        $this->app->bind(\App\Contracts\Queries\FetchTxByShortIdQuery::class, \App\QueryBuilder\Queries\DB\FetchTxByShortId::class);
        $this->app->bind(\App\Contracts\Queries\TransactionUniqueIdQuery::class, \App\QueryBuilder\Queries\DB\TransactionUniqueId::class);

        $this->app->bind(\App\Contracts\Queries\TransactionOpponentUpdatedQuery::class, \App\QueryBuilder\Queries\DB\TransactionOpponentUpdated::class);
        $this->app->bind(\App\Contracts\Queries\TransactionDoubleSpendingQuery::class, \App\QueryBuilder\Queries\DB\TransactionDoubleSpending::class);
        $this->app->bind(\App\Contracts\Queries\OngoingSalesQuery::class, \App\QueryBuilder\Queries\DB\OngoingSales::class);
        $this->app->bind(\App\Contracts\Queries\TransactionWalletDocSettlementQuery::class, \App\QueryBuilder\Queries\DB\TransactionWalletDocSettlement::class);
        $this->app->bind(\App\Contracts\Queries\FetchTxBySubjectQuery::class, \App\QueryBuilder\Queries\DB\FetchTxBySubject::class);
        $this->app->bind(\App\Contracts\Queries\UnsettledPayeeStatsQuery::class, \App\QueryBuilder\Queries\DB\UnsettledPayeeStats::class);
        $this->app->bind(\App\Contracts\Queries\GetSumTransactionsQuery::class, \App\QueryBuilder\Queries\DB\GetSumTransactions::class);
        $this->app->bind(\App\Contracts\Queries\WalletTransactionsQuery::class, \App\QueryBuilder\Queries\DB\WalletTransactions::class);
        $this->app->bind(\App\Contracts\Queries\UserOpponentsQuery::class, \App\QueryBuilder\Queries\DB\UserOpponents::class);
        $this->app->bind(\App\Contracts\Queries\UserPaidChannelsQuery::class, \App\QueryBuilder\Queries\DB\UserPaidChannels::class);
        $this->app->bind(\App\Contracts\Queries\UserPayeeDailyQuery::class, \App\QueryBuilder\Queries\DB\UserPayeeDaily::class);

        $this->app->bind(\App\Contracts\Queries\AggregateMerchantTransactionsQuery::class, \App\QueryBuilder\Queries\DB\Analytic\AggregateMerchantTransactions::class);
        $this->app->bind(\App\Contracts\Queries\AggregateGeneralTransactionsQuery::class, \App\QueryBuilder\Queries\DB\Analytic\AggregateGeneralTransactions::class);
        $this->app->bind(\App\Contracts\Queries\AggregateDailyTransactionsQuery::class, \App\QueryBuilder\Queries\DB\Analytic\AggregateDailyTransactions::class);

        $this->app->bind(\App\Contracts\Queries\TransactionAnalyticsQuery::class, \App\QueryBuilder\Queries\DB\Analytic\TransactionAnalytics::class);
        $this->app->bind(\App\Contracts\Queries\TransactionsIncompleteAccountQuery::class, \App\QueryBuilder\Queries\DB\Account\TransactionsIncompleteAccount::class);
        //:end-bindings:
    }

    private function bindMonitoringQueries()
    {
        $this->app->bind(
            \App\Contracts\Queries\HighTransactionUsersQuery::class,
            \App\QueryBuilder\Queries\DB\Monitoring\HighTransactionUsers::class
        );
        $this->app->bind(
            \App\Contracts\Queries\TransactionsStateQuery::class,
            \App\QueryBuilder\Queries\DB\Monitoring\TransactionsState::class
        );
        $this->app->bind(
            \App\Contracts\Queries\TransactionsStatesQuery::class,
            \App\QueryBuilder\Queries\DB\Monitoring\TransactionsStates::class
        );
        $this->app->bind(
            \App\Contracts\Queries\TransactionsRateQuery::class,
            \App\QueryBuilder\Queries\DB\Monitoring\TransactionsRate::class
        );
    }
}
