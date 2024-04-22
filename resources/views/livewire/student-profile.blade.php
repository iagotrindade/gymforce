<div>
    <section class="student-profile-area">
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
                <i class='bx bxs-pencil'></i>
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

        <div class="edit-profile-modal">
            <div class="close-edit-profile-modal-area">
                <div class="default-flex-end w-100">
                    <i class='bx bx-x'></i>
                </div>
                

                <div class="edit-profile-image default-flex-column mb-30">
                    <img class="mb-10" src="{{url('assets/images/avatars/avatar.png')}}" alt="Imagem do Usuário">

                    <p>Carregar Foto</p>
                </div>

                <div class="edit-profile-form-area">
                    <x-forms.edit-profile-form></x-forms.edit-profile-form>
                </div>
            </div>
        </div>

    </section>
</div>
