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
        $this->assertEquals('products', Manager::resolveResource('admin/products'));
        $this->assertEquals('products', Manager::resolveResource('admin/products/edit'));
        $this->assertEquals('stores', Manager::resolveResource('admin/stores'));
        $this->assertEquals('pixies', Manager::resolveResource('admin/pixies'));
        $this->assertEquals('flies', Manager::resolveResource('admin/flies'));
        $this->assertEquals(null, Manager::resolveResource('admin'));
        $this->assertEquals(null, Manager::resolveResource('/'));
        $this->assertEquals(null, Manager::resolveResource('xpto/xis'));
        $this->assertEquals(null, Manager::resolveResource('xpto/admin'));
    }

    public function testResourceExists()
    {
        $this->assertTrue(Manager::resourceExists('users'));
        $this->assertTrue(Manager::resourceExists('products'));
        $this->assertTrue(Manager::resourceExists('product'));
        $this->assertFalse(Manager::resourceExists('xarope'));
    }

    public function testGetResourceClass()
    {
        $this->assertEquals('App\\Models\\Product', Manager::getResourceClass('products'));
        $this->assertEquals('App\\Models\\User', Manager::getResourceClass('users'));
        $this->assertEquals('App\\Models\\AdminUser', Manager::getResourceClass('admin_users'));
        $this->assertEquals(null, Manager::getResourceClass('floods'));
    }
}
