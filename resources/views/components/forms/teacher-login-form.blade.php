<form action="" class="teacher-login-form w-100">
    <div class="login-input-box default-flex-column">
        <label for="registration">E-mail</label>
        <input class="w-100" type="text" name="registration" placeholder="seu-email@gmail.com">
    </div>

    <div class="login-input-box default-flex-column">
        <label for="registration">Senha</label>
        <input class="w-100" type="password" name="password">
    </div>
        
    <div class="default-flex-between mb-40">
        <div class="remember-input-area default-flex-start m-0">
            <input class="" type="checkbox" name="remember">
            <label for="remember">Lembrar Usuário</label>
        </div>

        <p class="forgot-password-link" wire:click="changeLoginTab('forgotPass')">Esqueceu a senha?</p>
    </div>
        

    <div class="login-button-area">
        <button class="w-100" type="submit">Entrar</button>
    </div>
</form>

<div class="questions-link-area default-flex" style="margin-top: 200px">
    <p>Dúvidas ou Problemas?</p>
    <a href="">Falar no WhastApp</a>
</div>