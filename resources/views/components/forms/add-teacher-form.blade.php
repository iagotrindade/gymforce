<form method="POST" action="{{route('new.user')}}" class="edit-profile-form w-100">
    @csrf
    <div class="default-flex-between mb-10">
        <div class="edit-profile-input-box default-flex-column w-100">
            <label for="name">Nome</label>
            <input class="w-100" type="text" name="name">
        </div>
    </div>

    <div class="default-flex-between mb-10">

        <div class="edit-profile-input-box default-flex-column w-100">
            <label for="email">Email</label>
            <input class="w-100" type="email" name="email">
        </div>
    </div>

    <div class="default-flex-between mb-10">
        <div class="edit-profile-input-box default-flex-column w-100">
            <label for="whatsapp">Whatsapp</label>
            <input class="w-100" type="text" name="whatsapp">
        </div>
    </div>

    <div class="default-flex-between mb-10">
        <div class="edit-profile-input-box default-flex-column w-70">
            <label for="cref">CREF</label>
            <input class="w-100" type="text" name="cref">
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

    <p class="mb-20 white-font-color">*A senha será enviada ao email cadastrado</p>

    <div class="default-flex-end mb-80">
        <button class="submit-edit-profile-button">Salvar</button>
    </div>
</form>
