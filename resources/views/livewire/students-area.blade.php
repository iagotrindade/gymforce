<div>
    <section class="students-top-area default-flex-between mb-20">
        <h3>Alunos</h3>

        <select name="" id="">
            <option value="all">Todos</option>
            <option value="recent">Recentes</option>
            <option value="active">Ativos</option>
            <option value="inactive">Inativos</option>
        </select>
    </section>

    <section class="students-list-area">
        <div class="student-list-item default-flex-between" wire:click="manageStudent()">
            <div class="student-list-item-left default-flex">
                <img src="{{url('assets/images/avatars/avatar.png')}}" alt="Imagem do Aluno">
                <p>Daivid Souza Rodrigues</p>
            </div>

            <div class="student-list-item-right default-flex-column">
                <p>Inativo</p>
                <i class='bx bxs-circle'></i>
            </div>
        </div>

        <div class="student-list-item default-flex-between" wire:click="manageStudent()">
            <div class="student-list-item-left default-flex">
                <img src="{{url('assets/images/avatars/avatar.png')}}" alt="Imagem do Aluno">
                <p>Daivid Souza Rodrigues</p>
            </div>

            <div class="student-list-item-right default-flex-column">
                <p>Ativo</p>
                <i class='bx bxs-circle student-active'></i>
            </div>
        </div>
    </section>

    <div class="add-new-student-button-area default-flex" wire:click="addStudent()">
        <i class='bx bx-plus'></i>
    </div>

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
                        <img src="{{url('assets/images/avatars/avatar.png')}}" alt="Foto de Perfil">
                    </div>
    
                    <div class="student-profile-personal-info-area default-flex-column">
                        <p class="student-profile-plan-info mb-10">Plano R$ 99,90/mês</p>
    
                        <div class="default-flex">
                            <h3 class="student-profile-name mb-10">Anitta</h3>
                            <p class="student-profile-age">25 anos</p>
                        </div>
    
                        <p class="student-profile-id"><strong>ID</strong> 128.457.89-18</p>
                    </div>
                </div>
    
                <div class="edit-profile-button-area">
                    <i class='bx bxs-pencil' wire:click="openEditProfileModal()"></i>
                </div>
            </div>
    
            <div class="student-profile-statistics mb-30">
                <h3 class="mb-20">Estatísticas</h3>
    
                <div class="statistics-boxes-area">
                    <div class="default-flex-between mb-10">
                        <div class="statistic-box height-box default-flex-column">
                            <p>ALTURA</p>
                            <p>1,54 mm</p>
                        </div>
    
                        <div class="statistic-box weight-box default-flex-column">
                            <p>PESO</p>
                            <p>55,4 kg</p>
                        </div>
    
                        <div class="statistic-box imc-box default-flex-column">
                            <p>IMC</p>
                            <p>21.1</p>
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
                                    <td>23,5</td>
                                    <td>23,5</td>
                                    <td>23,5D/23,4E</td>
                                    <td>23,5D/23,4E</td>
                                    <td>23,5D/23,4E</td>
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
                    <h3>67Kg</h3>
                    <p>14/04 á 14/05</p>
                    <h3>63Kg</h3>
                </div>
    
                <div class="weight-history-line-area default-flex mb-30">
                    <div class="weight-history-line-area-item default-flex-column">
                        <p class="history-line-weight-info mb-10">67Kg</p>
    
                        <div class="line-area default-flex-column mb-10">
                            <div class="primary-line"></div>
                            <div class="line-point"></div>
                        </div>
    
                        <p class="history-line-date-info">14/04</p>
                    </div>
    
                    <div class="weight-history-line-area-item default-flex-column">
                        <p class="history-line-weight-info mb-10">67Kg</p>
    
                        <div class="line-area default-flex-column mb-10">
                            <div class="primary-line"></div>
                            <div class="line-point"></div>
                        </div>
    
                        <p class="history-line-date-info">14/04</p>
                    </div>
    
                    <div class="weight-history-line-area-item default-flex-column">
                        <p class="history-line-weight-info mb-10">67Kg</p>
    
                        <div class="line-area default-flex-column mb-10">
                            <div class="primary-line"></div>
                            <div class="line-point"></div>
                        </div>
    
                        <p class="history-line-date-info">14/04</p>
                    </div>
    
                    <div class="weight-history-line-area-item default-flex-column">
                        <p class="history-line-weight-info mb-10">67Kg</p>
    
                        <div class="line-area default-flex-column mb-10">
                            <div class="primary-line"></div>
                            <div class="line-point"></div>
                        </div>
    
                        <p class="history-line-date-info">14/04</p>
                    </div>
                </div>
    
                <div class="student-imc-area">
                    <h3 class="mb-10">Interpretação do IMC</h3>
    
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
                <h3 class="progress-tab-title mb-10">Abril</h3>
                <p class="progress-tab-month mb-30">01/04 á 31/04</p>
    
                <div class="training timeline-area default-flex-column">
                    <div class="training-timeline-item mb-20">
                        <p class="training-timeline-item-title mb-10">Treino A</p>
    
                        <div class="default-flex">
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 1</p>
                            </div>
    
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 2</p>
                            </div>
    
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 3</p>
                            </div>
    
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 4</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="training-timeline-item mb-20">
                        <p class="training-timeline-item-title mb-10">Treino B</p>
    
                        <div class="default-flex">
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 1</p>
                            </div>
    
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 2</p>
                            </div>
    
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 3</p>
                            </div>
    
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 4</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="training-timeline-item mb-20">
                        <p class="training-timeline-item-title mb-10">Treino C</p>
    
                        <div class="default-flex">
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 1</p>
                            </div>
    
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 2</p>
                            </div>
    
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 3</p>
                            </div>
    
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 4</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="training-timeline-item mb-20">
                        <p class="training-timeline-item-title mb-10">Treino D</p>
    
                        <div class="default-flex">
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 1</p>
                            </div>
    
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 2</p>
                            </div>
    
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 3</p>
                            </div>
    
                            <div class="training-history-line-area-item default-flex-column">
                                <div class="line-area default-flex-column mb-10">
                                    <div class="primary-line"></div>
                                    <div class="line-point"></div>
                                </div>
    
                                <p class="history-line-date-info">Semana 4</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="edit-profile-modal" style="display: {{$editStudentModalDisplay}};">
                <div class="close-edit-profile-modal-area">
                    <div class="default-flex-end w-100">
                        <i class='bx bx-x'  wire:click="openEditProfileModal()"></i>
                    </div>
    
                    <div class="edit-profile-image default-flex-column mb-30">
                        <img class="mb-10" src="{{url('assets/images/avatars/avatar.png')}}" alt="Imagem do usuário">
    
                        <p>Carregar Foto</p>
                    </div>
    
                    <div class="edit-profile-form-area">
                        <x-forms.edit-profile-form>
                            <x-slot:adminFoneEdit>
                                <div class="default-flex-between mb-10">
                                    <div class="edit-profile-input-box default-flex-column w-45">
                                       <label for="whatsapp">Whatsapp</label>
                                       <input class="w-100" type="text" name="whatsapp">
                                   </div>
                             
                                   <div class="edit-profile-input-box default-flex-column w-50">
                                       <label for="phone">Número</label>
                                       <input class="w-100" type="text" name="phone">
                                    </div>
                                </div>
                            </x-slot:adminFoneEdit>
                                
                            <x-slot:adminEditPlan>
                                <div class="default-flex-between mb-20">
                                    <div class="edit-profile-input-box default-flex-column w-70">
                                       <label for="plan">Plano</label>
                                       <input class="w-100" type="text" name="plan">
                                   </div>
                             
                                   <div class="edit-profile-input-box default-flex-column w-25">
                                       <label for="plan_date">Data</label>
                                       <input class="w-100" type="text" name="plan_date">
                                    </div>
                                </div>
                            </x-slot:adminEditPlan>
                        </x-forms.edit-profile-form>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="manage-student-workout" style="display: {{ $activeManageTab === 'workout' ? 'block' : 'none' }}; margin-bottom: 80px;">
            <h3 class="manage-workout-title mb-30">Treinos Cadastrados</h3>
    
            <section class="home-workouts-list default-flex-column">
                <div class="workout-item default-flex-column-end" style="background-image: url({{url('assets/images/workouts/back-workout.png')}})">
                    <i class='bx bxs-pencil' wire:click="openEditWorkoutModal()"></i>
                    <h3 class="mb-10">Treino A</h3>
                    <p>90 min | Ter/Qui/Sab</p>
                </div>
    
                <div class="workout-item default-flex-column-end" style="background-image: url({{url('assets/images/workouts/legs-workout.png')}})">
                    <i class='bx bxs-pencil' wire:click="openEditWorkoutModal()"></i>
                    <h3 class="mb-10">Treino B</h3>
                    <p>90 min | Ter/Qui/Sab</p>
                </div>
    
                <div class="workout-item default-flex-column-end" style="background-image: url({{url('assets/images/workouts/chest-workout.png')}})">
                    <i class='bx bxs-pencil' wire:click="openEditWorkoutModal()"></i>
                    <h3 class="mb-10">Treino C</h3>
                    <p>90 min | Ter/Qui/Sab</p>
                </div>
    
        
    
                <div class="workout-item default-flex-column-end" style="background-image: url({{url('assets/images/workouts/chest-workout.png')}})">
                    <i class='bx bxs-pencil' wire:click="openEditWorkoutModal()"></i>
                    <h3 class="mb-10">Treino C</h3>
                    <p>90 min | Ter/Qui/Sab</p>
                </div>
            </section>
        </div>

        <div class="edit-workout-area default-flex-column" style="display: {{$editWorkoutModalDisplay}};">
            <div class="workout-student-header  mb-20" style="background-image: url({{url('assets/images/workouts/back-workout.png')}}); height:240px;">
                <div class="workout-student-back-button mb-40">
                    <div class="default-flex-start">
                        <i class='bx bxs-chevron-left'></i>
                        <p>Voltar</p>
                    </div>
                </div>

                <div class="change-cover-image-button default-flex-column">
                    <i class='bx bxs-image-add'></i>
                    <p>Trocar capa</p>
                </div>
            </div>

            <div class="edit-workout-info mb-10">
                <form action="">
                    <div class="default-flex-between mb-10">
                        <div class="edit-profile-input-box default-flex-column w-65">
                           <label for="name">Nome</label>
                           <input class="w-100" type="text" name="name">
                       </div>
                 
                       <div class="edit-profile-input-box default-flex-column w-25">
                           <label for="duration">Tempo</label>
                           <input class="w-100" type="text" name="duration">
                        </div>
                    

                        <div class="edit-profile-input-box default-flex-column w-25">
                            <label class="mb-20" for="days">Dias</label>
                            <select name="days" id="">
                                <option value="all">Seg/Qua/Sex</option>
                                <option value="recent">Seg/Qua/Sex<</option>
                                <option value="active">Seg/Qua/Sex<</option>
                                <option value="inactive">Seg/Qua/Sex<</option>
                            </select>
                        </div>
                            
                    </div>
                </form>
            </div>

            <div class="workout-exercises-list w-100">
                <div class="exercise-list-item mb-20 default-flex-between w-100">
                    <img src="{{url('assets/images/exercises/exercise.png')}}" alt="Imagem do Exercício">
                    <div class="exercise-list-item-info default-flex-column">
                        <h4 class="mb-20">Agachamento com Peso</h4>
        
                        <p>01:00</p>
                    </div>
        
                    <i class='bx bxs-trash-alt'></i>
                </div>
            </div>

            <div class="add-new-exercise-button default-flex w-100 mb-20" wire:click="addExerciseModal()">
                <p>+ Adicionar Exercício</p>
            </div>

            <div class="save-workout-button default-flex-end w-100">
                <button>Salvar</button>
            </div>
        </div>

        <div class="add-new-exercise-area default-flex-column" style="display: {{$addExerciseDisplay}}">
            <div class="workout-student-back-button mb-40 w-100">
                <div class="default-flex-start" wire:click="addExerciseModal()">
                    <i class='bx bxs-chevron-left'></i>
                    <p>Voltar</p>
                </div>
            </div>

            <div class="search-workout-exercise-area default-flex w-100 mb-30">
                <input class="w-100" type="text" name="search" id="" wire:keyup="searchExercise()">
                <i class='bx bx-search-alt-2'></i>
            </div>

            <div class="students-top-area default-flex-between mb-20 w-100">
                <h3>Exercícios</h3>
        
                <select name="" id="" wire:change="filterStudents()">
                    <option value="all">Todos</option>
                    <option value="recent">Recentes</option>
                    <option value="active">Ativos</option>
                    <option value="inactive">Inativos</option>
                </select>
            </div>
        
            <div class="exercises-list-area default-flex-column w-100">
                <div class="exercise-list-item mb-20 default-flex-start w-100" wire:click="addExerciseAction()">
                    <img src="{{url('assets/images/exercises/exercise.png')}}" alt="Imagem do Exercício" style="margin-right: 18px;">
                    <div class="exercise-list-item-info default-flex-column">
                        <h4 class="mb-20">Agachamento com Peso</h4>
        
                        <p>01:00</p>
                    </div>
                </div>

                <div class="exercise-list-item mb-20 default-flex-start w-100" wire:click="addExerciseAction()">
                    <img src="{{url('assets/images/exercises/exercise.png')}}" alt="Imagem do Exercício" style="margin-right: 18px">
                    <div class="exercise-list-item-info default-flex-column">
                        <h4 class="mb-20">Agachamento com Peso</h4>
        
                        <p>01:00</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-new-exercise-info default-flex-column" style="display: {{$addExerciseInfoDisplay}}">
            <div class="workout-student-back-button mb-40 w-100">
                <div class="default-flex-start" wire:click="addExerciseAction()">
                    <i class='bx bxs-chevron-left'></i>
                    <p>Voltar</p>
                </div>
            </div>

            <div class="add-exercise-form-area w-100">
                <form action="">
                    <div class="default-flex-between mb-20">
                        <div class="edit-profile-input-box default-flex-column w-60">
                           <label for="name">Nome</label>
                           <input class="w-100" type="text" name="name">
                       </div>
                 
                       <div class="edit-profile-input-box default-flex-column w-35">
                           <label for="break">Descanso</label>
                           <input class="w-100" type="text" name="break">
                        </div>
                    </div>

                    <div class="add-exercise-form-img default-flex w-100 mb-20">
                        <img src="{{url('assets/images/exercises/exercise-teste.png')}}" alt="Imagem do Exercício">
                    </div>
                    
                    <div class="default-flex-between mb-20">
                        <div class="edit-profile-input-box default-flex-column w-60">
                           <label for="series">Series</label>
                           <input class="w-100" type="text" name="series">
                       </div>
                 
                       <div class="edit-profile-input-box default-flex-column w-35">
                           <label for="reps">Repetições</label>
                           <input class="w-100" type="text" name="reps">
                        </div>
                    </div>


                    <div class="edit-profile-input-box default-flex-column w-100 mb-20">
                        <label for="weght">Peso Recomendado</label>
                        <input class="w-100" type="text" name="weght">
                    </div>

                    <div class="default-flex-end">
                        <button class="add-exercise-to-workout-button">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </section> 
    
    <section class="add-new-studant-area default-flex-column" style="display: {{$addStudentFormDisplay}}">
        <div class="add-new-student-form-area">
            <div class="edit-profile-modal">
                <div class="workout-student-back-button mb-20 w-100" style="padding: 0;">
                    <div class="default-flex-start" wire:click="addStudent()">
                        <i class='bx bxs-chevron-left'></i>
                        <p>Voltar</p>
                    </div>
                </div>
                <div class="close-edit-profile-modal-area">
                    <div class="edit-profile-image default-flex-column mb-30">
                        <img class="mb-10" src="{{url('assets/images/avatars/avatar.png')}}" alt="Imagem do Usuário">
    
                        <p>Carregar Foto</p>
                    </div>
    
                    <div class="edit-profile-form-area">
                        <x-forms.add-student-form></x-add-student-profile-form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
