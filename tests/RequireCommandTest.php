<?php

namespace Fa;

use ApprovalTests\Approvals;
use PHPUnit\Framework\TestCase;

class RequireCommandTest extends TestCase
{
    /** @var array<string,string> */
    private array $conf;

    protected function setUp(): void
    {
        $this->conf = XH_includeVar("./config/config.php", "plugin_cf")["fa"];
    }

    private function sut(): RequireCommand
    {
        return new RequireCommand("./", $this->conf);
    }

    public function testWritesToHjs(): void
    {
        global $hjs;
        $hjs = "";
        $this->sut()->execute();
        Approvals::verifyHtml($hjs);
    }
}
