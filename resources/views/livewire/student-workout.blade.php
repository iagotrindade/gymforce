<div>
    <section style="display: {{ $activeTab === 'workout' ? 'block' : 'none' }}">
        <div class="workout-student-header" style="background-image: url({{url('assets/images/workouts/back-workout.png')}})">
            <div class="workout-student-back-button">
                <a href="{{route('home')}}">
                    <i class='bx bxs-chevron-left'></i>
                </a>
            </div>

            <div class="workout-student-info default-flex-between">
                <div>
                    <h3 class="mb-10">Treino A</h3>
                    <p>90 min | Ter/Qui/Sab</p>
                </div>

                <div class="finish-workout-button-area">
                    <p class="finish-workout-button default-flex">Finalizar</p>
                </div>
            </div>

            <div class="completion-percentage-bar w-100">
                <div class="percentage-completed" style="width: 35%;"></div>
            </div>
        </div>

        <div class="student-workout-list">
            <div class="student-workout-item default-flex-between" wire:click="toggleTab('exercise')">
                <img src="{{url('assets/images/exercises/exercise.png')}}" alt="">

                <div class="student-workout-item-texts">
                    <p class="mb-10">Agachamento com peso</p>
                    <p>01:00</p>
                </div>

                <i class='bx bxs-badge-check'></i>
            </div>
        </div>
    </section>

    <section class="studant-exercise-info default-flex-column" style="display: {{ $activeTab === 'exercise' ? 'flex' : 'none' }}">
        <div class="workout-student-back-button p-0 mb-40">
            <a wire:click="toggleTab('workout')">
                <i class='bx bxs-chevron-left'></i>
            </a>
        </div>


        <div class="exercise-info-name default-flex-column mb-30">
            <h3>Agachamento com Peso</h3>

            <p>01:00</p>
        </div>

        <div class="exercise-media-area w-100 mb-20">
            <img class="w-100" src="{{url('assets/images/exercises/exercise-teste.png')}}" alt="Imagem do Exercício">
        </div>

        <div class="exercise-info-boxes default-flex-column w-100">
            <div class="default-flex-between w-100 mb-20">
                <div class="minor-exercise-info-box default-flex-column w-95">
                    <h3>Series</h3>

                    <p>3x ~ 5x</p>
                </div>

                <div class="minor-exercise-info-box default-flex-column w-95">
                    <h3>Repetições</h3>

                    <p>15 ~ 20x</p>
                </div>
            </div>

            <div class="major-exercise-info-box default-flex-column w-100 mb-20">
                <h3>Peso recomendado</h3>

                <p>30Kg ~ 45Kg</p>
            </div>

            <div class="finish-exercise-button-area w-100">
                <button class="w-100" wire:click="finishExercise()">Concluir</button>
            </div>
        </div>
    </section>
</div>
