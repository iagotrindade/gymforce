<x-layouts.student-layout page="PERFIL" activeMenu="workout">
    <livewire:student-profile/>

    <livewire:timer-modal />
    <livewire:mobile-menu activeMenu="profile"/>

    <script>
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
    </script>
</x-layouts.student-layout>

