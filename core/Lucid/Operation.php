<?php

namespace Core\Lucid;

use Core\Lucid\Bus\UnitDispatcher;
use Illuminate\Support\Traits\Conditionable;

abstract class Operation
{
    use UnitDispatcher;
    use Conditionable;
}
