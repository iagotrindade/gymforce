<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>GYMFORCE ADM - {{$page}}</title>
    </head>
    <body>
        <div class="app-container default-flex">
            <div class="teacher-area w-100">
                {{$slot}}
            </div>
        </div>

        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

        <script>
            document.getElementById('uploadImage').addEventListener('click', () => {
                document.getElementById('avatarInput').click();
            });

            document.getElementById('avatarInput').addEventListener('change', function(event) {
                var input = event.target;
                var reader = new FileReader();

                reader.onload = function() {
                    var dataURL = reader.result;

                    if(document.getElementById('previewExercise')){
                        var previewImage = document.getElementById('previewExercise');
                        previewImage.style.display = 'block';
                        document.getElementById('no-preview-image-exercise').style.display = 'none';
                    } else {
                        var previewImage = document.getElementById('previewImage');
                    }

                    previewImage.src = dataURL;
                };

                reader.readAsDataURL(input.files[0]);
            });

            function updateImage() {
                document.getElementById('updateInput').click();

                document.getElementById('updateInput').addEventListener('change', function(event) {
                    var input = event.target;
                    var reader = new FileReader();

                    reader.onload = function() {
                        var dataURL = reader.result;
                        var previewImage = document.getElementById('previewImage');
                        previewImage.src = dataURL;
                    };
                    reader.readAsDataURL(input.files[0]);
                });
            }

            function editImage() {
                document.getElementById('exerciseFileInput').click();

                document.getElementById('exerciseFileInput').addEventListener('change', function(event) {
                    var exerciseInput = event.target;
                    var exerciseReader = new FileReader();

                    exerciseReader.onload = function() {
                        var dataURL = exerciseReader.result;
                        var previewExerciseImage = document.getElementById('previewExerciseImage');

                        previewExerciseImage.src = dataURL;
                    };
                    exerciseReader.readAsDataURL(exerciseInput.files[0]);
                });
            }

            function editWorkoutImage() {
                document.getElementById('exerciseFileInput').click();

                document.getElementById('exerciseFileInput').addEventListener('change', function(event) {
                    var exerciseInput = event.target;
                    var exerciseReader = new FileReader();

                    exerciseReader.onload = function() {
                        var dataURL = exerciseReader.result;
                        var previewExerciseImage = document.getElementById('previewExerciseImage');

                        previewExerciseImage.style.backgroundImage = 'url('+dataURL+')';
                        document.getElementById('no-preview-image-exercise').style.display = 'none';
                    };
                    exerciseReader.readAsDataURL(exerciseInput.files[0]);
                });
            }

            function admEditWorkoutImage() {
                document.getElementById('admWorkoutFileInput').click();

                document.getElementById('admWorkoutFileInput').addEventListener('change', function(event) {
                    var exerciseInput = event.target;
                    var exerciseReader = new FileReader();

                    exerciseReader.onload = function() {
                        var dataURL = exerciseReader.result;
                        var previewExerciseImage = document.getElementById('admPrevWorkoutImage');

                        previewExerciseImage.style.backgroundImage = 'url('+dataURL+')';
                    };
                    exerciseReader.readAsDataURL(exerciseInput.files[0]);
                });
            }

        </script>
    </body>
</html>
