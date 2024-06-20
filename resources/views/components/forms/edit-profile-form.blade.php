<div>
    <form method="POST" action="{{route('student.edit')}}" class="edit-profile-form w-100" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}">
        <input class="file-hidden-input" type="file" name="image" id="updateInput">
        <div class="default-flex-between mb-10">
            <div class="edit-profile-input-box default-flex-column w-70">
                <label for="name" >Nome</label>
                <input class="w-100" type="text" name="name" value="{{$user->name}}">
            </div>

            <div class="edit-profile-input-box default-flex-column w-25">
                <label for="age">Idade</label>
                <input class="w-100" type="text" name="age" value="{{$user->age}}">
            </div>
        </div>

        <div class="default-flex-between mb-10">
            <div class="edit-profile-input-box default-flex-column w-70">
                <label for="email">Email</label>
                <input class="w-100" type="email" name="email" value="{{$user->email}}">
            </div>

            <div class="edit-profile-input-box default-flex-column w-25">
                <label for="status">Situação</label>
                @if(Auth::user()->hasRole('student'))
                    <input class="w-100" type="email" name="status" value="{{$user->status}}" readonly>
                @else
                    <select class="w-100" name="status" id="" >
                        <option selected disabled>Selecione</option>
                        <option value="Ativo" {{ $user->status == 'Ativo' ? 'selected' : '' }}>Ativo</option>
                        <option value="Inativo" {{ $user->status == 'Inativo' ? 'selected' : '' }}>Inativo</option>
                    </select>
                @endif
            </div>
        </div>

        {{$adminFoneEdit}}

        <div class="default-flex-between mb-10">
            <div class="edit-profile-input-box default-flex-column w-20">
                <label for="waist">Cintura</label>
                <input class="w-100" type="text" name="waist" value="{{$user->statistics->waist}}">
            </div>

            <div class="edit-profile-input-box default-flex-column w-20">
                <label for="hip">Quadril</label>
                <input class="w-100" type="text" name="hip" value="{{$user->statistics->hip}}">
            </div>

            <div class="edit-profile-input-box default-flex-column w-50">
                <label for="arms">Braços</label>
                <input class="w-100" type="text" name="arms" value="{{$user->statistics->arms}}">
            </div>
        </div>

        <div class="default-flex-between mb-10">
            <div class="edit-profile-input-box default-flex-column w-45">
                <label for="legs">Pernas</label>
                <input class="w-100" type="text" name="legs" value="{{$user->statistics->legs}}">
            </div>

            <div class="edit-profile-input-box default-flex-column w-50">
                <label for="thighs">Coxas</label>
                <input class="w-100" type="text" name="thighs" value="{{$user->statistics->thighs}}">
            </div>
        </div>

        <div class="default-flex-between mb-10">
            <div class="edit-profile-input-box default-flex-column w-45">
                <label for="weight">Peso</label>
                <input class="w-100" type="text" name="weight" value="{{$user->statistics->weight}}">
            </div>

            <div class="edit-profile-input-box default-flex-column w-50">
                <label for="height">Altura</label>
                <input class="w-100" type="text" name="height" value="{{$user->statistics->height}}">
            </div>
        </div>

        {{$adminEditPlan}}

        <div class="default-flex-end">
            <button class="submit-edit-profile-button">Salvar</button>
        </div>
    </form>
</div>
