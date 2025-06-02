<?php

namespace Fa;

use PHPUnit\Framework\TestCase;

class PluginTest extends TestCase
{
    protected function setUp(): void
    {
        global $pth, $plugin_tx;
        $pth = ["folder" => ["plugins" => ""]];
        $plugin_tx = ["fa" => []];
    }

    public function testMakesRequireCommand(): void
    {
        $this->assertInstanceOf(RequireCommand::class, Plugin::requireCommand());
    }

    public function testMakesInfoCommand(): void
    {
        $this->assertInstanceOf(InfoCommand::class, Plugin::infoCommand());
    }
}
