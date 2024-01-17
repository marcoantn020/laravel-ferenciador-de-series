<x-layout title="Temporadas {!! $series->name !!}">
    @if($series->image)
        <div class="text-center">
            <img class="mr-2" src="{{ asset('storage/' . $series->image) }}" width="200">
        </div>
    @endif
    <a href="{{ route('series.index') }}" class="btn btn-dark mb-2">Voltar</a>
    <ul class="list-group">
        @foreach($seasons as $season)
            <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('episodes.index', $season->id) }}">
                        Temporada {{ $season->number }}
                    </a>

                    <span class="badge bg-secondary">
                        {{ $season->numberOfWatchedEpisodes()}} /
                        {{ $season->episodes->count() }}
                    </span>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
