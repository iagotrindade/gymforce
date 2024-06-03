<div class="add-exercise-form-area w-100">

    <form method="POST" action="{{route('edit.exercise')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$exercise->id}}">
        <input class="file-hidden-input" type="file" name="image" id="exerciseFileInput">
        <div class="default-flex-between mb-20">
            <div class="edit-profile-input-box default-flex-column w-60">
               <label for="name">Nome</label>
               <input class="w-100" type="text" name="name" value="{{$exercise->name}}">
           </div>

           <div class="edit-profile-input-box default-flex-column w-35">
               <label for="rest">Descanso</label>
               <input class="w-100" type="text" name="rest" value="{{$exercise->rest}}">
            </div>
        </div>

        <div class="add-exercise-form-img default-flex w-100 mb-20 w-100" onclick="editImage()">
            <img style="display: block" class="w-100" alt="Imagem do Exercício" id="previewExerciseImage" src="{{url("storage/{$exercise->media->url}")}}">
        </div>

        <!--    <div class="default-flex-between mb-20">
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
        -->
        <div class="default-flex-end">
            <button class="add-exercise-to-workout-button">Concluir</button>
        </div>
    </form>
</div>
