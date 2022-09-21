  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown pt-2">
            {{-- <a class="dropdown-item" href="{{ route('logout') }}" --}}
            <a href="{{ route('logout') }}" class="popup-with-zoom-anim log__in"
                style="background-color: #007bff; color:white!important" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
               <i class="fas fa-power-off mr-2"></i>{{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </li>
    </ul>
  </nav>
  <!-- /.navbar -->
