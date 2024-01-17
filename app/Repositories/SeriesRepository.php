<?php

namespace App\Repositories;

use App\Models\Series;

interface SeriesRepository
{
    public function addSerieSeasonsEpisodes(array $data): Series;
}
