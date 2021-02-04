<?php

use Henrywhitaker3\LaravelActions\Interfaces\ActionInterface;

if (! function_exists('run')) {
    /**
     * Run a given action.
     *
     * @param ActionInterface|string $action
     * @return mixed
     * @throws Illuminate\Contracts\Container\BindingResolutionException
     */
    function run($action, $arguments = [])
    {
        /**
         * If we're not passing an instance of a class implementing the interface,
         * then try to get an instance that is bound in the Service Container.
         */
        if (! $action instanceof ActionInterface) {
            $action = app($action);
        }

        if (! is_array($arguments)) {
            $arguments = [$arguments];
        }

        return call_user_func_array([$action, 'run'], $arguments);
    }
}
