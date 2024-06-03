<div class="add-exercise-form-area w-100">
    <form method="POST" action="{{route('new.exercise')}}" enctype="multipart/form-data">
        @csrf
        <input type="file" class="file-hidden-input" name="media" id="avatarInput">
        <div class="default-flex-between mb-20">
            <div class="edit-profile-input-box default-flex-column w-60">
               <label for="name">Nome</label>
               <input class="w-100" type="text" name="name">
           </div>

           <div class="edit-profile-input-box default-flex-column w-35">
               <label for="rest">Descanso</label>
               <input class="w-100" type="text" name="rest">
            </div>
        </div>

        <div class="add-exercise-form-img default-flex w-100 mb-20 w-100" id="uploadImage">
            <img class="w-100" alt="Imagem do Exercício" id="previewExercise">

            <div id="no-preview-image-exercise" class="default-flex-column">
                <i class='bx bxs-image-add'></i>
                <p>Upload Video/Gif</p>
            </div>
        </div>

        <!--   <div class="default-flex-between mb-20">
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
