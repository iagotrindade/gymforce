<div>
    <section class="students-top-area default-flex-between mb-20">
        <h3>Exercícios</h3>

        <select name="" id="">
            <option value="all">Todos</option>
            <option value="recent">Recentes</option>
            <option value="active">Ativos</option>
            <option value="inactive">Inativos</option>
        </select>
    </section>

    <section class="exercises-list-area default-flex-column">
        <div class="exercise-list-item mb-20 default-flex-between w-100" wire:click="editExercise">
            <img src="{{url('assets/images/exercises/exercise.png')}}" alt="Imagem do Exercício">
            <div class="exercise-list-item-info default-flex-column">
                <h4 class="mb-20">Agachamento com Peso</h4>

                <p>01:00</p>
            </div>

            <i class='bx bxs-trash-alt'></i>
        </div>

        <div class="add-new-exercise-button-area default-flex" wire:click="addExercise()">
            <i class='bx bx-plus'></i>
        </div>
    </section>

    <section class="add-exercise-modal default-flex-column" style="display: {{$addExerciseDisplay}}">
        <div class="workout-student-back-button mb-20 w-100" style="padding: 0;" wire:click="addExercise()">
            <div class="default-flex-start">
                <i class='bx bxs-chevron-left'></i>
                <p>Voltar</p>
            </div>
        </div>

        <x-forms.add-exercise-form></x-forms.add-exercise-form>
    </section>

    <section class="add-exercise-modal default-flex-column" style="display: {{$editExerciseDisplay}}">
        <div class="workout-student-back-button mb-20 w-100" style="padding: 0;" wire:click="addExercise()">
            <div class="default-flex-start">
                <i class='bx bxs-chevron-left'></i>
                <p>Voltar</p>
            </div>
        </div>

        <x-forms.edit-exercise-form></x-forms.edit-exercise-form>
    </section>
</div>
