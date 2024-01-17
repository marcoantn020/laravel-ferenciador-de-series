<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{

    public function index(Season $season): Factory|View|Application
    {
        $messageSuccess = session('message.success');

        return view("episodes.index", [
            'season' => $season->id,
            "episodes" => $season->episodes
        ])->with('messageSuccess', $messageSuccess);
    }

    public function update(Request $request, Season $season): RedirectResponse
    {
        $episodesCheckedInView = $request->episodes;
        $episodesInDatabase = $season->episodes()->pluck('id')->all();

        DB::transaction(function () use ($episodesCheckedInView, $episodesInDatabase) {
            Episode::query()
                ->whereIn('id', $episodesInDatabase)
                ->update(['watched' => false]);

            Episode::query()
                ->whereIn('id', $episodesCheckedInView)
                ->update(['watched' => true]);
        }, 2);

        return to_route('episodes.index', $season->id)
            ->with('message.success', 'Episodios atualizados com sucesso.');
    }
}
