<div>
    <div class="students-top-area default-flex-between mb-20">
        <h3>Alunos</h3>

        <select name="" id="">
            <option value="all">Todos</option>
            <option value="recent">Recentes</option>
            <option value="active">Ativos</option>
            <option value="inactive">Inativos</option>
        </select>
    </div>

    <div class="students-list-area">
        <div class="student-list-item default-flex-between">
            <div class="student-list-item-left default-flex">
                <img src="{{url('assets/images/avatars/avatar.png')}}" alt="Imagem do Aluno">
                <p>Daivid Souza Rodrigues</p>
            </div>

            <div class="student-list-item-right default-flex-column">
                <p>Inativo</p>
                <i class='bx bxs-circle'></i>
            </div>
        </div>

        <div class="student-list-item default-flex-between">
            <div class="student-list-item-left default-flex">
                <img src="{{url('assets/images/avatars/avatar.png')}}" alt="Imagem do Aluno">
                <p>Daivid Souza Rodrigues</p>
            </div>

            <div class="student-list-item-right default-flex-column">
                <p>Ativo</p>
                <i class='bx bxs-circle student-active'></i>
            </div>
        </div>
    </div>

    <div class="add-new-student-button-area default-flex">
        <i class='bx bx-plus'></i>
    </div>
</div>
