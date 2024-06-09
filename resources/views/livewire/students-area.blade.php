<div>
    <section class="students-top-area default-flex-between mb-20">
        <h3>Alunos</h3>

        <select name="" id="" wire:change="filterStudents($event.target.value)">
            <option value="all">Todos</option>
            <option value="recent">Recentes</option>
            <option value="active">Ativos</option>
            <option value="inactive">Inativos</option>
            <option value="teacher">Professores</option>
            <option value="student">Alunos</option>
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

    <section class="students-list-area">
        @foreach ($users as $user)
            <div class="student-list-item default-flex-between" wire:click="manageStudent({{$user->id}})">
                <div class="student-list-item-left default-flex">
                    <img src="{{url("storage/{$user->image->url}")}}" alt="Imagem do Aluno">
                    <p>{{$user->name}}</p>
                </div>

                <div class="student-list-item-right default-flex-column">
                    <p>{{$user->status}}</p>
                    <i class="bx bxs-circle @if($user->status == 'Ativo') student-active @endif"></i>
                </div>
            </div>
        @endforeach
    </section>

    @hasanyrole('Super-Admin|admin|teacher')
        <div class="add-new-student-button-area default-flex" wire:click="addStudent()">
            <i class='bx bx-plus'></i>
        </div>
    @endrole

    @if(!empty($userEdited))
        <section class="manage-student-global-area" style="display: {{$manageDisplay}}">
            <div class="student-teacher-header default-flex-column" >
                <div class="login-back-button default-flex-start w-100  mb-40" wire:click="manageStudent()">
                    <i class='bx bx-chevron-left'></i>
                    Voltar
                </div>
            </div>

            <div class="change-manage-student-tab-area">
                <div class="change-manage-tab-buttons-area default-flex-between mb-20">
                    <p class="change-manage-tab-button default-flex w-100 {{ $activeManageTab === 'profile' ? 'change-manage-tab-button-active' : '' }}" wire:click="changeManageTab('profile')">Perfil</p>
                    <p class="change-manage-tab-button default-flex w-100 {{ $activeManageTab === 'workout' ? 'change-manage-tab-button-active' : '' }}" wire:click="changeManageTab('workout')">Treino</p>
                </div>
            </div>

            <div class="student-profile-area" style="display: {{ $activeManageTab === 'profile' ? 'block' : 'none' }}; margin-bottom: 80px;">
                <div class="student-profile-head mb-30 default-flex-between">
                    <div class="default-flex">
                        <div class="student-profile-image-area">
                            <img src="{{url("storage/{$userEdited->image->url}")}}" alt="Imagem do Aluno">
                        </div>

                        <div class="student-profile-personal-info-area default-flex-column">
                            <p class="student-profile-plan-info mb-10">Plano R$ {{$userEdited->plan}}</p>

                            <div class="default-flex">
                                <h3 class="student-profile-name mb-10">{{$userEdited->name}}</h3>
                                <p class="student-profile-age">{{$userEdited->age}} anos</p>
                            </div>

                            <p class="student-profile-id"><strong>ID</strong> {{$userEdited->inscription}}</p>
                        </div>
                    </div>

                    @if ($userEdited->hasanyrole('Super-Admin|admin|'))
                        @hasanyrole('Super-Admin|admin|')
                            <div class="edit-profile-button-area">
                                <i class='bx bxs-pencil' wire:click="openEditProfileModal()"></i>
                            </div>
                        @endhasanyrole
                    @else
                        @hasanyrole('Super-Admin|admin|teacher')
                            <div class="edit-profile-button-area">
                                <i class='bx bxs-pencil' wire:click="openEditProfileModal()"></i>
                            </div>
                        @endhasanyrole
                    @endif
                </div>

                @if ($userEdited->hasRole('student'))
                    <div class="student-profile-statistics mb-30">
                        <h3 class="mb-20">Estatísticas</h3>

                        <div class="statistics-boxes-area">
                            <div class="default-flex-between mb-10">
                                <div class="statistic-box height-box default-flex-column">
                                    <p>ALTURA</p>
                                    <p>{{$userEdited->statistics->height}} mm</p>
                                </div>

                                <div class="statistic-box weight-box default-flex-column">
                                    <p>PESO</p>
                                    <p>{{$userEdited->statistics->weight}} kg</p>
                                </div>

                                <div class="statistic-box imc-box default-flex-column" style="border-bottom: 3px solid {{$this->calcImc($userEdited->statistics->imc)}};">
                                    <p>IMC</p>
                                    <p>{{$userEdited->statistics->imc}}</p>
                                </div>
                            </div>

                            <div class="large-statistic-box measures-box w-100 default-flex-column">
                                <p class="mb-10">Medidas (Cm)</p>

                                <table class="measures-table w-100">
                                    <thead style="text-align:center">
                                        <tr>
                                            <th>Cintura</th>
                                            <th>Quadril</th>
                                            <th>Braço</th>
                                            <th>Pernas</th>
                                            <th>Coxas</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>{{$userEdited->statistics->waist}}</td>
                                            <td>{{$userEdited->statistics->hip}}</td>
                                            <td>{{$userEdited->statistics->arms}}</td>
                                            <td>{{$userEdited->statistics->legs}}</td>
                                            <td>{{$userEdited->statistics->thighs}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="change-profile-tab-buttons-area mb-20">
                        <button class="change-profile-tab-button {{ $activeTab === 'weight' ? 'change-profile-tab-button-active' : '' }}" wire:click="changeProfileTab('weight')">Peso</button>
                        <button class="change-profile-tab-button {{ $activeTab === 'progress' ? 'change-profile-tab-button-active' : '' }}" wire:click="changeProfileTab('progress')">Progesso</button>
                    </div>

                    <div class="weight-imc-tab" style="display: {{ $activeTab === 'weight' ? 'block' : 'none' }}">
                        <div class="weight-progess-area default-flex mb-20">
                            <h3>{{$userEdited->weightHistoric->slice(-2, 1)->first()->weight}}Kg</h3>

                            <p>{{\Carbon\Carbon::parse($userEdited->weightHistoric->slice(-2, 1)->first()->created_at)->format('d/m')}} á {{\Carbon\Carbon::parse($userEdited->weightHistoric->last()->created_at)->format('d/m')}}</p>

                            <h3>{{$userEdited->weightHistoric->last()->weight}}Kg</h3>
                        </div>

                        <div class="weight-history-line-area default-flex mb-30">
                            @foreach ($userEdited->weightHistoric as $historicItem)
                                <div class="weight-history-line-area-item default-flex-column">
                                    <p class="history-line-weight-info mb-10">{{$historicItem->weight}}Kg</p>

                                    <div class="line-area default-flex-column mb-10">
                                        <div class="primary-line primary-line-active"></div>
                                        <div class="line-point primary-line-active"></div>
                                    </div>

                                    <p class="history-line-date-info">{{\Carbon\Carbon::parse($historicItem->created_at)->format('d/m')}}</p>
                                </div>
                            @endforeach
                        </div>

                        <div class="student-imc-area">
                            <h3 class="mb-10">Interpretação do IMC</h3>

                            <p class="white-font-color mb-10">*Apenas para referência básica</p>

                            <div class="imc-reference-table-area">
                                <table class="imc-table w-100">
                                    <thead style="text-align:left">
                                        <tr>
                                            <th>IMC</th>
                                            <th>Classificação</th>
                                            <th>Grau</th>
                                            <th>Legenda</th>
                                        </tr>
                                    </thead>

                                    <tbody style="text-align:left">
                                        <tr>
                                            <td>Menor que 18.5</td>
                                            <td>Magreza</td>
                                            <td style="text-align:center">0</td>
                                            <td style="text-align:center">
                                                <i class='bx bxs-circle bx-rotate-90' style='color:#48cae4'></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Entre 18.5 e 24.9</td>
                                            <td>Normal</td>
                                            <td style="text-align:center">0</td>
                                            <td style="text-align:center">
                                                <i class='bx bxs-circle bx-rotate-90' style='color:#00b4d8'></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Entre 25.0 e 29.9</td>
                                            <td>Sobrepeso</td>
                                            <td style="text-align:center">I</td>
                                            <td style="text-align:center">
                                                <i class='bx bxs-circle bx-rotate-90' style='color:#0096C7'></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Entre 30.0 e 39.9</td>
                                            <td>Obesidade</td>
                                            <td style="text-align:center">II</td>
                                            <td style="text-align:center">
                                                <i class='bx bxs-circle bx-rotate-90' style='color:#0077B6;'></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Maior que 40.0</td>
                                            <td>Obesidade Grave</td>
                                            <td style="text-align:center">III</td>
                                            <td style="text-align:center">
                                                <i class='bx bxs-circle bx-rotate-90' style='color:#023E8A'></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="progress-tab" style="display: {{ $activeTab === 'progress' ? 'block' : 'none' }}">
                        <h3 class="progress-tab-title mb-10">{{ucfirst(\Carbon\Carbon::now()->locale('pt_BR')->monthName)}}</h3>
                        <p class="progress-tab-month mb-30">{{Carbon\Carbon::now()->startOfMonth()->format('d/m') . ' á ' . Carbon\Carbon::now()->endOfMonth()->format('d/m')}}</p>

                        <div class="training timeline-area default-flex-column">
                            @foreach ($userEdited->workouts as $workout)
                                <div class="training-timeline-item mb-20">
                                    <p class="training-timeline-item-title mb-10">{{$workout->name}}</p>

                                    <div class="default-flex">
                                        <div class="training-history-line-area-item default-flex-column">
                                            <div class="line-area default-flex-column mb-10">
                                                <div class="primary-line @foreach ($userEditedWorkoutProgress as $progressItem)
                                                    @if ($progressItem->workout_id == $workout->id && $progressItem->week == '1') primary-line-active primary-line-active @endif
                                                @endforeach"></div>
                                                <div class="line-point @foreach ($userEditedWorkoutProgress as $progressItem)
                                                    @if ($progressItem->workout_id == $workout->id && $progressItem->week == '1') primary-line-active primary-line-active @endif
                                                @endforeach"></div>
                                            </div>

                                            <p class="history-line-date-info">Semana 1</p>
                                        </div>

                                        <div class="training-history-line-area-item default-flex-column">
                                            <div class="line-area default-flex-column mb-10">
                                                <div class="primary-line @foreach ($userEditedWorkoutProgress as $progressItem)
                                                    @if ($progressItem->workout_id == $workout->id && $progressItem->week == '2') primary-line-active primary-line-active @endif
                                                @endforeach"></div>
                                                <div class="line-point @foreach ($userEditedWorkoutProgress as $progressItem)
                                                    @if ($progressItem->workout_id == $workout->id && $progressItem->week == '2') primary-line-active primary-line-active @endif
                                                @endforeach"></div>
                                            </div>

                                            <p class="history-line-date-info">Semana 2</p>
                                        </div>

                                        <div class="training-history-line-area-item default-flex-column">
                                            <div class="line-area default-flex-column mb-10">

                                                <div class="primary-line @foreach ($userEditedWorkoutProgress as $progressItem)
                                                    @if ($progressItem->workout_id == $workout->id && $progressItem->week == '3') primary-line-active primary-line-active @endif
                                                @endforeach"></div>
                                                <div class="line-point @foreach ($userEditedWorkoutProgress as $progressItem)
                                                    @if ($progressItem->workout_id == $workout->id && $progressItem->week == '3') primary-line-active primary-line-active @endif
                                                @endforeach"></div>

                                            </div>

                                            <p class="history-line-date-info">Semana 3</p>
                                        </div>

                                        <div class="training-history-line-area-item default-flex-column">
                                            <div class="line-area default-flex-column mb-10">
                                                <div class="primary-line @foreach ($userEditedWorkoutProgress as $progressItem)
                                                    @if ($progressItem->workout_id == $workout->id && $progressItem->week == '4') primary-line-active primary-line-active @endif
                                                @endforeach"></div>
                                                <div class="line-point @foreach ($userEditedWorkoutProgress as $progressItem)
                                                    @if ($progressItem->workout_id == $workout->id && $progressItem->week == '4') primary-line-active primary-line-active @endif
                                                @endforeach"></div>
                                            </div>

                                            <p class="history-line-date-info">Semana 4</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if(!empty($userEdited))
                    <div class="edit-profile-modal" style="display: {{$editStudentModalDisplay}};">
                        <div class="close-edit-profile-modal-area w-100">
                            <div class="default-flex-end w-100">
                                <i class='bx bx-x'  wire:click="openEditProfileModal()"></i>
                            </div>

                            <div class="edit-profile-image default-flex-column mb-30">
                                <img class="mb-10" src="{{url("storage/{$userEdited->image->url}")}}" alt="Imagem do Aluno" id="previewImage">

                                <p onclick="updateImage()">Carregar Foto</p>
                            </div>

                            @if($userEdited->hasRole('student'))
                                <div class="edit-profile-form-area">
                                    <x-forms.edit-profile-form :user="$userEdited">
                                        <x-slot:adminFoneEdit>
                                            <div class="default-flex-between mb-10">
                                                <div class="edit-profile-input-box default-flex-column w-45">
                                                <label for="whatsapp">Whatsapp</label>
                                                <input class="w-100" type="text" name="whatsapp" value="{{$userEdited->whatsapp}}">
                                            </div>

                                            <div class="edit-profile-input-box default-flex-column w-50">
                                                <label for="phone">Número</label>
                                                <input class="w-100" type="text" name="phone" value="{{$userEdited->phone}}">
                                                </div>
                                            </div>
                                        </x-slot:adminFoneEdit>

                                        <x-slot:adminEditPlan>
                                            <div class="default-flex-between mb-20">
                                                <div class="edit-profile-input-box default-flex-column w-70">
                                                    <label for="plan">Plano</label>
                                                    <input class="w-100" type="text" name="plan" value="{{$userEdited->plan}}">
                                                </div>

                                                <div class="edit-profile-input-box default-flex-column w-25">
                                                    <label for="plan_date">Data</label>
                                                    <input class="w-100" type="date" name="plan_date" value="{{$userEdited->plan_date}}">
                                                </div>
                                            </div>
                                        </x-slot:adminEditPlan>
                                    </x-forms.edit-profile-form>
                                </div>
                            @else
                                <x-forms.edit-teacher-form :user="$userEdited"></x-forms.edit-teacher-form>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            @if($userEdited->hasRole('student'))
                <div class="manage-student-workout" style="display: {{ $activeManageTab === 'workout' ? 'block' : 'none' }}; margin-bottom: 80px;">
                    <h3 class="manage-workout-title mb-30">Treinos Cadastrados</h3>

                    <section class="home-workouts-list default-flex-column">
                        @foreach ($userEdited->workouts as $workout)
                            <div class="workout-item default-flex-column-end" style="background-image: url(storage/{{$workout->image->url}})">
                                <i class='bx bxs-pencil' wire:click="openEditWorkoutModal({{$workout->id}})"></i>
                                <h3 class="mb-10">{{$workout->name}}</h3>
                                <p>Duração: {{$workout->duration}}</p>
                            </div>
                        @endforeach
                    </section>

                    <div class="default-flex">
                        <div class="add-new-exercise-button default-flex w-95 mb-20" wire:click="addWorkoutModal()">
                            <p>+ Adicionar Treino</p>
                        </div>
                    </div>
                </div>

                <div class="add-new-workout-area default-flex-column-start" style="display: {{$addWorkoutModalDisplay}}">
                    <div id="previewExerciseImage" class="workout-student-header  mb-20" style="height:240px;">
                        <div class="workout-student-back-button mb-40" wire:click="addWorkoutModal()">
                            <div class="default-flex-start">
                                <i class='bx bxs-chevron-left'></i>
                                <p>Voltar</p>
                            </div>
                        </div>

                        <div onclick="editWorkoutImage()">
                            <div class="change-cover-image-button default-flex-column">
                                <i class='bx bxs-image-add'></i>
                                <p>Trocar capa</p>
                            </div>
                        </div>
                    </div>

                    <div class="edit-workout-info w-100">
                        <form wire:submit="addWorkoutAction" id="neWorkoutBaseData" method="POST" class="w-100" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="newWorkoutImage" class="file-hidden-input" id="exerciseFileInput" wire:model="newWorkoutImage">
                            <input type="hidden" name="user_id" value="{{$userEdited->id}}">
                            <div class="default-flex-between mb-10">
                                <div class="edit-profile-input-box default-flex-column w-45">
                                    <label for="name">Nome</label>
                                    <input class="w-100" type="text" name="newWorkoutName" wire:model="newWorkoutName">
                                </div>

                                <div class="edit-profile-input-box default-flex-column w-45">
                                    <label for="duration">Tempo</label>
                                    <input class="w-100" type="text" name="newWorkoutDuration" wire:model="newWorkoutDuration">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="save-workout-button default-flex-end w-100">
                        <button form="neWorkoutBaseData">Salvar</button>
                    </div>
                </div>
            @endif

            @if(!empty($workoutEdited))
                <div class="edit-workout-area default-flex-column-start w-100" style="display: {{$editWorkoutModalDisplay}};">
                    <div id="previewExerciseImage" class="workout-student-header  mb-20" style="background-image: url(storage/{{$workoutEdited->image->url}}); height:240px;">
                        <div class="workout-student-back-button mb-40" wire:click="openEditWorkoutModal">
                            <div class="default-flex-start">
                                <i class='bx bxs-chevron-left'></i>
                                <p>Voltar</p>
                            </div>
                        </div>

                        <div onclick="editWorkoutImage()">
                            <div class="change-cover-image-button default-flex-column">
                                <i class='bx bxs-image-add'></i>
                                <p>Trocar capa</p>
                            </div>
                        </div>
                    </div>

                    <div class="edit-workout-info w-100">
                        <form id="workoutBaseData" method="POST" action="{{route('workout.edit')}}" class="w-100" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image" class="file-hidden-input" id="exerciseFileInput">
                            <input type="hidden" name="id" value="{{$workoutEdited->id}}">
                            <input type="hidden" name="user_id" value="{{$userEdited->id}}">
                            <div class="default-flex-between mb-10">
                                <div class="edit-profile-input-box default-flex-column w-45">
                                    <label for="name">Nome</label>
                                    <input class="w-100" type="text" name="name" value="{{$workoutEdited->name}}">
                                </div>

                                <div class="edit-profile-input-box default-flex-column w-45">
                                    <label for="duration">Tempo</label>
                                    <input class="w-100" type="text" name="duration" value="{{$workoutEdited->duration}}">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="workout-exercises-list w-100">
                        @foreach ($workoutEdited->exercises as $workoutExercise)
                            <div class="exercise-list-item mb-20 default-flex-between w-100">
                                <img src="{{url("storage/{$workoutExercise->exercise->media->url}")}}" alt="Imagem do Exercício">
                                <div class="exercise-list-item-info default-flex-column w-100">
                                    <h4 class="mb-20">{{$workoutExercise->exercise->name}}</h4>

                                    <p>{{$workoutExercise->exercise->rest}}</p>
                                </div>

                                <i class='bx bxs-trash-alt' wire:confirm="Deseja remover {{$workoutExercise->exercise->name}} do treino" wire:click="removeExercise({{$workoutExercise}})"></i>
                            </div>
                        @endforeach
                    </div>

                    <div class="add-new-exercise-button default-flex w-100 mb-20" wire:click="addExerciseModal({{$workoutEdited}})">
                        <p>+ Adicionar Exercício</p>
                    </div>

                    <div class="save-workout-button default-flex-end w-100">
                        <button form="workoutBaseData">Salvar</button>
                    </div>
                </div>
            @endif
            <div class="add-new-exercise-area default-flex-column" style="display: {{$addExerciseDisplay}}">
                <div class="workout-student-back-button mb-40 w-100">
                    <div class="default-flex-start" wire:click="addExerciseModal()">
                        <i class='bx bxs-chevron-left'></i>
                        <p>Voltar</p>
                    </div>
                </div>

                <div class="search-workout-exercise-area default-flex w-100 mb-30">
                    <input class="w-100" type="text" name="search" id="" wire:model="searchExerciseTerm" wire:keyup="searchExercise()">
                    <i class='bx bx-search-alt-2'></i>
                </div>

                <div class="students-top-area default-flex-between mb-20 w-100">
                    <h3>Exercícios</h3>

                    <select name="" id="" wire:change="filterExercises($event.target.value)">
                        <option value="all">Todos</option>
                        <option value="recent">Recentes</option>
                    </select>
                </div>

                <div class="exercises-list-area default-flex-column w-100">
                    @foreach ($exercises as $exercise)
                        <div class="exercise-list-item mb-20 default-flex-start w-100" wire:click="addExercise({{$exercise->id}})">
                            <img src="{{url("storage/{$exercise->media->url}")}}" alt="Imagem do Exercício" style="margin-right: 18px;">
                            <div class="exercise-list-item-info default-flex-column">
                                <h4 class="mb-20">{{$exercise->name}}</h4>

                                <p>{{$exercise->rest}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="add-new-exercise-info default-flex-column" style="display: {{$addExerciseInfoDisplay}}">
                <div class="workout-student-back-button mb-40 w-100">
                    <div class="default-flex-start" wire:click="addExercise()">
                        <i class='bx bxs-chevron-left'></i>
                        <p>Voltar</p>
                    </div>
                </div>

                <div class="add-exercise-form-area w-100">
                    <form wire:submit="addExerciseAction">
                        <div class="default-flex-between mb-20">
                            <div class="edit-profile-input-box default-flex-column w-60">
                            <label for="series">Series</label>
                            <input class="w-100" type="text" wire:model="series" name="series" required>
                        </div>

                        <div class="edit-profile-input-box default-flex-column w-35">
                            <label for="reps">Repetições</label>
                            <input class="w-100" type="text" wire:model="reps" name="reps" required>
                            </div>
                        </div>


                        <div class="edit-profile-input-box default-flex-column w-100 mb-20">
                            <label for="weight">Peso Recomendado</label>
                            <input class="w-100" type="text" wire:model="weight" name="weight" required>
                        </div>

                        <div class="default-flex-end">
                            <button class="add-exercise-to-workout-button">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endif

    <section class="add-new-studant-area default-flex-column" style="display: {{$addStudentFormDisplay}}">
        <div class="add-new-student-form-area" style="display: {{ $activeAddUserTab === 'student' ? 'block' : 'none' }}">
            <div class="edit-profile-modal">
                <div class="change-manage-student-tab-area">
                    <div class="change-manage-tab-buttons-area default-flex-between mb-20">
                        <p class="change-manage-tab-button default-flex w-100 {{ $activeAddUserTab === 'student' ? 'change-manage-tab-button-active' : '' }}" wire:click="changeAddUserTab('student')">Aluno</p>
                        <p class="change-manage-tab-button default-flex w-100 {{ $activeAddUserTab === 'user' ? 'change-manage-tab-button-active' : '' }}" wire:click="changeAddUserTab('user')">Usuário</p>
                    </div>
                </div>

                <div class="workout-student-back-button mb-20 w-100" style="padding: 0;">
                    <div class="default-flex-start" wire:click="addStudent()">
                        <i class='bx bxs-chevron-left'></i>
                        <p>Voltar</p>
                    </div>
                </div>

                <div class="close-edit-profile-modal-area">
                    <div class="edit-profile-image default-flex-column mb-30">
                        <img id="previewImage" class="mb-10" src="{{url('assets/images/avatars/avatar.png')}}" alt="Imagem do Usuário">

                        <p id="uploadImage">Carregar Foto</p>
                    </div>

                    <div class="edit-profile-form-area">
                        <x-forms.add-student-form></x-add-student-profile-form>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-new-teacher-form-area" style="display: {{ $activeAddUserTab === 'user' ? 'block' : 'none' }}">
            <div class="change-manage-student-tab-area">
                <div class="change-manage-tab-buttons-area default-flex-between mb-20">
                    <p class="change-manage-tab-button default-flex w-100 {{ $activeAddUserTab === 'student' ? 'change-manage-tab-button-active' : '' }}" wire:click="changeAddUserTab('student')">Aluno</p>
                    <p class="change-manage-tab-button default-flex w-100 {{ $activeAddUserTab === 'user' ? 'change-manage-tab-button-active' : '' }}" wire:click="changeAddUserTab('user')">Usuário</p>
                </div>
            </div>

            <div class="workout-student-back-button mb-20 w-100" style="padding: 0;">
                <div class="default-flex-start" wire:click="addStudent()">
                    <i class='bx bxs-chevron-left'></i>
                    <p>Voltar</p>
                </div>
            </div>

            <x-forms.add-teacher-form></x-forms.add-teacher-form>
        </div>
    </section>
</div>
