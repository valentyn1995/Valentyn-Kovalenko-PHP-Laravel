<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\GroupSeeder;
use Tests\TestCase;

class GroupControllerApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(GroupSeeder::class);
    }

    public function testShowGroupsApiJson(): void
    {
        $response = $this->get('/api/v1/group/show?format=json');
        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json');
    }

    public function testShowGroupsApiXml(): void
    {
        $response = $this->get('/api/v1/group/show?format=xml');
        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/xml; charset=utf-8');
    }
}
