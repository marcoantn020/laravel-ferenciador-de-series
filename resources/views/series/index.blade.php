<x-layout title="Series" :message-success="$messageSuccess">
    @auth
        <a class="btn btn-dark mb-2" href="{{ route('series.create') }}">Nova serie</a>
    @endauth

    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item">

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <img class="image-fluid me-3" src="{{ asset('storage/' . $serie->image) }}" width="50">

                        @auth
                            <a href="{{ route('seasons.index', $serie->id) }}">  @endauth
                                {{ $serie->name }}
                                @auth </a>
                        @endauth
                    </div>

                    @auth
                        <div class="d-flex justify-content-between align-items-center gap-2">
                            <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-info btn-sm">Editar</a>
                            <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Deletar</button>
                            </form>
                        </div>
                    @endauth
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
