<x-layouts.student-layout page="HOME">
    <section class="home-student-header default-flex-column mb-40">
        <h3 class="mb-10">Olá, Aluno(a)!</h3>

        <p class="welcome-minor-text mb-40">Seja bem bindo(a)</p>

        <div class="home-student-header-date-area default-flex-between mb-40 w-100">
            <p>{{Str::headline(\Carbon\Carbon::now()->locale('pt_BR')->isoFormat('dddd - DD/MM'))}}</p>

            <p>{{\Carbon\Carbon::now()->locale('pt_BR')->format('H:i')}}</p>
        </div>

        <h4>O que vai ser Hoje?</h4>
    </section>

    <livewire:chose-workouts-area />

    <livewire:timer-modal />
    <livewire:mobile-menu activeMenu="home" />
</x-layouts.student-layout>
