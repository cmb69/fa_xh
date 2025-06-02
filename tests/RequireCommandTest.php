<?php

namespace Fa;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionProperty;

class RequireCommandTest extends TestCase
{
    private ReflectionProperty $isEmitted;

    /** @var array<string,string> */
    private array $conf;

    protected function setUp(): void
    {
        $this->conf = XH_includeVar("./config/config.php", "plugin_cf")["fa"];
        $requireCommandClass = new ReflectionClass(RequireCommand::class);
        $this->isEmitted = $requireCommandClass->getProperty("isEmitted");
        $this->isEmitted->setAccessible(true);
        $this->isEmitted->setValue(null, false);
    }

    private function sut(): RequireCommand
    {
        return new RequireCommand("./", $this->conf);
    }

    public function testRendersV4Link(): void
    {
        global $hjs;
        $hjs = "";
        $this->sut()->execute();
        $this->assertSame(
            '<link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">',
            $hjs
        );
    }

    public function testRendersV5Link(): void
    {
        global $hjs;
        $hjs = "";
        $this->conf["fontawesome_version"] = "5";
        $this->sut()->execute();
        $this->assertSame(
            '<link rel="stylesheet" type="text/css" href="./css/v5/all.min.css">',
            $hjs
        );
    }

    public function testRendersV5LinkWithShim(): void
    {
        global $hjs;
        $hjs = "";
        $this->conf["fontawesome_version"] = "5";
        $this->conf["fontawesome_shim"] = "true";
        $this->sut()->execute();
        $this->assertSame(
            '<link rel="stylesheet" type="text/css" href="./css/v5/all.min.css">'
            . '<link rel="stylesheet" type="text/css" href="./css/v5/v4-shims.min.css">',
            $hjs
        );
    }

    public function testRendersOnlyOnce(): void
    {
        global $hjs;
        $hjs = "";
        $this->isEmitted->setValue(null, true);
        $this->sut()->execute();
        $this->assertSame(
            '',
            $hjs
        );
    }
}
