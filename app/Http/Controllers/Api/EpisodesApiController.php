<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Series;
use Illuminate\Http\Request;

class EpisodesApiController extends Controller
{
    public function index(Series $series)
    {
        $episodes = $series->episodes;
        return response()
            ->json($episodes);
    }

    public function show(Episode $episode, Request $request) {
        $episode->watched = $request->watched;
        $episode->save();
        return response()
            ->json($episode);
    }
}
