<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>GYMFORCE - {{$page}}</title>
    </head>
    <body>
        <div class="app-container default-flex">
            {{$slot}}
        </div>

        <script>
            function focusNext(currentInput) {
                if (currentInput.value.length === 1) {
                    var nextInput = currentInput.nextElementSibling;
                    if (nextInput && nextInput.tagName.toLowerCase() === "input") {
                        nextInput.focus();
                    }
                }
            }

            // Adiciona um listener para a tecla backspace
            document.addEventListener("keydown", function(event) {
                var currentInput = event.target;
                if (event.key === "Backspace" && currentInput.value.length === 0) {
                    var prevInput = currentInput.previousElementSibling;
                    if (prevInput && prevInput.tagName.toLowerCase() === "input") {
                        prevInput.focus();
                    }
                }
            });
        </script>

        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </body>
</html>
