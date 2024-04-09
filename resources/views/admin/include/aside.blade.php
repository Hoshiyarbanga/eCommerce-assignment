<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{asset('assets/images/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LARAVEL SHOP</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('view-dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can('view-users')
                <li class="nav-item">
                    <a href="{{route('view-users')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-users-line"></i>
                        <p>Users</p>
                    </a>
                </li>
                @endcan
                @can('view-role')
                <li class="nav-item">
                    <a href="{{route('view-role')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-user-tag"></i>
                        <p>Roles</p>
                    </a>
                </li>
                @endcan
                @can('view-category')
                <li class="nav-item">
                    <a href="{{route('view-category')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-list"></i>
                        <p>Category</p>
                    </a>
                </li>
                @endcan
                @can('view-sub-category')
                <li class="nav-item">
                    <a href="{{route('view-sub-category')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-list"></i>
                        <p>Sub Category</p>
                    </a>
                </li>
                @endcan
                @can('view-products')
                <li class="nav-item">
                    <a href="{{route('view-products')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Products</p>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <a href="{{route('seller-orders')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Payment</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>