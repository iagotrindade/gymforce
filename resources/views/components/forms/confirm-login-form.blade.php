<form action="" class="student-login-form w-100" wire:submit="confirmLogin">
    <div class="form-error">
        @error('token') <span>* {{ $message }}</span> @enderror
    </div>

    <div class="default-flex ">
        <div class="confirm-login-input-container w-100 mb-20">
            <input type="text" maxlength="1" class="confirm-login-input-box" id="digit1" oninput="focusNext(this)" wire:model="confirmDigits.0">
            <input type="text" maxlength="1" class="confirm-login-input-box" id="digit2" oninput="focusNext(this)" wire:model="confirmDigits.1">
            <input type="text" maxlength="1" class="confirm-login-input-box" id="digit3" oninput="focusNext(this)" wire:model="confirmDigits.2">
            <input type="text" maxlength="1" class="confirm-login-input-box" id="digit4" oninput="focusNext(this)" wire:model="confirmDigits.3">
            <input type="text" maxlength="1" class="confirm-login-input-box" id="digit5" oninput="focusNext(this)" wire:model="confirmDigits.4">
            <input type="text" maxlength="1" class="confirm-login-input-box" id="digit6" wire:model="confirmDigits.5">
        </div>
    </div>

    <div class="re-send-verification-code mb-20 default-flex-start">
        <p id="countdown-link">Reenviar código <span id="countdown"></span></p>
    </div>

    <div class="login-button-area" style="margin-bottom: 260px">
        <button class="w-100" type="submit">Enviar</button>
    </div>
</form>

<div class="questions-link-area default-flex">
    <p>Dúvidas ou Problemas?</p>
    <a href="">Falar no WhastApp</a>
</div>
