{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo Centered -->
        <a class="navbar-brand mx-auto d-lg-none" href="#">
            <img src="logo.png" alt="Logo" width="100">
        </a>

        <!-- Toggler Button for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <a class="navbar-brand d-none d-lg-block" href="#">
                    <img src="https://w7.pngwing.com/pngs/787/486/png-transparent-vector-flame-pentecost-fire-logo-thumbnail.png" alt="Logo" width="100">
                </a>

                <!-- Left Menu -->
                @guest
    <p></p>
    @else
        <ul class="navbar-nav">
            

            @if(Auth::user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('companies.index') }}">Company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employees.index') }}">Employee</a>
                </li>
            @elseif(Auth::user()->role === 'employee')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee_index') }}">Employee</a>
                </li>
            @endif
        </ul>
    @endguest

                <!-- Right Menu (Login/Logout) -->
                <ul class="navbar-nav">
                    @guest
                        <!-- Show Login when user is NOT logged in -->
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <!-- Show Logout when user is logged in -->
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav> --}}


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo Centered -->
        <a class="navbar-brand mx-auto d-lg-none" href="#">
            <img src="logo.png" alt="Logo" width="100">
        </a>

        <!-- Toggler Button for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="d-flex w-100 justify-content-between align-items-center">
                {{-- <a class="navbar-brand d-none d-lg-block" href="#">
                    <img src="{{ asset('28699644_christmas_2012_new_6457.jpg') }}" alt="Logo" width="100">  
                </a> --}}

                <h4>Logistic World</h4>

                <!-- Left Menu -->
                @guest
                    <p></p>
                @else
                    <ul class="navbar-nav">
                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('companies.index') }}">Company</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('employees.index') }}">Employee</a>
                            </li>
                        @elseif(Auth::user()->role === 'employee')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('employee_index') }}">Employee</a>
                            </li>
                        @endif
                    </ul>
                @endguest

                <!-- Right Menu -->
                <ul class="navbar-nav">
                    @guest
                        <!-- Login Button -->
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <!-- Language Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Select Language
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                <li><a class="dropdown-item" href="{{ route('change.lang', ['lang' => 'en']) }}">English</a></li>
                                <li><a class="dropdown-item" href="{{ route('change.lang', ['lang' => 'fr']) }}">French</a></li>
                                <li><a class="dropdown-item" href="{{ route('change.lang', ['lang' => 'it']) }}">Italian</a></li>
                            </ul>
                        </div>
                        

                        <!-- Logout Button -->
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>

