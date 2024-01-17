<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col-6">
            <label class="form-label" for="name">Nome</label>
            <input class="form-control @if($errors->first('name')) border-danger @else border-success @endif"
                   type="text"
                   name="name"
                   autofocus
                   id="name"
                   value="{{ old('name') }}"
                   placeholder="Informe o nome da serie">
            @if($errors->first('name'))
                <p class="text-danger mt-1"> {{ $errors->first('name') }} </p>
            @endif
        </div>

        <div class="col-3">
            <label class="form-label" for="seasonsQuantity">Nº Temporadas</label>
            <input class="form-control @if($errors->first('seasonsQuantity')) border-danger @else border-success @endif"
                   type="text"
                   name="seasonsQuantity"
                   value="{{ old('seasonsQuantity') }}"
                   id="seasonsQuantity">
            @if($errors->first('seasonsQuantity'))
                <p class="text-danger mt-1"> {{ $errors->first('seasonsQuantity') }} </p>
            @endif
        </div>

        <div class="col-3">
            <label class="form-label" for="episodesPerSeason">Eps / Temporadas</label>
            <input class="form-control @if($errors->first('episodesPerSeason')) border-danger @else border-success @endif"
                   type="text"
                   name="episodesPerSeason"
                   value="{{ old('episodesPerSeason') }}"
                   id="episodesPerSeason">
            @if($errors->first('episodesPerSeason'))
                <p class="text-danger mt-1"> {{ $errors->first('episodesPerSeason') }} </p>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <label for="image">Capa</label>
            <input
                accept="image/png, image/jpeg, image/jpg"
                type="file"
                class="form-control"
                name="image" id="image">
            @if($errors->first('image'))
                <p class="text-danger mt-1"> {{ $errors->first('image') }} </p>
            @endif
        </div>
    </div>
    <div>
        <button
            class="btn btn-primary"
            type="submit">Salvar</button>

        <a class="btn btn-secondary"
           href="{{ route('series.index') }}"> Cancelar</a>
    </div>
</form>
