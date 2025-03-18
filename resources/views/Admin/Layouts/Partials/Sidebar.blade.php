<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <p></p>
            <!-- <img src="/assets/img/logo.png" width="25%" style="margin-top: 10px; margin-left: 30%; margin-bottom: 10px;"> -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/informasi*') ? 'active' : '' }}" href="/admin/informasi">
                    <span data-feather="info" class="align-text-bottom"></span>
                    Informasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/visi*') ? 'active' : '' }}" href="/admin/visi">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Visi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/misi*') ? 'active' : '' }}" href="/admin/misi">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Misi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/testimonies*') ? 'active' : '' }}" href="/admin/testimonies">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Testimoni
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/products*') ? 'active' : '' }}" href="/admin/products">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/services*') ? 'active' : '' }}" href="/admin/services">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Services
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/achievements*') ? 'active' : '' }}" href="/admin/achievements">
                    <span data-feather="award" class="align-text-bottom"></span>
                    Achievement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/structures*') ? 'active' : '' }}" href="/admin/structures">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Company Structure
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/careers*') ? 'active' : '' }}" href="/admin/careers">
                    <span data-feather="award" class="align-text-bottom"></span>
                    Career
                </a>
            </li>

        </ul>


        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>ADMINISTRATOR</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/publikasi*') ? 'active' : '' }}" href="/admin/publikasi">
                    <span data-feather="external-link" class="align-text-bottom"></span>
                    Publikasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/kategori*') ? 'active' : '' }}" href="/admin/kategori">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Kategori
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/pengguna*') ? 'active' : '' }}" href="/admin/pengguna">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Pengguna
                </a>
            </li>
        </ul>


        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>UTILITES</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/profil*') ? 'active' : '' }}" href="/admin/profil/{{ auth()->user()->id }}/edit">
                    <span data-feather="settings" class="align-text-bottom"></span>
                    Pengaturan
                </a>
            </li>
        </ul>

    </div>
</nav>