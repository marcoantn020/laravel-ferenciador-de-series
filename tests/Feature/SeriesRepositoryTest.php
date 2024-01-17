<?php

namespace Tests\Feature;

use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_when_a_series_is_created_its_seasons_and_episodes_must_be_created()
    {
        $repository = $this->app->make(SeriesRepository::class);
        $request = [];
        $request['name'] = 'Series number 1';
        $request['seasonsQuantity'] = 1;
        $request['episodesPerSeason'] = 1;

        $repository->addSerieSeasonsEpisodes($request);

        $this->assertDatabaseHas('series', ['name' => $request['name']]);
        $this->assertDatabaseHas('seasons', ['number' => $request['seasonsQuantity']]);
        $this->assertDatabaseHas('episodes', ['number' => $request['episodesPerSeason']]);
    }
}
