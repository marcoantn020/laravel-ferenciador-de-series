<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SeasonsApiController extends Controller
{
    public function index(Series $series)
    {
        $seasons = $series->seasons()
            ->with('episodes')
            ->first();

        return response()
            ->json($seasons);
    }
}
