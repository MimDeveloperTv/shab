<?php

namespace Core\Actions;

use Illuminate\Support\Facades\Artisan;
use Spatie\Health\ResultStores\ResultStore;

class HealthAction
{
    public function __invoke(ResultStore $resultStore)
    {
        Artisan::call('health:check --no-notification');

        $checkResults = $resultStore->latestResults();

        $failedChecksMessages =
            $checkResults->storedCheckResults
                ->where('status', 'failed')
                ->pluck('notificationMessage', 'name')
                ->toArray();

        return response()->json([
            'status' => $checkResults->allChecksOk(),
            'message' => $failedChecksMessages,
        ])->setStatusCode($checkResults->allChecksOk() ? 200 : 503);
    }
}
