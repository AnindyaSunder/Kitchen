<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('public/backend/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="{{ route('dashboard') }}" class="simple-text logo-normal">
          mama's kitchen
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{Request::is('admin/dashboard*') ? 'active' : '' }}  ">
            <a class="nav-link" href="{{route('dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('admin/slider*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('sindex')}}">
              <i class="material-icons">slideshow</i>
              <p>Slider</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('categoryshow')}}">
              <i class="material-icons">category</i>
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/item*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('itemshow')}}">
              <i class="material-icons">fastfood</i>
              <p>Item</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/reservation*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('reservationshow')}}">
              <i class="material-icons">deck</i>
              <p>Reservation</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/contact*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('contactshow')}}">
              <i class="material-icons">message</i>
              <p>Contact Message</p>
            </a>
          </li>
        </ul>
      </div>
    </div>