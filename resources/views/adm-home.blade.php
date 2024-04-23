<x-layouts.student-layout page="HOME">
    <section class="home-teacher-header default-flex-column mb-40">
        <h3 class="mb-10">Olá, Professor(a)!</h3>

        <p class="welcome-minor-text mb-40">Seja bem bindo(a)</p>

        <div class="home-teacher-header-date-area default-flex-between w-100">
            <p>Sábado - 18/04</p>

            <p>21:17</p>
        </div>
    </section>

    <main>
        <livewire:students-area />
    </main>
    
    <livewire:mobile-menu activeMenu="home"/>
</x-layouts.student-layout>
