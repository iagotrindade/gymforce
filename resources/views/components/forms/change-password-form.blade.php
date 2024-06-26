<form class="teacher-login-form w-100" method="POST" action="{{route('password.update')}}">
    @csrf

    <div class="form-error">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <input type="hidden" name="email" id="">

    <input type="hidden" name="token" value="{{$token}}">

    <div class="login-input-box default-flex-column">
        <label for="password">Email</label>
        <input class="w-100" type="email" name="email" placeholder="">
    </div>

    <div class="login-input-box default-flex-column">
        <label for="password">Nova senha</label>
        <input class="w-100" type="password" name="password" placeholder="">
    </div>

    <div class="login-input-box default-flex-column">
        <label for="password_confirmation">Repita a senha</label>
        <input class="w-100" type="password" name="password_confirmation">
    </div>

    <div class="login-button-area">
        <button class="w-100" type="submit">Confirmar</button>
    </div>
</form>

<div class="questions-link-area default-flex" style="margin-top: 150px">
    <p>Dúvidas ou Problemas?</p>
    <a href="">Falar no WhastApp</a>
</div>
