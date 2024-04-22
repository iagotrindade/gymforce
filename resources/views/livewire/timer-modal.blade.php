<div>
    <section class="timer-modal-area default-flex-column" style="display: {{$modalDisplay}}">
      <div class="timer-content-area">
        <div class="close-timer-button-area default-flex-end">
          <i class='bx bx-x' wire:click="changeModalDisplay()"></i>
        </div>

        <div class="timer-main-area default-flex-column">
          <img class="mb-20" src="{{ url('assets/images/icons/timer.png') }}" alt="Cronômetro">

          <p class="timer-count mb-30" id="timer">00:00.<span class="small">00</span></p>

          <div class="timer-control-area default-flex-between">
            <button class="timer-control-button" id="stopButton">Parar</button>
            <button class="timer-control-button timer-control-active start-timer-button" id="startButton">Iniciar</button>
            <button class="timer-control-button" id="resetButton">Redefinir</button>
          </div>
        </div>
      </div>

    </section>
  </div>
