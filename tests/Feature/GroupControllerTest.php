<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\GroupSeeder;
use Tests\TestCase;

class GroupControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(GroupSeeder::class);
    }

    public function testShowGroups(): void
    {
        $response = $this->get( route("show_group"));
        
        $response->assertStatus(200);
        $response->assertViewIs("group.show");
    }

}
