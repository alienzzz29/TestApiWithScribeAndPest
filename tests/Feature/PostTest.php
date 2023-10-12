<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use App\Models\User;
use Tests\TestCase;
// test('example', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// });

uses(RefreshDatabase::class);
uses(WithFaker::class);

// beforeEach(function () {
//     $this->user = User::factory()->create();
// });

it('test_show_posts', function (){
    // $user = User::factory()->create();

    // $this->actingAs($user)->get('/api/posts/')
    // ->assertStatus(200);
    actingAs(User::factory()->create())
    ->get('/api/posts/')
    ->assertOk();

});


it('test_show_post_by_id', function()
{
    // $user = User::factory()->create();

    $id = '1';

    actingAs(User::factory()->create())
    ->get('/api/post/{id}')
    ->assertOk();
});

it('test_create_post', function()
{
    
    $user = User::factory()->create();

    $formData = [
        'user_id'=> $this->faker->randomDigit(),
        'text'=> $this->faker->sentence()
    ];

    // dd($formData);
    actingAs($user)
    ->post('/api/posts', $formData)
    ->assertOk();
});

it('test_update_post', function()
{
    $user = User::factory()->create();

    $id = '1';

    actingAs($user)
    ->post('/api/post/{$id}/update')
    ->assertOk();
});

it('test_delete_post',function()
{
    $user = User::factory()->create();

    $id = '1';

    actingAs($user)
    ->delete('/api/post/{$id}/delete')
    ->assertOk();
});