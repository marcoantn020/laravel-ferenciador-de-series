<x-layout title="Episodios" :message-success="$messageSuccess">
    <form method="post">
        @csrf
        @method('PUT')
        <ul class="list-group">
            @foreach($episodes as $episode)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        Episodio {{ $episode->number }}

                        <label>
                            <input
                                type="checkbox"
                                name="episodes[]"
                                @if($episode->watched) checked @endif
                                value="{{ $episode->id }} ">
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
        <button class="btn btn-primary btn-sm mt-2" type="submit">Salvar</button>
    </form>
</x-layout>
