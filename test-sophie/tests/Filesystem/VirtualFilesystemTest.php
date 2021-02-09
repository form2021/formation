<?php

namespace Tdf\Filesystem\Tests;

use Tdf\Filesystem\VirtualFilesystem;
use PHPUnit\Framework\TestCase;

class VirtualFilesystemTest extends TestCase
{
    /** @var VirtualFilesystem */
    private $filesystem;

    public function setUp()
    {
        $this->filesystem = $filesystem = new VirtualFilesystem('/a/b/c/d');
    }

    public function testChangingDirResolvesRelativePaths()
    {
        $data = [
            ['../x', '/a/b/c/x'],
            ['../../x', '/a/b/x'],
        ];

        foreach ($data as $test) {
            $this->changeDirTest($test[0], $test[1]);
        }
    }

    public function testChangingDirWithAbsolutePaths()
    {
        $data = [
            ['/x', '/x'],
            ['/e/f/g', '/e/f/g'],
            ['/e/f/g/../h', '/e/f/h'],
        ];

        foreach ($data as $test) {
            $this->changeDirTest($test[0], $test[1]);
        }
    }

    public function changeDirTest($newPath, $expectedPath)
    {
        $this->filesystem->cd($newPath);

        $this->assertSame($expectedPath, $this->filesystem->getCurrentPath());
    }
}
