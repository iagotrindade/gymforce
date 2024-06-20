<div class="w-100">
    <section class="initial-loading-screen default-flex" style="display: {{ $loadingScreen }}; background-image: url({{url('assets/images/backgrounds/loading-bk.png')}});">
        <img src="{{url('assets/images/logos/gymforce.png')}}" alt="">
    </section>

    <section class="login-choice-area default-flex-column-end" style="background-image: url({{url('assets/images/backgrounds/login-choice-bk.png')}}); display: {{ $tabDisplay['choseLogin'] }}">
        <div class="login-choice-info-area default-flex-column">
            <h1>Prepare-se para elevar seus treinos a um novo nível!</h1>

            <p>Faça login agora para acessar suas fichas de treino personalizadas e desbloquear o potencial máximo do seu corpo. Junte-se a nós e comece a trilhar o caminho rumo aos seus objetivos de fitness hoje mesmo!</p>
        </div>

        <div class="login-choice-buttons default-flex-around w-100">
            <button class="change-login-tab-button @if ($chosenTab === 'professor') login-active @endif" wire:click="changeLoginTab('teacher')">Professor</button>
            <button class="change-login-tab-button @if ($chosenTab === 'aluno') login-active @endif" wire:click="changeLoginTab('student')">Aluno</button>
        </div>
    </section>

    <section class="teacher-login-tab-area default-flex-column" style="display: {{ $tabDisplay['teacher'] }}">
        <div class="login-back-button default-flex-start w-100" wire:click="backToChoiceLogin()" style="margin-bottom: 100px">
            <i class='bx bx-chevron-left'></i>
            Voltar
        </div>

        <div class="login-form-title">
            <h3>Login</h3>
        </div>

        <x-forms.teacher-login-form></x-forms.teacher-login-form>
    </section>

    <section class="student-login-tab-area default-flex-column" style="display: {{ $tabDisplay['student'] }}">
        <div class="login-back-button default-flex-start w-100" wire:click="backToChoiceLogin()">
            <i class='bx bx-chevron-left'></i>
            Voltar
        </div>

        <div class="login-form-texts-area">
            <h2>Desbloqueie todo seu Potencial!</h2>

            <p>Digite Sua Matrícula e Vá Além !</p>
        </div>

        <div class="login-form-title">
            <h3>Login</h3>
        </div>

        <x-forms.student-login-form></x-forms.student-login-form>
    </section>

    <section class="confirm-login-tab-area default-flex-column"  style="display: {{ $tabDisplay['confirmLogin'] }}">
        <div class="login-back-button default-flex-start w-100" wire:click="backToChoiceLogin()" style="margin-bottom: 100px">
            <i class='bx bx-chevron-left'></i>
            Voltar
        </div>

        <div class="confirm-login-form-title mb-40">
            <p>Nós encaminhamos um código para o email cadastrado, insira-o abaixo</p>
        </div>

        <x-forms.confirm-login-form></x-forms.confirm-login-form>
    </section>

    <section class="forgot-password-tab-area default-flex-column" style="display: {{ $tabDisplay['forgotPass'] }}">
        <div class="login-back-button default-flex-start w-100" wire:click="backToChoiceLogin()" style="margin-bottom: 100px">
            <i class='bx bx-chevron-left'></i>
            Voltar
        </div>

        <div class="confirm-login-form-title mb-40">
            <p>Digite seu e-mail</p>
        </div>

        <x-forms.forgot-password-form></x-forms.forgot-password-form>

        @script
            <script>
                $wire.on('sendLoginToken', () => {
                    var countdownElement = document.getElementById('countdown');
                    var countdownLink = document.getElementById('countdown-link');

                    var endTime = new Date();
                    endTime.setMinutes(endTime.getMinutes() + 1);

                    function updateCountdown() {
                        var now = new Date();
                        var distance = endTime - now;

                        if (distance <= 0) {
                            clearInterval(intervalId);
                            countdownElement.innerHTML = "";

                            countdownLink.classList.add('re-send-verification-code-active');
                            countdownLink.setAttribute('wire:click', 'sendLoginToken');

                            return;
                        }

                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;

                        countdownElement.innerHTML = minutes + ":" + seconds;
                    };

                    updateCountdown();
                    var intervalId = setInterval(updateCountdown, 1000);
                });
            </script>
        @endscript
    </section>
</div>
