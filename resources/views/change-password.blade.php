<x-layouts.auth-layout page="">
    <section class="change-password-tab-area default-flex-column w-100">
        <div class="login-back-button default-flex-start w-100" wire:click="backToChoiceLogin()" style="margin-bottom: 280px">
            <i class='bx bx-chevron-left'></i>
            <a href="{{route('login')}}">Voltar</a>
        </div>

        <div class="confirm-login-form-title mb-40">
            <p>Informe abaixo sua nova senha</p>
        </div>

        <x-forms.change-password-form></x-forms.change-password-form>
    </section>
</x-layouts.auth-layout>
