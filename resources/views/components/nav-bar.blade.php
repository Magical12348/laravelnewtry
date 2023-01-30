{{-- <div id="mega-offer">
    <div class="title" class="max_width">
        Magical Offer FSD at ₹999 /- ends till
        <div class="date">
            <span id="days"></span>
            <div class="initial">D</div>
        </div>
        <div class="date">
            <span id="hours"></span>
            <div class="initial">H</div>
        </div>
        <div class="date">
            <span id="minutes"></span>
            <div class="initial">M</div>
        </div>
        <div class="date">
            <span id="seconds"></span>
            <div class="initial">S</div>
        </div>
    </div>
</div> --}}
<nav x-data="{ MenuOpen: false }" id="navbar" class="glass">
    <a href="{{ route('welcome') }}" class="link_image">
        <img class="image_logo" src="{{ asset('images/cropLogo.png') }}" alt="logo" />
        <div class="logo_flex">
            <span class="logo_text agency-fb">magical umbrella</span>
            <span class="logo_quote">"One Stop for Learning"</span>
        </div>
    </a>

    <livewire:search-bar />

    <img @click="MenuOpen = true" class="nav_menu_btn" src="https://img.icons8.com/ios-filled/100/000000/menu--v1.png"
        alt="hamburger menu" />

    <ul x-bind:class="MenuOpen ? 'active' : ''">
        <button @click="MenuOpen = false" class="close">&Cross;</button>

        @foreach (config('setting.nav_links') as $link)
            <li>
                <a href="{{ route($link['route']) }}"
                    class="{{ request()->routeIs($link['route']) ? 'active' : '' }}">{{ $link['name'] }}</a>
            </li>
        @endforeach
        @guest
            <li>
                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Sign In/Sign Up
                    </a>
            </li>
        @else
            @if (auth()->user()->is_admin)
                <li><a href="{{ route('home') }}">Admin Dashboard</a></li>
            @endif
        @endguest
        @auth
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle p-0" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: black" v-pre>
                    {{ auth()->user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.courses') }}">
                        My Courses
                    </a>
                    <a class="dropdown-item" href="{{ route('user.pdf') }}">
                        My Notes
                    </a>
                    <a class="dropdown-item" href="{{ route('user.referral') }}">
                        My Referral Code
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endauth
    </ul>
</nav>
<div id="course-strip">
    <div class="overflow-strip">
        <a href="https://www.magicalumbrella.com/?type=">Online Courses</a>
        <a href="https://www.magicalumbrella.com/?type=summercamp">Offline courses</a>
        <a href="https://www.magicalumbrella.com/?type=combo-pack">Combo pack</a>
        {{-- <a href="https://www.magicalumbrella.com/course-details/full-stack-web-development-ui-designing-figma-free">full
            stack web development</a>
        <a href="https://www.magicalumbrella.com/course-details/front-end-development-ui-designing-figma-free">front-end
            development</a>
        <a href="https://magicalumbrella.com/course-details/software-testingmanualautomation">software-testing(Manual+Automation)</a> --}}
        {{-- <a href="https://www.magicalumbrella.com/course-details/automation-testing">automation testing</a> --}}
    </div>
</div>

<div class="space-40"></div>

{{-- <script>
    // Set the date we're counting down to
    var countDownDate = new Date("2022-06-18T19:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.querySelector('#days').innerHTML = days;
        document.querySelector('#hours').innerHTML = hours;
        document.querySelector('#minutes').innerHTML = minutes;
        document.querySelector('#seconds').innerHTML = seconds;

        // Display the result in the element with id="demo"
        // document.getElementById("mega-offer").innerHTML = days + "d " + hours + "h " +
        //     minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("mega-offer").innerHTML = "EXPIRED";
        }
    }, 1000);
</script> --}}
