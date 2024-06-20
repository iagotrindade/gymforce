<div class="mobile-menu">
    <nav>
        <ul class="default-flex-around mobile-menu-icons-area">
            <li>
                @hasrole('student')
                    <a href="{{route('home')}}">
                        <i class='bx bxs-home @if($activeMenu == 'home') active-menu @endif'></i>
                    </a>
                @else

                    <a href="{{route('adm')}}">
                        <i class='bx bxs-home @if($activeMenu == 'home') active-menu @endif'></i>
                    </a>
                @endhasrole
            </li>

            @hasrole('student')
                <li>
                    <i class='bx bxs-time-five @if($activeMenu == 'timer') active-menu @endif' wire:click="$dispatch('openTimerModal')"></i>
                </li>
            @endhasrole

            @hasanyrole('Super-Admin|admin|teacher')
                <li>
                    <i class='bx bx-search-alt-2 @if($activeMenu == 'search') active-menu @endif' wire:click="$dispatch('openSearch')" wire:click="openSearch"></i>
                </li>
            @endhasrole

            <li>
                @hasrole('student')
                    <a href="{{route('home')}}">
                        <i class='bx bx-dumbbell @if($showingTraining == true) active-menu @endif'></i>
                    </a>
                @else
                    <a href="{{route('workout.adm')}}">
                        <i class='bx bx-dumbbell @if($activeMenu == 'workouts') active-menu @endif'></i>
                    </a>
                @endhasrole
            </li>

            @hasrole('student')
                <li>
                    <a href="{{route('profile')}}">
                        <i class='bx bx-user @if($activeMenu == 'profile') active-menu @endif'></i>
                    </a>
                </li>
            @endhasrole
        </ul>
    </nav>
</div>
