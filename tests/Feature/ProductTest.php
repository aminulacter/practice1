<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /** @test */
    public function a_user_can_browse_project()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
