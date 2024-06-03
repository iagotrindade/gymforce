<div>
    <section class="students-top-area default-flex-between mb-20">
        <h3>Exercícios</h3>

        <select name="" id="" wire:change="filterExercise($event.target.value)">
            <option value="all">Todos</option>
            <option value="recent">Recentes</option>
        </select>
    </section>

    <div class="form-error">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <section class="exercises-list-area default-flex-column">
        @if($exercises->isNotEmpty() == true)
            @foreach ($exercises as $exercise)
                <div class="exercise-list-item mb-20 default-flex-between w-100">
                    <img src="{{url("storage/{$exercise->media->url}")}}" alt="Imagem do Exercício" wire:click="editExercise({{$exercise->id}})">
                    <div class="exercise-list-item-info default-flex-column" wire:click="editExercise({{$exercise->id}})">
                        <h4 class="mb-20">{{$exercise->name}}</h4>

                        <p>{{$exercise->rest}}</p>
                    </div>

                    <i class='bx bxs-trash-alt' wire:confirm="Tem certeza que deseja excluir este exercício?" wire:click="deleteExercise({{$exercise->id}})"></i>
                </div>
            @endforeach
        @else
            <p class="white-font-color default-flex-start w-100">Nenhum exercício cadastrado</p>
        @endif

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

    @if(!empty($editedExercise))
        <section class="add-exercise-modal default-flex-column" style="display: {{$editExerciseDisplay}}">
            <div class="workout-student-back-button mb-20 w-100" style="padding: 0;" wire:click="addExercise()">
                <div class="default-flex-start">
                    <i class='bx bxs-chevron-left'></i>
                    <p>Voltar</p>
                </div>
            </div>

            <x-forms.edit-exercise-form :exercise="$editedExercise"></x-forms.edit-exercise-form>
        </section>
    @endif

</div>
