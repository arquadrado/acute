<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Support\Admin\Facades\AdminResourceManager as Manager;

class AdminResourceManagerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testResolveResource()
    {
        $this->assertEquals('product', Manager::resolveResource('admin/products'));
        $this->assertEquals('product', Manager::resolveResource('admin/products/edit'));
        $this->assertEquals('store', Manager::resolveResource('admin/stores'));
        $this->assertEquals(null, Manager::resolveResource('admin'));
        $this->assertEquals('pixy', Manager::resolveResource('admin/pixies'));
        $this->assertEquals('fly', Manager::resolveResource('admin/flies'));
    }
}
