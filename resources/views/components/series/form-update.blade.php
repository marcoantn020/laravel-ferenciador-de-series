<form action="{{ $action }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label" for="name">Nome</label>
        <input class="form-control"
               type="text"
               name="name"
               value="{{ $name }}"
               id="name"
               placeholder="Informe o nome da serie">
        @if($errors->first('name'))
            <p class="text-danger mt-1"> {{ $errors->first('name') }} </p>
        @endif
    </div>

    <div>
        <button
            class="btn btn-primary"
            type="submit">Salvar</button>

        <a class="btn btn-secondary"
           href="{{ route('series.index') }}"> Cancelar</a>
    </div>
</form>
