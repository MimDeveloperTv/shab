<?php

namespace Core\Lucid\Bus;

use Illuminate\Foundation\Bus\DispatchesJobs;
use ReflectionClass;
use ReflectionException;

trait UnitDispatcher
{
    use DispatchesJobs;

    /**
     * decorator function to be called instead of the
     * laravel function dispatchFromArray.
     * When the $arguments is an instance of Request
     * it will call dispatchFrom instead.
     */
    public function run(string $unit, array $parameters = []): mixed
    {
        return $this->dispatch(app($unit, $parameters));
    }

    /**
     * Run the given unit in the given queue.
     *
     *
     * @throws ReflectionException
     */
    public function runInQueue(string $unit, array $arguments = [], ?string $queue = 'default'): mixed
    {
        // instantiate and queue the unit
        $reflection = new ReflectionClass($unit);
        $instance = $reflection->newInstanceArgs($arguments);
        $instance->onQueue((string) $queue);

        return $this->dispatch($instance);
    }
}
