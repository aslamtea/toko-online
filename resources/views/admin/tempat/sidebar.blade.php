 <!-- Sidebar -->
 <ul class="navbar-nav samping sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fab fa-playstation"></i>
      </div>
      <div class="sidebar-brand-text mx-3">ASLAM<sup>Tea</sup></div>
    </a>
    <hr>
      <li class="nav-item active">
      </li>
    <!-- Heading -->
    @foreach (Alya() as $item)
    <div class="sidebar-heading">
      {{$item->name}}
    </div>
    <hr class="sidebar-divider">

     @foreach (oke() as $t)
        @if ($item->id == $t->menu_id)
        @if ($t->name == $name)
            <li class="nav-item active">
        @else
        <li class="nav-item">
        @endif
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#{{substr($t->name,0,2)}}" aria-expanded="true"
          aria-controls="{{substr($t->name,0,3)}}">
          <i class="{{$t->icon}}"></i>
          <span>{{$t->name}}</span>
        </a>

    <div id="{{substr($t->name,0,2)}}" class="collapse {{($name == $t->name) ? 'show' : ''}}"  data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            @foreach (oge() as $adaw)
            @if ($t->id == $adaw->submenu_id)
          <a class="collapse-item {{($m_url == $adaw->name) ? 'active' : ''}}" href="{{$adaw->url}}">{{$adaw->name}}</a>
            @endif
            @endforeach
          </div>
        </div>
      </li>
      @endif
    @endforeach
    @endforeach

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
