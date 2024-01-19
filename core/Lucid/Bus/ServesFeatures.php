<?php

namespace Core\Lucid\Bus;

use Illuminate\Foundation\Bus\DispatchesJobs;

trait ServesFeatures
{
    use DispatchesJobs;

    /**
     * Serve the given feature with the given arguments.
     */
    public function serve(string $feature, array $parameters = []): mixed
    {
        return $this->dispatch(app($feature, $parameters));
    }
}
