<?php

namespace Henrywhitaker3\LaravelActions\Tests\Utils;

use Henrywhitaker3\LaravelActions\Interfaces\ActionInterface;

class ExampleMultiArgumentAction implements ActionInterface
{
    public function run(string $text = null, string $text2 = null)
    {
        echo $text.$text2;
    }
}
