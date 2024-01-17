<x-layout>

    <form
          action="{{ route('login.store') }}"
          class="d-flex justify-content-center align-items-center flex-column"
          method="post">

        <h1 class="text-center">Login</h1>

        @if($errors->get('loginFail'))
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger col-6">{{ $error }}</div>
            @endforeach
        @endif


        @csrf
            <div class="col-6">
                <label class="form-label" for="email">E-mail</label>
                <input class="form-control @if($errors->first('email')) border-danger @else border-success @endif"
                       type="text"
                       name="email"
                       autofocus
                       id="name"
                       value="{{ old('email') }}"
                       placeholder="Informe seu email">
                @if($errors->first('email'))
                    <p class="text-danger mt-1"> {{ $errors->first('email') }} </p>
                @endif
            </div>

            <div class="col-6">
                <label class="form-label" for="password">Senha</label>
                <input class="form-control @if($errors->first('password')) border-danger @else border-success @endif"
                       type="password"
                       name="password"
                       value="12345678"
                       placeholder="********"
                       id="password">
                @if($errors->first('password'))
                    <p class="text-danger mt-1"> {{ $errors->first('password') }} </p>
                @endif
            </div>


            <button
                class="btn btn-primary col-6 mt-2"
                type="submit">Login</button>

            <a class="btn btn-secondary col-6 mt-2"
               href="{{ route('users.create') }}"> Registre-se</a>

    </form>


</x-layout>
