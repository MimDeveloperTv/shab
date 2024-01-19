<?php

namespace Core\Http\Controllers;

use Core\Lucid\Bus\ServesFeatures;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use ServesFeatures;
}
