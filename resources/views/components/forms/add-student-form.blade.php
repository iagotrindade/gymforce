<div>
    <form class="edit-profile-form w-100" method="POST" action="{{route('student.new')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_type" value="student">
        <input class="file-hidden-input" type="file" name="image" id="avatarInput">

        <div class="default-flex-between mb-10">
            <div class="edit-profile-input-box default-flex-column w-70">
                <label for="name">Nome</label>
                <input class="w-100" type="text" name="name">
            </div>

            <div class="edit-profile-input-box default-flex-column w-25">
                <label for="age">Idade</label>
                <input class="w-100" type="text" name="age">
            </div>
        </div>

        <div class="default-flex-between mb-10">
            <div class="edit-profile-input-box default-flex-column w-70">
                <label for="email">Email</label>
                <input class="w-100" type="email" name="email">
            </div>

            <div class="edit-profile-input-box default-flex-column w-25">
                <label for="status">Status</label>
                <select class="w-100" name="status" id="">
                    <option selected disabled>Selecione</option>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            </div>
        </div>

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

        <div class="default-flex-between mb-10">
            <div class="edit-profile-input-box default-flex-column w-20">
                <label for="waist">Cintura</label>
                <input class="w-100" type="text" name="waist">
            </div>

            <div class="edit-profile-input-box default-flex-column w-20">
                <label for="hip">Quadril</label>
                <input class="w-100" type="text" name="hip">
            </div>

            <div class="edit-profile-input-box default-flex-column w-50">
                <label for="arms">Braços</label>
                <input class="w-100" type="text" name="arms">
            </div>
        </div>

        <div class="default-flex-between mb-10">
            <div class="edit-profile-input-box default-flex-column w-45">
                <label for="legs">Pernas</label>
                <input class="w-100" type="text" name="legs">
            </div>

            <div class="edit-profile-input-box default-flex-column w-50">
                <label for="thighs">Coxas</label>
                <input class="w-100" type="text" name="thighs">
            </div>
        </div>

        <div class="default-flex-between mb-10">
            <div class="edit-profile-input-box default-flex-column w-45 mb-20">
                <label for="height">Altura</label>
                <input class="w-100" type="text" name="height">
            </div>

            <div class="edit-profile-input-box default-flex-column w-50 mb-20">
                <label for="weight">Peso</label>
                <input class="w-100" type="text" name="weight">
            </div>
        </div>


        <div class="default-flex-between mb-20">
            <div class="edit-profile-input-box default-flex-column w-70">
                <label for="plan">Plano</label>
                <input class="w-100" type="text" name="plan">
            </div>

            <div class="edit-profile-input-box default-flex-column w-25">
                <label for="plan_date">Data</label>
                <input class="w-100" type="date" name="plan_date">
            </div>
        </div>

        <div class="default-flex-end mb-80">
            <button class="submit-edit-profile-button">Salvar</button>
        </div>
    </form>
 </div>
