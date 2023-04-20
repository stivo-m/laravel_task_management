<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public User $user;

   protected function setUp(): void
   {
       parent::setUp();
       $this->user = User::factory()->create();
   }
}
