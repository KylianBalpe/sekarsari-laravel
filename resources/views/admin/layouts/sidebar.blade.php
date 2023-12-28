<meta name="csrf-token" content="{{ csrf_token() }}">

<aside class="main-sidebar sidebar-light-primary elevation-1">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link text-center">
        {{-- <img src="/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-1" /> --}}
        <span class="brand-text">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel d-flex mb-3 mt-3 pb-3">
            <div class="image">
                <img src="/assets/img/user2-160x160.jpg" class="img-circle elevation-1" alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="/admin/product" class="nav-link {{ Request::is('admin/product*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/order" class="nav-link {{ Request::is('admin/order*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>Orders</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="/admin/payment" class="nav-link {{ Request::is('admin/payment*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>Payments</p>
                    </a>
                </li> --}}
                @can('superAdmin')
                    <li class="nav-item">
                        <a href="/admin/user" class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                @endcan
                <li class="nav-header">LOGOUT</li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link" id="logout-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault();

        // Mendapatkan token CSRF dari meta tag
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Membuat sebuah form sementara
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '/logout';

        // Menambahkan input token CSRF
        var csrfInput = document.createElement('input');
        csrfInput.setAttribute('type', 'hidden');
        csrfInput.setAttribute('name', '_token');
        csrfInput.setAttribute('value', csrfToken);

        // Menambahkan input submit
        var submitButton = document.createElement('button');
        submitButton.setAttribute('type', 'submit');
        submitButton.style.display = 'none';

        // Menyisipkan elemen-elemen ke dalam form
        form.appendChild(csrfInput);
        form.appendChild(submitButton);

        // Menambahkan form ke dalam dokumen dan submit secara otomatis
        document.body.appendChild(form);
        form.submit();
    });
</script>
