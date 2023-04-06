<div data-simplebar class="h-100">

    <!-- User details -->
    <div class="user-profile text-center mt-3">
        <div class="">
            <img src="{{ asset('be/assets/images/users/nito.jpg') }}" alt="" class="avatar-md rounded-circle">
        </div>
        <div class="mt-3">

            <h4 class="font-size-16 mb-1">{{ Auth::user()->name }}</h4>
            {{-- @if (Auth::user()->roles == 'ADMIN')
            @elseif(Auth::user()->roles == 'HANDYMAN')
            <h4 class="font-size-16 mb-1">Handyman</h4>
            @endif --}}
            <h4 class="font-size-16 mb-1">Admin</h4>

            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                Online</span>
        </div>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            {{--
            @foreach ($menus as $menu)
            <li>
                <a href="{{ route($menu->route) }}" class="waves-effect">
                    <i class="{{ $menu->icon }}"></i>
                    <span>{{ $menu->name }}</span>
                </a>

            </li>
            @endforeach --}}

         
            <li class="nav-item">
                <a href="{{ route('account.dashboard') }}" class="waves-effect {{ Route::is('admin.dashboard*') ? 'active' : '' }}">
                    <i class="ri-file-copy-line"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="menu-title">Master</li>
            <li class="nav-item">
                <a href="{{ route('account.jabatan.index') }}" class="waves-effect {{ Route::is('account.jabatan*') ? 'active' : '' }}">
                    <i class="ri-file-copy-line"></i><span>Jabatan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('account.kontrak.index') }}" class="waves-effect {{ Route::is('account.kontrak*') ? 'active' : '' }}">
                    <i class="ri-file-copy-line"></i><span>Kontrak</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('account.pegawai.index') }}" class="waves-effect {{ Route::is('account.pegawai*') ? 'active' : '' }}">
                    <i class="ri-file-copy-line"></i><span>Pegawai</span>
                </a>
            </li>
      
            {{-- <li>
                <a href="{{ route('account.category.index') }}" class="waves-effect">
                    <i class="ri-file-copy-line"></i><span <span>Category</span>
                </a>
            </li>
            <li>
                <a href="{{ route('account.service.index') }}" class="waves-effect">
                    <i class="ri-customer-service-line"></i>
                    <span>Service</span>
                </a>
            </li>

            <li>
                <a href="{{ route('account.order.index') }}" class="waves-effect">
                    <i class="ri-shopping-cart-2-line"></i>
                    <span>Order</span>
                </a>
            </li>

            <li class="menu-title">Employee</li>

            <li>
                <a href="#" class="waves-effect">
                    <i class="ri-customer-service-line"></i>
                    <span>Handyman</span>
                </a>
            </li>

            <li>
                <a href="{{ route('account.dashboard.index') }}" class="waves-effect">
                    <i class="ri-dashboard-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('account.order.index') }}" class="waves-effect">
                    <i class="ri-file-copy-line"></i><span <span>Order</span>
                </a>
            </li> --}}



        </ul>
    </div>
    <!-- Sidebar -->
</div>