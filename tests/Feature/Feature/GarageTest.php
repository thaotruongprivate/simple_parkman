<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GarageTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGaragesAreFilteredByName() {
        $this->json('GET', '/api/garages?name=Kauppis')
            ->assertStatus(200)
            ->assertJsonCount(1, 'garages')
            ->assertJson([
                'result' => true,
                'garages' => [
                    [
                        'name' => 'Kauppis'
                    ]
                ]
            ]);
    }

    public function testGaragesAreFilteredByOwner() {
        $this->json('GET', '/api/garages?owner=AutoPark')
            ->assertStatus(200)
            ->assertDontSee('"garage_owner":"Q-Park"')
            ->assertJson([
                'result' => true,
                'garages' => [
                    [
                        'garage_owner' => 'AutoPark'
                    ]
                ]
            ]);
    }

    public function testGarageList() {
        $this->json('GET', '/api/garages')
            ->assertStatus(200)
            ->assertJson([
                'result' => true,
                'garages' => []
            ]);
    }
}
