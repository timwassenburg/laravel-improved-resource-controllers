<?php

namespace TimWassenburg\ImprovedResourceControllers\Tests;

use Illuminate\Filesystem\Filesystem;
use TimWassenburg\ImprovedResourceControllers\ImprovedResourceControllersServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected $consoleOutput;

    public function setUp(): void
    {
        parent::setUp();
        $this->deleteAppDirFiles();
    }

    public function tearDown(): void
    {
        parent::tearDown();
        $this->deleteAppDirFiles();
    }

    protected function getPackageProviders($app)
    {
        return [ImprovedResourceControllersServiceProvider::class];
    }

    protected function deleteAppDirFiles()
    {
        $filesystem = new Filesystem();
        $filesystem->cleanDirectory(app_path());
    }
}
