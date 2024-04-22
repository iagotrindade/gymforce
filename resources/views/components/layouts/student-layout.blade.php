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
            <div class="student-area w-100">
                {{$slot}}
            </div>
        </div>

        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

        <script>
            let milliseconds = 0;
            let seconds = 0;
            let minutes = 0;
            let intervalId = null;

            function startTimer() {
                if (intervalId === null) {
                    intervalId = setInterval(updateTimer, 10);
                }
            }

            function stopTimer() {
                clearInterval(intervalId);
                intervalId = null;
            }

            function resetTimer() {
                clearInterval(intervalId);
                intervalId = null;
                milliseconds = -1;
                seconds = 0;
                minutes = 0;
                updateTimer();
            }

            function updateTimer() {
                milliseconds++;
                if (milliseconds >= 100) {
                    milliseconds = 0;
                    seconds++;
                    if (seconds >= 60) {
                        seconds = 0;
                        minutes++;
                    }
                }
                document.getElementById('timer').innerHTML = `${formatTime(minutes)}:${formatTime(seconds)}.${formatTime(milliseconds)}`;
            }

            function formatTime(time) {
                return time < 10 ? `0${time}` : time;
            }

            document.getElementById('startButton').addEventListener('click', startTimer);
            document.getElementById('stopButton').addEventListener('click', stopTimer);
            document.getElementById('resetButton').addEventListener('click', resetTimer);
        </script>
    </body>
</html>
