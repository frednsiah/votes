<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Color;

class VotesTest extends TestCase
{
    /**
     * Test that Hompage Loads without any errors.
     *
     * @return void
     */
    public function testHomePage() {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test that a color that exists has the correct groupBy Total.
     *
     * @return void
     */
    public function testGetColorExists() {
        $randomColor = $this->getColors()->random();

        $response = $this->get(route('votes.get', $randomColor->id));

        $response->assertStatus(200)
        ->assertJson([
            'success' => true,
            'data' => [
                'votes' => $randomColor->totalVotes->first() ? $randomColor->totalVotes->first()->totalVotes : 0,
            ]
        ]);
    }

        /**
     * Test that a color does not exist and a 404 not found is returned.
     *
     * @return void
     */
    public function testGetColorDoesNotExists() {

        $response = $this->get(route('votes.get', 'asd123'));

        $response->assertStatus(404);
    }


    private function getColors() {
        return Color::get();
    }
}
