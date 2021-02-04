<?php

namespace Henrywhitaker3\LaravelActions\Tests\Unit;

use Henrywhitaker3\LaravelActions\Interfaces\ActionInterface;
use PHPUnit\Framework\TestCase;

class ExampleInstantiatedAction implements ActionInterface
{
    public string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function run()
    {
        echo $this->text;
    }
}

class ExampleNonInstantiatedAction implements ActionInterface
{
    public function run(string $text = null)
    {
        echo $text;
    }
}

class ExampleMultiArgumentAction implements ActionInterface
{
    public function run(string $text = null, string $text2 = null)
    {
        echo $text . $text2;
    }
}

class ActionTest extends TestCase
{
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

        $this->assertEquals($text . $text2, $output);
    }
}
