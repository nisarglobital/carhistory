<header style="position: absolute;top: 20px;right: 0;left: 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light nav" style="border-radius: 5px;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ route('home-page') }}"><img src="{{ asset('assets/images/logo.svg') }}" alt="My Car History Logo"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="flex-grow: unset;">
                            <div class="navbar-nav align-items-center">
                                <a class="nav-link pe-4 active" aria-current="page" href="{{ route('home-page') }}">Home</a>
                                <a class="nav-link pe-4 " href="{{ route('sample-report') }}">Sample Report</a>
                                <a class="nav-link pe-4 " href="#">VIN and Plate Check</a>
                                <a class="nav-link pe-4 " href="#">Pricing for B2C</a>
                                <a class="nav-link pe-4 " href="#">B2B Pricing</a>
                                <a class="nav-link pe-4 " href="#">About Us</a>


                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle web_btn" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ auth()->check() ? auth()->user()->name : 'Dealer Login' }}
                                    </a>

                                    <!-- Dropdown menu that appears when the user clicks on the above link -->
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if(auth()->check())
                                            <!-- If the user is authenticated, show Dashboard, Profile, and Logout links -->
                                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                            <li>
                                                <!-- Logout link with form submission (as required by Laravel) -->
                                                <a class="dropdown-item"
                                                   href="{{ route('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                >
                                                    Logout
                                                </a>
                                                <!-- Form to handle logout request -->
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        @else
                                            <!-- If the user is not authenticated, show login link -->
                                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                        @endif
                                    </ul>

                                </li>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </div>
</header>
