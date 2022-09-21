<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link mb-3 p-0">
         <div class="brand__img__container">
            <img src="{{ asset('public/backend/dist/img/white.png') }}" alt="AdminLTE Logo" class="brand__img">
         </div>

        <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column admin__nav" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.home') }}" class="nav-link navlink__dashboard active">
                        <i class="fas fa-home home__dashboard"></i>
                        <p class="home__dashboard">Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">MAIN MENU</li>
                <li class="nav-item">
                    <a href="{{ route('admin.biz-cards.index') }}" class="nav-link">
                        <i class="fas fa-credit-card mr-2"></i>
                        <p>
                            BizCards
                        </p>
                    </a>
                </li>

                <!-- Memberships Starts -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-gift mr-2"></i>
                        <p>
                            Memberships <span class="plus__span__membership">+</span>
                            <!-- <i class="fas fa-plus"></i> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview memberships__ul">
                        <li class="nav-item">
                            <a href="{{ route('admin.memberships.index') }}" class="nav-link">
                                <p>Plans</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.custom-settings.index') }}" class="nav-link">
                                <p>Custom Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.upgrades.index') }}" class="nav-link">
                                <p>Upgrades</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.cron.index')}}" class="nav-link">
                                <p>Cron Logs</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Memberships ends -->
                <!-- Taxes -->

                <!-- Payment Methods -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-landmark mr-2"></i>
                        <p>
                            Payment Methods
                        </p>
                    </a>
                </li>
                <!-- Payment Methods -->
                <!-- Transaction Starts -->
                <li class="nav-item">
                    <a href="{{route('admin.transaction.list')}}" class="nav-link">
                        <i class="fas fa-chart-line  mr-2"></i>
                        <p>Transaction</p>
                    </a>
                </li>
                <!-- Transaction Ends -->

                <!-- Email Templates Starts -->
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-envelope mr-2"></i>
                        <p>Email Templates</p>
                    </a>
                </li> --}}
                <!-- Email Templates Ends -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-rss-square mr-2"></i>
                        <p>
                            Blogs<span class="plus__span">+</span>
                            <!-- <i class="fas fa-plus"></i> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview memberships__ul">
                        <li class="nav-item">
                            <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                                <p>All Blogs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link">
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.comment.index') }}" class="nav-link">
                                <p>Comments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.taxes.index')}}" class="nav-link">
                        <i class="fas fa-wallet mr-2"></i>
                        <p>
                            Taxes
                        </p>
                    </a>
                </li>
                <!-- Blogs Ends -->

                <li class="nav-header">SETTINGS</li>
                <!-- Settings -->
                <li class="nav-item">
                    <a href="{{url('settings/logo-copyright')}}" class="nav-link">
                        <i class="nav-icon fas fa-cog mr-2"></i>
                        <p>Setting<span class="plus__span">+</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.add.tutorial')}}" class="nav-link nav-text-color">
                        <i class="nav-icon far fa-play-circle mr-2"></i>
                        <p>Tutorials</p>
                    </a>
                </li>
                <li class="nav-header">ACCOUNT</li>
                <!-- User -->
                <li class="nav-item">
                    <a href="{{route('admin.user.list')}}" class="nav-link">
                        <i class="fas fa-users mr-2"></i>
                        <p>User</p>
                    </a>
                </li>
                <!-- Admin -->
                <li class="nav-item">
                    <a href="{{route('admin.adminUpdate.view')}}" class="nav-link">
                        <i class="fas fa-users-cog mr-2"></i>
                        <p>Admin</p>
                    </a>
                </li>
                <!-- Logout -->
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-power-off mr-2"></i>
                        <p>Logout</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
