<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMaxReport()
    {
        $this->get(route('events.max'))
            ->assertStatus(200)
        ->assertJsonStructure([
            'results' => [
                'time_taken',
                'activity_id'

            ],
        ]);
    }


}
