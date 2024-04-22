<x-layouts.student-layout page="HOME">
    <section class="home-student-header default-flex-column mb-40">
        <h3 class="mb-10">Olá, Aluno(a)!</h3>

        <p class="welcome-minor-text mb-40">Seja bem bindo(a)</p>

        <div class="home-student-header-date-area default-flex-between mb-40 w-100">
            <p>Sábado - 18/04</p>

            <p>21:17</p>
        </div>

        <h4>O que vai ser Hoje?</h4>
    </section>

    <section class="home-workouts-list default-flex-column">
        <a href="{{route('workout')}}">
            <div class="workout-item default-flex-column-end" style="background-image: url({{url('assets/images/workouts/back-workout.png')}})">
                <h3 class="mb-10">Treino A</h3>
                <p>90 min | Ter/Qui/Sab</p>
            </div>
        </a>

       <a href="{{route('workout')}}">
            <div class="workout-item default-flex-column-end" style="background-image: url({{url('assets/images/workouts/legs-workout.png')}})">
                <h3 class="mb-10">Treino B</h3>
                <p>90 min | Ter/Qui/Sab</p>
            </div>
       </a>

       <a href="{{route('workout')}}">
            <div class="workout-item default-flex-column-end" style="background-image: url({{url('assets/images/workouts/chest-workout.png')}})">
                <h3 class="mb-10">Treino C</h3>
                <p>90 min | Ter/Qui/Sab</p>
            </div>
       </a>

       <a href="{{route('workout')}}">
        <div class="workout-item default-flex-column-end" style="background-image: url({{url('assets/images/workouts/chest-workout.png')}})">
            <h3 class="mb-10">Treino C</h3>
            <p>90 min | Ter/Qui/Sab</p>
        </div>
   </a>
    </section>

    <livewire:timer-modal />
    <livewire:mobile-menu activeMenu="home"/>
</x-layouts.student-layout>
