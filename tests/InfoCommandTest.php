<?php

namespace Fa;

use ApprovalTests\Approvals;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class InfoCommandTest extends TestCase
{
    private View $view;

    protected function setUp(): void
    {
        $this->view = new View("./views/", XH_includeVar("./languages/en.php", "plugin_tx")["fa"]);
    }

    /** @return InfoCommand&MockObject */
    private function sut()
    {
        return $this->getMockBuilder(InfoCommand::class)
            ->setConstructorArgs(["./plugins/fa/", $this->view])
            ->onlyMethods(["compareVersions", "isWritable"])
            ->getMock();
    }

    public function testRendersPluginInfo(): void
    {
        global $title;
        $response = $this->sut()();
        $this->assertSame("Fa 1.4", $title);
        Approvals::verifyHtml($response);
    }
}
