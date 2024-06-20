<x-layouts.teacher-layout page="EXERCÍCIOS">
    <section class="home-teacher-header default-flex-column mb-40">
        <h3 class="mb-10">Olá, {{Auth::user()->name}}!</h3>

        <p class="welcome-minor-text mb-40">Seja bem vindo(a)</p>

        <div class="home-teacher-header-date-area default-flex-between w-100">
            <p>{{Str::headline(\Carbon\Carbon::now()->locale('pt_BR')->isoFormat('dddd - DD/MM'))}}</p>

            <p>{{\Carbon\Carbon::now()->locale('pt_BR')->format('H:i')}}</p>
        </div>
    </section>

    <livewire:adm-search />

    <main>
        <livewire:exercises-area />
    </main>

    <livewire:mobile-menu activeMenu="workouts"/>
</x-layouts.teacher-layout>
