<?php

namespace TimWassenburg\ImprovedResourceControllers\Tests\Feature;

use TimWassenburg\ImprovedResourceControllers\Tests\TestCase;

class MakeControllerTest extends TestCase
{
    public function test_default_resource_controller()
    {
        $this->artisan('make:controller', [
            'name' => 'CustomerController',
            '--resource' => true,
        ])->execute();

        $this->assertFileExists(app_path('Http/Controllers').'/CustomerController.php');
    }

    public function test_model_resource_controller()
    {
        $this->artisan('make:controller', [
            'name' => 'CustomerController',
            '--resource' => true,
            '--model' => 'Customer',
        ])
            ->expectsConfirmation('A App\Customer model does not exist. Do you want to generate it?', 'yes')
            ->execute();

        $this->assertFileExists(app_path('Http/Controllers').'/CustomerController.php');
    }

    public function test_model_api_resource_controller()
    {
        $this->artisan('make:controller', [
            'name' => 'CustomerController',
            '--resource' => true,
            '--api' => true,
            '--model' => 'Customer',
        ])
            ->expectsConfirmation('A App\Customer model does not exist. Do you want to generate it?', 'yes')
            ->execute();

        $this->assertFileExists(app_path('Http/Controllers').'/CustomerController.php');
    }

    public function test_nested_resource_controller()
    {
        $this->artisan('make:controller', [
            'name' => 'CityController',
            '--resource' => true,
            '--parent' => 'Country',
            '--model' => 'City',
        ])
            ->expectsConfirmation('A App\Country model does not exist. Do you want to generate it?', 'yes')
            ->expectsConfirmation('A App\City model does not exist. Do you want to generate it?', 'yes')
            ->execute();

        $this->assertFileExists(app_path('Http/Controllers').'/CityController.php');
    }

    public function test_nested_api_resource_controller()
    {
        $this->artisan('make:controller', [
            'name' => 'CityController',
            '--resource' => true,
            '--api' => true,
            '--parent' => 'Country',
            '--model' => 'City',
        ])
            ->expectsConfirmation('A App\Country model does not exist. Do you want to generate it?', 'yes')
            ->expectsConfirmation('A App\City model does not exist. Do you want to generate it?', 'yes')
            ->execute();

        $this->assertFileExists(app_path('Http/Controllers').'/CityController.php');
    }
}
