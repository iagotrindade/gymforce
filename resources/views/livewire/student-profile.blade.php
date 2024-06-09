<div>
    <section class="student-profile-area">
        <div class="student-profile-head mb-30 default-flex-between">
            <div class="default-flex">
                <div class="student-profile-image-area">
                    <img src="{{url("storage/{$user->image->url}")}}" alt="Imagem do Aluno">
                </div>

                <div class="student-profile-personal-info-area default-flex-column">
                    <p class="student-profile-plan-info mb-10">Plano R$ {{$user->plan}}</p>

                    <div class="default-flex">
                        <h3 class="student-profile-name mb-10">{{$user->name}}</h3>
                        <p class="student-profile-age">{{$user->age}} anos</p>
                    </div>

                    <p class="student-profile-id"><strong>ID</strong> {{$user->inscription}}</p>
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
                        <p>{{$user->statistics->height}} mm</p>
                    </div>

                    <div class="statistic-box weight-box default-flex-column">
                        <p>PESO</p>
                        <p>{{$user->statistics->weight}} kg</p>
                    </div>

                    <div class="statistic-box imc-box default-flex-column" style="border-bottom: 3px solid {{$this->calcImc($user->statistics->imc)}};">
                        <p>IMC</p>
                        <p>{{$user->statistics->imc}}</p>
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
                                <td>{{$user->statistics->waist}}</td>
                                <td>{{$user->statistics->hip}}</td>
                                <td>{{$user->statistics->arms}}</td>
                                <td>{{$user->statistics->legs}}</td>
                                <td>{{$user->statistics->thighs}}</td>
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
                <h3>{{$user->weightHistoric->slice(-2, 1)->first()->weight}}Kg</h3>

                <p>{{\Carbon\Carbon::parse($user->weightHistoric->slice(-2, 1)->first()->created_at)->format('d/m')}} á {{\Carbon\Carbon::parse($user->weightHistoric->last()->created_at)->format('d/m')}}</p>

                <h3>{{$user->weightHistoric->last()->weight}}Kg</h3>
            </div>

            <div class="weight-history-line-area default-flex mb-30">
                @foreach ($user->weightHistoric as $historicItem)
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
                @foreach ($user->workouts as $workout)
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

        <div class="edit-profile-modal" style="display: {{$modalDisplay}};">
            <div class="close-edit-profile-modal-area">
                <div class="default-flex-end w-100">
                    <i class='bx bx-x'  wire:click="openEditProfileModal()"></i>
                </div>

                <div class="edit-profile-image default-flex-column mb-30">
                    <img class="mb-10" src="{{url("storage/{$user->image->url}")}}" alt="Imagem do Aluno" id="previewImage">

                    <p onclick="updateImage()">Carregar Foto</p>
                </div>

                <div class="edit-profile-form-area">
                    <x-forms.edit-profile-form :user="$user">
                        <x-slot:adminFoneEdit>
                            <div class="default-flex-between mb-10">
                                <div class="edit-profile-input-box default-flex-column w-45">
                                <label for="whatsapp">Whatsapp</label>
                                <input class="w-100" type="text" name="whatsapp" value="{{$user->whatsapp}}">
                            </div>

                            <div class="edit-profile-input-box default-flex-column w-50">
                                <label for="phone">Número</label>
                                <input class="w-100" type="text" name="phone" value="{{$user->phone}}">
                                </div>
                            </div>
                        </x-slot:adminFoneEdit>

                        <x-slot:adminEditPlan>
                            <div class="default-flex-between mb-20">
                                <div class="edit-profile-input-box default-flex-column w-70">
                                    <label for="plan">Plano</label>
                                    <input class="w-100" type="text" name="plan" value="{{$user->plan}}">
                                </div>

                                <div class="edit-profile-input-box default-flex-column w-25">
                                    <label for="plan_date">Data</label>
                                    <input class="w-100" type="date" name="plan_date" value="{{$user->plan_date}}">
                                </div>
                            </div>
                        </x-slot:adminEditPlan>
                    </x-forms.edit-profile-form>
                </div>
            </div>
        </div>
    </section>
</div>
