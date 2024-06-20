<form action="" class="teacher-login-form w-100" wire:submit="forgotPass">
    <div class="form-error">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="login-input-box default-flex-column mb-20">
        <label for="registration">E-mail</label>
        <input class="w-100" type="text" name="registration" placeholder="Ex: seu-email@gmail.com" wire:model="email">
    </div>

    <div class="login-button-area">
        <button class="w-100" type="submit">Enviar</button>
    </div>
</form>

<div class="questions-link-area default-flex" style="margin-top: 200px">
    <p>Dúvidas ou Problemas?</p>
    <a href="">Falar no WhastApp</a>
</div>
