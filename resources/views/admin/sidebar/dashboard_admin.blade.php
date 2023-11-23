<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="{{ route('home_admin') }}">Home</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item active">
                    <a href="{{ route('home_admin') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-shield-lock"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-text-fill"></i>
                        <span>Survei</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('sortir_admin') }}">
                                <i class="bi bi-plus-circle-fill"></i> Sortir
                            </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('daftar_pembayaran') }}">
                                <i class="bi bi-upload"></i> Belum Bayar
                            </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#">
                                <i class="bi bi-card-checklist"></i> Sudah Bayar
                            </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#">
                                <i class="bi bi-card-checklist"></i> Disetujui
                            </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#">
                                <i class="bi bi-card-checklist"></i> Dibatalkan
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <div class="card-body">
                        <div class="badges">
                            @if (auth()->user())
                                <span>Username: <span
                                        class="fw-bolder">{{ auth('admin')->user()->username }}</span></span>
                            @endif
                            <hr>
                            <span>Sebagai:</span>
                            <span class="badge bg-success">Admin</span>
                        </div>
                    </div>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('change/password') }}" class='sidebar-link'>
                        <i class="bi bi-shield-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub visually-hidden">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Halaman Pengguna</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('userManagement') }}">Daftar Pengguna</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('logout_admin') }}" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
