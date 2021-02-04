<?php

use Henrywhitaker3\LaravelActions\Interfaces\ActionInterface;

if (! function_exists('run')) {
    /**
     * Run a given action.
     *
     * @param ActionInterface|string $action
     * @param mixed $arguments
     * @return mixed
     * @throws Illuminate\Contracts\Container\BindingResolutionException
     */
    function run($action, $arguments = [])
    {
        if (! $action instanceof ActionInterface) {
            $action = app($action);
        }

        if (! is_array($arguments)) {
            $arguments = [$arguments];
        }

        return call_user_func_array([$action, 'run'], $arguments);
    }
}
