<?php

namespace Tests\Feature\Core;

use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TasksTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_users_cannot_access_tasks()
    {
        $response = $this->get('/api/tasks');
        $response->assertStatus(302);
    }

    public function test_that_task_creation_is_validated()
    {
        $data = ['name' => 'Testing Tasks'];
        $response = $this->actingAs($this->user)->post('/api/tasks', $data);
        $response->assertStatus(302);

        $this->assertDatabaseEmpty('tasks');
    }


    public function test_that_authenticated_users_can_create_a_task()
    {
        $status = Status::factory()->create();

        $data = [
            'name' => fake()->text(30),
            'description' => fake()->text(200),
            'due_date' => Carbon::now(),
            'status_id' => $status->id,
        ];
        $response = $this->actingAs($this->user)->post('/api/tasks', $data);
        $response->assertStatus(201);

        $this->assertDatabaseHas('tasks', $data);
    }
}
