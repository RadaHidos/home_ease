<?php

use App\Models\Service;
use App\Models\User;
use function Pest\Laravel\get;

it('can load the home page', function () {
    get(route('services.index'))
        ->assertStatus(200);
});

it('can load the products search page', function () {
    get('/products-search')
        ->assertStatus(200);
});

it('can create a user', function () {
    $user = User::factory()->create();

    expect($user)->toBeInstanceOf(User::class);
    expect($user->email)->not->toBeEmpty();
});


it('hides unpublished services from public view', function () {
    $user = User::factory()->create();

    // Create an unpublished service
    $unpublishedService = Service::factory()->create([
        'author_id' => $user->id,
        'is_published' => false,
        'title' => 'Secret Service'
    ]);

    // Create a published service
    $publishedService = Service::factory()->create([
        'author_id' => $user->id,
        'is_published' => true,
        'title' => 'Public Service'
    ]);

    // Check Home Page / Welcome Controller
    // Since WelcomeController takes 3 published services, let's verify unpublished isn't there
    // Note: The view renders the titles.
    get('/')
        ->assertSee('Public Service')
        ->assertDontSee('Secret Service');

    // Check API endpoint
    get(route('api.services.index'))
        ->assertStatus(200)
        ->assertJsonFragment(['title' => 'Public Service'])
        ->assertJsonMissing(['title' => 'Secret Service']);
});
