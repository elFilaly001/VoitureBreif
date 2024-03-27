<?php

use App\Models\User; // Import your User model
use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Pest\Laravel;
use Tests\TestCase;


it('adds a user', function () {

    $user = User::factory()->make();

    $us = [
        "name" => $user->name,
        "email" => $user->email,
        "password" => $user->password,
        "role" => $user->role,
    ];
    // dd($user);
    $response = $this->postJson('/api/user', $us);
    $response->assertStatus(200);
})->only();

it('updates a user', function () {

    $user = User::factory()->create();
    // dd($user->id);

    $updatedData = [
        'name' => 'ana',
        'role' => 'Admin',
    ];

    $response = $this->putJson('/api/updateUser/' . $user->id . '', $updatedData);


    $response->assertStatus(200);

    $this->assertEquals("User updated successfully!", $response['message']);
});



it('deletes a user', function () {
    $user = User::factory()->create();
    // dd($user->id);
    $response = $this->deleteJson('/api/deleteUser/' . $user->id . '');
    $response->assertStatus(200);
    $this->assertEquals('deleted', $response['message']);
});
