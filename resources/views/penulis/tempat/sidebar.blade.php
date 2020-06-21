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
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{($m_url == 'profil') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/penulis/profil">
          <i class="fas fa-fw fa-user"></i>
          <span>Profil</span>
        </a>
      </li>
      <li class="nav-item {{($m_url == 'produk') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/penulis/post">
          <i class="fas fa-fw fa-cubes"></i>
          <span>Produk</span>
        </a>
      </li>
      <li class="nav-item {{($m_url == 'keranjang') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/penulis/tag">
          <i class="fas fa-fw fa-cubes"></i>
          <span>Keranjang</span>
        </a>
      </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
