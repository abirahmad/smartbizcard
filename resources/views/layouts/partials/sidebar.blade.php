
<!-- Main Sidebar Container -->
<aside class="main-sidebar  elevation-4">
  <!-- Brand Logo -->

  <div class="top-dashboard-header">
  <a href="index3.html">
    <img src="{{asset('public/backend/images/vcard/smartvcardlogo.png')}}" alt="site Logo" class="brand__img">
    {{-- <p class="text-center text-white d-block">Smarter <span class=" font-weight-bold text-white">BizCard</span></p> --}}
  </a>
</div>
  <!-- Sidebar -->
  <div class="sidebar sidebar-dark-primary justify-content-center">
    <!-- Sidebar Menu -->
    <nav class="mt-4">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        {{-- <li class="nav-item menu-open">
          <a href="#" class="nav-link navlink__dashboard active">
          <i class="fas fa-home home__dashboard"></i>
            <p class="home__dashboard">Dashboard</p>
          </a>
        </li> --}}


        <li class="nav-item ml-1 mt-2">
          <a href="{{ route('home') }}" class="nav-link nav-text-color">
            <i class="fas fa-home text-white mr-2"></i>
            <p>
                Home
            </p>
          </a>
        </li>

        <li class="nav-item ml-1">
          <a href="{{route('vcard.create')}}"  class="nav-link nav-text-color">
            <i class="fas fa-credit-card mr-2"></i>
            <p>
               My BizCard
            </p>
          </a>
        </li>
        <!-- Memberships Starts -->

        <!-- Memberships ends -->
        <!-- Payment Methods -->
        <li class="nav-item">
          <a href="{{ route('invite.index') }}" class="nav-link nav-text-color">
            <i class="nav-icon fas fa-user-friends mr-2"></i>
            <p>
              People
            </p>
          </a>
        </li>
        <!-- Payment Methods -->

        <!-- Share Contact Methods -->
        <li class="nav-item">
          <a href="{{ route('share-contact.list') }}" class="nav-link nav-text-color">
            <i class="nav-icon fa fa-share-alt mr-2"></i>
            <p>
              Share Contact
            </p>
          </a>
        </li>
        <!-- Share Contact Methods -->

        <!-- Transaction Starts -->
        <li class="nav-item">
          <a href="{{ route('membership') }}" class="nav-link nav-text-color">
            <i class="nav-icon fas fa-gift mr-2"></i>
            <p>Membership</p>
          </a>
        </li>
        <!-- Transaction Ends -->

        <!-- Email Templates Starts -->
        <li class="nav-item">
          <a href="{{ route('qrcode') }}" class="nav-link nav-text-color">
            <i class="fas fa-qrcode nav-icon mr-2"></i>
            <p>QR Builder</p>
          </a>
        </li>
        <!-- Email Templates Ends -->
        <li class="nav-item">
          <a href="{{ route('transaction') }}" class="nav-link nav-text-color">
            <i class="nav-icon fas fa-exchange-alt mr-2"></i>
            <p>Transactions</p>
          </a>
        </li>
        <li class="nav-item mb-5">
          <a href="{{route('settings.user')}}" class="nav-link nav-text-color">
            <i class="nav-icon fas fa-cog mr-2"></i>
            <p>Settings</p>
          </a>
        </li>

        <!-- User -->
        <li class="nav-item mt-5">
          <a href="{{route('tutorials.index')}}" class="nav-link nav-text-color">
            <i class="nav-icon far fa-play-circle mr-2"></i>
            <p>Tutorials</p>
          </a>
        </li>
        <!-- Admin -->
        <li class="nav-item">
          <a href="{{route('feedback.index')}}" class="nav-link nav-text-color">
            <i class="nav-icon far fa-lightbulb mr-2"></i>
            <p>Feedback</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link nav-text-color">
            <i class="nav-icon fas fa-headphones mr-2"></i>
            <p>Help Center</p>
          </a>
        </li>
        <!-- Logout -->
        <li class="nav-item">
          <a href="{{route('logout')}}" class="nav-link nav-text-color"  onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-power-off mr-2"></i>
            <p>Logout</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
