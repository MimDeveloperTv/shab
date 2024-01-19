<?php

namespace Core\Lucid;

/**
 * An abstract Action to be extended by every action.
 * Note that this action is self-handling which
 * means it will NOT be queued, rather
 * will have the "handle()" method
 * called instead.
 */
abstract class Action
{
}
