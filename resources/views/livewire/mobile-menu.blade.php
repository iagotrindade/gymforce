<div class="mobile-menu">
    <nav>
        <ul class="default-flex-around mobile-menu-icons-area">
            <li>
                <a href="{{route('home')}}">
                    <i class='bx bxs-home @if($activeMenu == 'home') active-menu @endif'></i>
                </a>
            </li>

            <li>
                <i class='bx bxs-time-five @if($activeMenu == 'timer') active-menu @endif' wire:click="$dispatch('openTimerModal')"></i>
            </li>

            <li>
                <i class='bx bx-search-alt-2 @if($activeMenu == 'search') active-menu @endif' wire:click="$dispatch('openSearch')"></i>
            </li>

            <li>
                <a href="{{route('home')}}">
                    <i class='bx bx-dumbbell @if($activeMenu == 'workouts') active-menu @endif'></i>
                </a>
            <li>
                <a href="{{route('profile')}}">
                    <i class='bx bx-user @if($activeMenu == 'profile') active-menu @endif'></i>
                </a>
            </li>
        </ul>
    </nav>
</div>
