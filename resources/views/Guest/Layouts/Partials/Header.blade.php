

<nav class="navbar navbar-expand-lg bg-secondary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="/" class="navbar-brand ms-3 d-lg-none" >PT.SOHOU KIKAKU INDONESIA</a>
    <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto p-3 p-lg-0 mx-auto">
            <!-- <a class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
            <img src="/assets/img/logo.png" class="logo-banner s" alt="" style="width: 30px; height: 30px;">
            </a> -->
            <a class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
            <img src="/assets/img/logo.png" alt="Logo" class="logo-img" style="width: 30px; height: auto; margin-right: 10px; ">
            PT.SOHOU KIKAKU INDONESIA</a>
            <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">HOME</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ Request::is('about', 'structure') ? 'active' : '' }}" data-bs-toggle="dropdown">PROFILE</a>
                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                    <a href="/about" class="dropdown-item">ABOUT US</a>
                    <a href="/structure" class="dropdown-item">COMPANY STRUCTURE</a>
                    <a href="/partner" class="dropdown-item">OUR PARTNER</a>
                    <a href="/socialimpact" class="dropdown-item">SOCIAL IMPACT</a>
                </div>
            </div>
            <!-- <a href="/Company-Achievement" class="nav-item nav-link {{ Request::is('Company-Achievement') ? 'active' : '' }}">ACHIEVEMENT</a> -->
            <a href="{{ route('guest.achievement.index') }}" class="nav-item nav-link {{ Request::is('guest/achievement') ? 'active' : '' }}">ACHIEVEMENT</a>
            <a href="{{ route('guest.product.index') }}" class="nav-item nav-link {{ Request::is('guest/product') ? 'active' : '' }}">PRODUCT</a>
            <a href="{{ route('guest.service.index') }}" class="nav-item nav-link {{ Request::is('guest/service') ? 'active' : '' }}">SERVICE</a>
            <a href="/contact" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">CONTACT US</a>
            <a href="{{ route('guest.career.index') }}" class="nav-item nav-link {{ Request::is('guest/career') ? 'active' : '' }}">CAREER</a>

            <form action="{{ route('search') }}" method="GET" class="d-flex">
    <input class="form-control form-control-sm me-2" type="search" name="query" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-light btn-sm" type="submit"><i class="bi bi-search"></i></button>
</form>

        </div>
    </div>
</nav>