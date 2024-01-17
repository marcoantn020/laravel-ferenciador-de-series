<?php

namespace App\Http\Controllers;

use App\Events\SeriesCreatedEvent;
use App\Http\Requests\Series\SeriesCreateRequest;
use App\Http\Requests\Series\SeriesUpdateRequest;
use App\Mail\SeriesCreated;
use App\Models\Series;
use App\Models\User;
use App\Repositories\SeriesRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SeriesController extends Controller
{

    public function __construct(
        private readonly SeriesRepository $seriesRepository
    ) {
        $this->middleware('authenticator')
            ->except('index');
    }

    public function index(): Factory|View|Application
    {
        $series = Series::all();
        $messageSuccess = session('message.success');

        return view('series.index', compact('series'))
            ->with('messageSuccess', $messageSuccess);
    }

    public function create(): Factory|View|Application
    {
        return view('series.create');
    }

    public function store(SeriesCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ($request->has('image')) {
            $coverPath = $request->file('image')
                ->store('series_cover', 'public');
            $data['image'] = $coverPath;
        }

        $serie = $this->seriesRepository->addSerieSeasonsEpisodes(data:  $data);
        SeriesCreatedEvent::dispatch(
            $request->name,
            $request->seasonsQuantity,
            $request->episodesPerSeason,
            $serie->id);

        return to_route('series.index')
            ->with('message.success', "Serie '{$serie->name}' adicionada com sucesso.");
    }

    public function destroy(Series $series): RedirectResponse
    {
        $series->delete();
        if ($series->image) {
            Storage::disk('public')->delete( $series->image);
        }
        return to_route('series.index')
            ->with('message.success', "Serie '{$series->name}' removida com sucesso.");
    }

    public function edit(Series $series): Factory|View|Application
    {
        return view('series.edit', compact('series'));
    }

    public function update(SeriesUpdateRequest $request, Series $series): RedirectResponse
    {
        $nameNotUpdate = $series->name;
        $data = $request->validated();
        $series->update($data);

        return to_route('series.index')
            ->with('message.success', "Series '{$nameNotUpdate}' alterada para '{$request->name}'");

    }
}
