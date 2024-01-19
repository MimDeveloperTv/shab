<?php

namespace Core\Lucid;

use Core\Lucid\Bus\UnitDispatcher;
use Illuminate\Support\Traits\Conditionable;

abstract class Feature
{
    use Conditionable;
    use UnitDispatcher;
}
