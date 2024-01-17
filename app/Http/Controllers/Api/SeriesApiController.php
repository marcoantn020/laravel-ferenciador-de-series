<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Series\SeriesCreateRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SeriesApiController extends Controller
{
    public function __construct(
        public SeriesRepository $seriesRepository
    ) {
    }

    public function index(Request $request)
    {
        $query = Series::query();
        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        return $query->paginate(3);

    }

    public function show(int $id)
    {
        $series = Series::with('seasons.episodes')->findOrFail($id);
        return response()
            ->json($series);
    }

    public function store(SeriesCreateRequest $request)
    {
        return response()
            ->json($this->seriesRepository->addSerieSeasonsEpisodes($request->validated()), 201);
    }

    public function update(Series $series, Request $request)
    {
        Series::where('id', $series)->update($request->all());

        return response()
            ->json($series);
    }

    public function destroy(int $series)
    {
        Series::destroy($series);
        return response()->noContent();
    }
}
