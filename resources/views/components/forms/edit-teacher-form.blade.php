<form method="POST" action="{{route('edit.user')}}" class="edit-profile-form w-100" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <input class="file-hidden-input" type="file" name="image" id="updateInput">

    <div class="default-flex-between mb-10 w-100">
        <div class="edit-profile-input-box default-flex-column w-100">
            <label for="name">Nome</label>
            <input class="w-100" type="text" name="name" value="{{$user->name}}">
        </div>
    </div>

    <div class="default-flex-between mb-10">

        <div class="edit-profile-input-box default-flex-column w-100">
            <label for="email">Email</label>
            <input class="w-100" type="email" name="email" value="{{$user->email}}">
        </div>
    </div>

    <div class="default-flex-between mb-10">
        <div class="edit-profile-input-box default-flex-column w-100">
            <label for="whatsapp">Whatsapp</label>
            <input class="w-100" type="text" name="whatsapp" value="{{$user->whatsapp}}">
        </div>
    </div>

    <div class="default-flex-between mb-10">
        <div class="edit-profile-input-box default-flex-column w-70">
            <label for="cref">CREF</label>
            <input class="w-100" type="text" name="cref" value="{{$user->inscription}}">
        </div>

        <div class="edit-profile-input-box default-flex-column w-25">
            <label for="status">Status</label>
            <select class="w-100" name="status" id="">
                <option selected disabled>Selecione</option>
                <option value="Ativo" {{ $user->status == 'Ativo' ? 'selected' : '' }}>Ativo</option>
                <option value="Inativo" {{ $user->status == 'Inativo' ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>
    </div>

    @if ($user->id == Auth::user()->id)
        <div class="default-flex-between mb-10">
            <div class="edit-profile-input-box default-flex-column w-100">
                <label for="password">Senha</label>
                <input class="w-100" type="password" name="password">
            </div>
        </div>

        <div class="default-flex-between mb-20">
            <div class="edit-profile-input-box default-flex-column w-100">
                <label for="new_password">Nova senha</label>
                <input class="w-100" type="password" name="new_password">
            </div>
        </div>
    @endif

    <div class="default-flex-end mb-80">
        <button class="submit-edit-profile-button">Salvar</button>
    </div>
</form>
