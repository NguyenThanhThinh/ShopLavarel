<!-- Navbar -->
<nav class="navbar-custom">
    <ul class="list-unstyled topbar-nav float-right mb-0">
        <li class="dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <span class="ml-1 nav-user-name hidden-sm">Thinh</span>
                <img src="/assets/images/users/user-5.jpg" alt="profile-user" class="rounded-circle" />
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><i data-feather="user" class="align-self-center icon-xs icon-dual mr-1"></i> Thông tin tài khoản</a>
                <div class="dropdown-divider mb-0"></div>
                <a class="dropdown-item" href="{{ route('changePassword') }}"><i data-feather="key" class="align-self-center icon-xs icon-dual mr-1"></i> Đổi mật khẩu</a>
                <div class="dropdown-divider mb-0"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"><i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> Đăng xuất</a>
            </div>
        </li>
    </ul><!--end topbar-nav-->
    <ul class="list-unstyled topbar-nav mb-0">
        <li>
            <button class="nav-link button-menu-mobile">
                <i data-feather="menu" class="align-self-center topbar-icon"></i>
            </button>
        </li>
    </ul>
</nav>
<!-- end navbar-->
