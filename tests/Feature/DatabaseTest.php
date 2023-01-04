<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function testCountDB()
    {
        User::factory(8)->create();
        $this->assertDatabaseCount('users', 8);
    }

    public function testDatabaseHas()
    {
        $user = User::factory()->create([
            'email' => 'test-db@test.com'
        ]);
        $this->assertDatabaseHas('users', [
            'email' => 'test-db@test.com',
        ]);

        $user->delete();
        $this->assertDatabaseMissing('users', [
            'email' => 'test-db@test.com',
        ]);
    }

    public function testModelExist()
    {
        User::factory()->create([
            'email' => 'test-db@test.com'
        ]);
        $user = User::where(['email' => 'test-db@test.com'])->first();
        $this->assertModelExists($user);

        $user->delete();
        $this->assertModelMissing($user);
    }

    public function testModelSoftDelete()
    {
        $post = Post::create([
            'title' => 'Post title',
        ]);
        $post->delete();
        $this->assertSoftDeleted($post);

        $post->restore();
        $this->assertNotSoftDeleted($post);

    }
}
