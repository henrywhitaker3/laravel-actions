<?php

namespace Henrywhitaker3\LaravelActions\Tests\Unit;

use Henrywhitaker3\LaravelActions\Tests\Utils\ExampleInstantiatedAction;
use Henrywhitaker3\LaravelActions\Tests\Utils\ExampleMultiArgumentAction;
use Henrywhitaker3\LaravelActions\Tests\Utils\ExampleNonInstantiatedAction;

class ActionTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return ['Henrywhitaker3\LaravelActions\LaravelActionsServiceProvider'];
    }

    /**
     * Run an action when it's already been instantiated.
     *
     * @test
     * @return void
     */
    public function runInstantiatedAction()
    {
        $text = 'instantiated text';

        $action = new ExampleInstantiatedAction($text);
        ob_start();
        run($action);
        $output = ob_get_clean();

        $this->assertEquals($text, $output);
    }

    /**
     * Run an action when it's not been instantiated.
     *
     * @test
     * @return void
     */
    public function runNonInstantiatedAction()
    {
        $text = 'non-instantiated text';

        ob_start();
        run(ExampleNonInstantiatedAction::class, $text);
        $output = ob_get_clean();

        $this->assertEquals($text, $output);
    }

    /**
     * Run an action when it's not been instantiated.
     *
     * @test
     * @return void
     */
    public function runMultiArgumentAction()
    {
        $text = 'multi-argument ';
        $text2 = 'text';

        ob_start();
        run(ExampleMultiArgumentAction::class, [$text, $text2]);
        $output = ob_get_clean();

        $this->assertEquals($text.$text2, $output);
    }
}
