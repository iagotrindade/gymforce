<div>
    <section class="home-workouts-list default-flex-column">
        @foreach (Auth::user()->workouts as $workout)
            <a wire:click="openWorkout({{$workout->id}})">
                <div class="workout-item default-flex-column-end" style="background-image: url({{url("storage/{$workout->image->url}")}})">
                    <h3 class="mb-10">{{$workout->name}}</h3>
                    <p>Duração {{$workout->duration}}</p>
                </div>
            </a>
        @endforeach
    </section>

    @if (!empty($activeWorkout))
        <section class="selected-workout-area" style="display: {{$workoutDisplay}}">
            <div class="w-100" style="display: {{ $activeTab === 'workout' ? 'block' : 'none' }}">
                <div class="workout-student-header" style="background-image: url({{url("storage/{$activeWorkout->image->url}")}})">
                    <div class="workout-student-back-button">
                        <a wire:click="openWorkout(1)">
                            <i class='bx bxs-chevron-left'></i>
                        </a>
                    </div>

                    <div class="workout-student-info default-flex-between">
                        <div>
                            <h3 class="mb-10">{{$activeWorkout->name}}</h3>
                            <p>Duração {{$activeWorkout->duration}}</p>
                        </div>

                        <div class="finish-workout-button-area">
                            <p
                                @if ($canFinalizeWorkout == true)
                                    class="finish-workout-button-active default-flex" wire:confirm="Deseja finalizar seu treino?" wire:click="finishWorkout()"
                                @else
                                    class="finish-workout-button default-flex"
                                @endif>
                                Finalizar
                            </p>
                        </div>
                    </div>

                    <div class="completion-percentage-bar w-100">
                        <div class="percentage-completed" style="width: {{$exercisesDonePercent}}%;"></div>
                    </div>
                </div>

                <div class="student-workout-list">
                    @foreach ($activeWorkout->exercises as $workout)
                        <div class="student-workout-item default-flex-between">
                            <img src="{{url("storage/{$workout->exercise->media->url}")}}" alt="Imagem do Exercício" wire:click="openExerciseInfo({{$workout->exercise->id}})">

                            <div class="student-workout-item-texts" wire:click="openExerciseInfo({{$workout->exercise->id}})">
                                <p class="mb-10">{{$workout->exercise->name}}</p>
                                <p>{{$workout->exercise->rest}}</p>
                            </div>

                            <i  @if (in_array($workout->exercise->id, $markedItemIds))
                                    class='bx bxs-badge-check exercise-done-icon'
                                @else
                                    class='bx bxs-badge-check'
                                @endif
                                wire:confirm="Deseja marcar/desmarcar o exercício {{$workout->exercise->name}}" wire:click="finishExercise({{$workout->exercise->id}})">
                            </i>
                        </div>
                    @endforeach
                </div>
            </div>

            @if(!empty($activeExercise))
                <div class="studant-exercise-info default-flex-column" style="display: {{ $activeTab === 'exercise' ? 'flex' : 'none' }}">
                    <div class="workout-student-back-button p-0 mb-40">
                        <a wire:click="toggleTab('workout')">
                            <i class='bx bxs-chevron-left'></i>
                        </a>
                    </div>


                    <div class="exercise-info-name default-flex-column mb-30">
                        <h3>{{$activeExercise->name}}</h3>

                        <p>{{$activeExercise->rest}}</p>
                    </div>

                    <div class="exercise-media-area w-100 mb-20">
                        <img class="w-100" src="{{url("storage/{$activeExercise->media->url}")}}" alt="Imagem do Exercício">
                    </div>

                    <div class="exercise-info-boxes default-flex-column w-100">
                        <div class="default-flex-between w-100 mb-20">
                            <div class="minor-exercise-info-box default-flex-column w-95">
                                <h3>Series</h3>

                                <p>{{$activeExercise->workoutData->series}}</p>
                            </div>

                            <div class="minor-exercise-info-box default-flex-column w-95">
                                <h3>Repetições</h3>

                                <p>{{$activeExercise->workoutData->reps}}</p>
                            </div>
                        </div>

                        <div class="major-exercise-info-box default-flex-column w-100 mb-20">
                            <h3>Peso recomendado</h3>

                            <p>{{$activeExercise->workoutData->reccomended_weight}}</p>
                        </div>

                        <div class="finish-exercise-button-area w-100">
                            <button class="w-100" wire:confirm="Deseja marcar/desmarcar o exercicio {{$activeExercise->name}}" wire:click="finishExercise({{$activeExercise->id}})">Concluir</button>
                        </div>
                    </div>
                </div>
            @endif
        </section>
    @endif


</div>
