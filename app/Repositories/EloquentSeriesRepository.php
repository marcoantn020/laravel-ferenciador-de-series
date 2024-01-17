<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function addSerieSeasonsEpisodes(array $data): Series
    {
        return DB::transaction(function () use ($data) {
            $serie = Series::create($data);
            $data = (object) $data;

            $seasons = [];
            for ($i = 1; $i <= $data->seasonsQuantity; $i++) {
                $seasons[] = [
                    'series_id' => $serie->id,
                    'number' => $i
                ];
            }

            Season::insert($seasons);

            $episodes = [];
            foreach ($serie->seasons as $season) {
                for ($j = 1; $j <= $data->episodesPerSeason; $j++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j
                    ];
                }
            }

            Episode::insert($episodes);

            return $serie;
        });
    }
}
