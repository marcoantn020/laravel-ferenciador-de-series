@component('mail::message')

A serie **{{ $nameSerie }}** com {{ $quantitySeasons }} temporadas e {{ $episodesPerSeasons }} episodios por temporada foi criada.

Acesse aqui o botao abaixo e confira:

@component('mail::button', ['url' => route('seasons.index', $idSerie)])
    Ver serie
@endcomponent

@endcomponent
