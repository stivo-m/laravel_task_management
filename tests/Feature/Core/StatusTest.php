<?php

namespace Tests\Feature\Core;
use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusTest extends TestCase
{

    use RefreshDatabase;


    public function test_unauthenticated_users_cannot_access_statuses()
    {
        $response = $this->get('/api/status');
        $response->assertStatus(302);
    }

    public function test_that_authenticated_users_can_create_a_status()
    {
        $data = ['name' => 'Testing Status'];
        $response = $this->actingAs($this->user)->post('/api/status', $data);
        $response->assertStatus(201)
            ->assertJsonFragment($data);

        $this->assertDatabaseHas('statuses', $data);
    }


    public function test_that_authenticated_users_fetch_all_statuses()
    {
        $data = Status::factory()->create();
        $response = $this->actingAs($this->user)->get('/api/status');
        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $data->name]);
    }

    public function test_that_authenticated_users_fetch_a_given_status()
    {
        $data = Status::factory()->create();
        $response = $this->actingAs($this->user)->get('/api/status/'.$data->id);
        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $data->name]);
    }

    public function test_that_authenticated_users_update_a_given_status()
    {
        $data = Status::factory()->create();
        $name = 'New:'. fake()->name();
        $response = $this->actingAs($this->user)->patch('/api/status/'.$data->id, ['name' => $name]);
        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $name]);

        $this->assertDatabaseHas('statuses', [
            'id' => $data->id, 'name' => $name
        ]);
    }

    public function test_that_authenticated_users_delete_a_given_status()
    {
        $data = Status::factory()->create();
        $response = $this->actingAs($this->user)->delete('/api/status/'.$data->id, ['name' => $data->name]);
        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $data->name]);

        $this->assertSoftDeleted('statuses', [
            'id' => $data->id,
        ]);
    }
}
