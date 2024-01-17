<x-layout title="Nova serie">
    <form action="{{ route('users.create') }}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-12 mb-3">
                <label class="form-label" for="name">Nome</label>
                <input class="form-control @if($errors->first('name')) border-danger @else border-success @endif"
                       type="text"
                       name="name"
                       autofocus
                       id="name"
                       value="{{ old('name') }}">
                @if($errors->first('name'))
                    <p class="text-danger mt-1"> {{ $errors->first('name') }} </p>
                @endif
            </div>

            <div class="col-12 mb-3">
                <label class="form-label" for="email">E-mail</label>
                <input class="form-control @if($errors->first('email')) border-danger @else border-success @endif"
                       type="text"
                       name="email"
                       value="{{ old('email') }}"
                       id="email">
                @if($errors->first('email'))
                    <p class="text-danger mt-1"> {{ $errors->first('email') }} </p>
                @endif
            </div>

            <div class="col-12 mb-3">
                <label class="form-label" for="password">Senha</label>
                <input class="form-control @if($errors->first('password')) border-danger @else border-success @endif"
                       type="password"
                       name="password"
                       id="password">
                @if($errors->first('password'))
                    <p class="text-danger mt-1"> {{ $errors->first('password') }} </p>
                @endif
            </div>

            <div class="col-12 mb-3">
                <label class="form-label" for="password_confirmation">Confirmar senha</label>
                <input class="form-control @if($errors->first('password_confirmation')) border-danger @else border-success @endif"
                       type="password"
                       name="password_confirmation"
                       id="password_confirmation">
            </div>
        </div>

        <div>
            <button
                class="btn btn-primary"
                type="submit">Salvar</button>

            <a class="btn btn-secondary"
               href="{{ route('login') }}"> Cancelar</a>
        </div>
    </form>

</x-layout>
