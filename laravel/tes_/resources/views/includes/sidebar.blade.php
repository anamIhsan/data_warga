<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DATA WARGA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/avatar1.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">{{ Auth::user()->email }}</a>
          <span class="right badge badge-success">{{ Auth::user()->roles }}</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" 
              class="nav-link
              {{ (request()->is('dashboard')) ? 'active' : '' }}   
            ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item
            {{ (request()->is('kelola-data/data-penduduk')) ? 'menu-open' : '' }}
            {{ (request()->is('kelola-data/data-penduduk/create')) ? 'menu-open' : '' }}
            {{ (request()->is('kelola-data/data-penduduk/edit*')) ? 'menu-open' : '' }}
            {{ (request()->is('kelola-data/data-kartu-keluarga')) ? 'menu-open' : '' }}
            {{ (request()->is('kelola-data/data-kartu-keluarga/create')) ? 'menu-open' : '' }}
            {{ (request()->is('kelola-data/data-kartu-keluarga/edit*')) ? 'menu-open' : '' }}
            {{ (request()->is('kelola-data/data-kartu-keluarga/anggota*')) ? 'menu-open' : '' }}
          ">
            <a href="#" 
              class="nav-link
              {{ (request()->is('kelola-data/data-penduduk')) ? 'active' : '' }}  
              {{ (request()->is('kelola-data/data-penduduk/create')) ? 'active' : '' }}  
              {{ (request()->is('kelola-data/data-penduduk/edit*')) ? 'active' : '' }}  
              {{ (request()->is('kelola-data/data-kartu-keluarga')) ? 'active' : '' }}  
              {{ (request()->is('kelola-data/data-kartu-keluarga/create')) ? 'active' : '' }}  
              {{ (request()->is('kelola-data/data-kartu-keluarga/edit*')) ? 'active' : '' }} 
              {{ (request()->is('kelola-data/data-kartu-keluarga/anggota*')) ? 'active' : '' }} 
            ">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Kelola Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('kelola_data-data_penduduk') }}" 
                  class="nav-link
                  {{ (request()->is('kelola-data/data-penduduk')) ? 'active' : '' }}  
                  {{ (request()->is('kelola-data/data-penduduk/create')) ? 'active' : '' }}  
                  {{ (request()->is('kelola-data/data-penduduk/edit*')) ? 'active' : '' }}  
                ">
                  <i class="far fa-circle nav-icon text-warning text-warning"></i>
                  <p>Data Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kelola_data-data_kartu_keluarga') }}" 
                  class="nav-link
                  {{ (request()->is('kelola-data/data-kartu-keluarga')) ? 'active' : '' }}  
                  {{ (request()->is('kelola-data/data-kartu-keluarga/create')) ? 'active' : '' }}  
                  {{ (request()->is('kelola-data/data-kartu-keluarga/edit*')) ? 'active' : '' }} 
                  {{ (request()->is('kelola-data/data-kartu-keluarga/anggota*')) ? 'active' : '' }} 
                ">
                  <i class="far fa-circle nav-icon text-warning text-warning"></i>
                  <p>Data Kartu Keluarga</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item
            {{ (request()->is('sirkulasi-penduduk/data-lahir')) ? 'menu-open' : '' }}
            {{ (request()->is('sirkulasi-penduduk/data-lahir/create')) ? 'menu-open' : '' }}
            {{ (request()->is('sirkulasi-penduduk/data-lahir/edit*')) ? 'menu-open' : '' }}
            {{ (request()->is('sirkulasi-penduduk/data-meninggal')) ? 'menu-open' : '' }}
            {{ (request()->is('sirkulasi-penduduk/data-meninggal/create')) ? 'menu-open' : '' }}
            {{ (request()->is('sirkulasi-penduduk/data-meninggal/edit*')) ? 'menu-open' : '' }}
            {{ (request()->is('sirkulasi-penduduk/data-pendatang')) ? 'menu-open' : '' }}
            {{ (request()->is('sirkulasi-penduduk/data-pendatang/create')) ? 'menu-open' : '' }}
            {{ (request()->is('sirkulasi-penduduk/data-pendatang/edit*')) ? 'menu-open' : '' }}
            {{ (request()->is('sirkulasi-penduduk/data-pindah')) ? 'menu-open' : '' }}
            {{ (request()->is('sirkulasi-penduduk/data-pindah/create')) ? 'menu-open' : '' }}
            {{ (request()->is('sirkulasi-penduduk/data-pindah/edit*')) ? 'menu-open' : '' }}
          ">
            <a href="#" 
              class="nav-link
              {{ (request()->is('sirkulasi-penduduk/data-lahir')) ? 'active' : '' }}  
              {{ (request()->is('sirkulasi-penduduk/data-lahir/create')) ? 'active' : '' }}  
              {{ (request()->is('sirkulasi-penduduk/data-lahir/edit*')) ? 'active' : '' }}    
              {{ (request()->is('sirkulasi-penduduk/data-meninggal')) ? 'active' : '' }}  
              {{ (request()->is('sirkulasi-penduduk/data-meninggal/create')) ? 'active' : '' }}  
              {{ (request()->is('sirkulasi-penduduk/data-meninggal/edit*')) ? 'active' : '' }} 
              {{ (request()->is('sirkulasi-penduduk/data-pendatang')) ? 'active' : '' }}  
              {{ (request()->is('sirkulasi-penduduk/data-pendatang/create')) ? 'active' : '' }}  
              {{ (request()->is('sirkulasi-penduduk/data-pendatang/edit*')) ? 'active' : '' }} 
              {{ (request()->is('sirkulasi-penduduk/data-pindah')) ? 'active' : '' }}  
              {{ (request()->is('sirkulasi-penduduk/data-pindah/create')) ? 'active' : '' }}  
              {{ (request()->is('sirkulasi-penduduk/data-pindah/edit*')) ? 'active' : '' }} 
            ">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Sirkulasi Penduduk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('sirkulasi_penduduk-data_lahir') }}" 
                  class="nav-link
                  {{ (request()->is('sirkulasi-penduduk/data-lahir')) ? 'active' : '' }}  
                  {{ (request()->is('sirkulasi-penduduk/data-lahir/create')) ? 'active' : '' }}  
                  {{ (request()->is('sirkulasi-penduduk/data-lahir/edit*')) ? 'active' : '' }}  
                ">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Data Lahir</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sirkulasi_penduduk-data_meninggal') }}" 
                  class="nav-link
                  {{ (request()->is('sirkulasi-penduduk/data-meninggal')) ? 'active' : '' }}  
                  {{ (request()->is('sirkulasi-penduduk/data-meninggal/create')) ? 'active' : '' }}  
                  {{ (request()->is('sirkulasi-penduduk/data-meninggal/edit*')) ? 'active' : '' }}    
                ">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Data Meninggal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sirkulasi_penduduk-data_pendatang') }}" 
                  class="nav-link
                  {{ (request()->is('sirkulasi-penduduk/data-pendatang')) ? 'active' : '' }}  
                  {{ (request()->is('sirkulasi-penduduk/data-pendatang/create')) ? 'active' : '' }}  
                  {{ (request()->is('sirkulasi-penduduk/data-pendatang/edit*')) ? 'active' : '' }}  
                ">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Data Pendatang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sirkulasi_penduduk-data_pindah') }}" 
                  class="nav-link
                  {{ (request()->is('sirkulasi-penduduk/data-pindah')) ? 'active' : '' }}  
                  {{ (request()->is('sirkulasi-penduduk/data-pindah/create')) ? 'active' : '' }}  
                  {{ (request()->is('sirkulasi-penduduk/data-pindah/edit*')) ? 'active' : '' }}   
                ">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Data Pindah</p>
                </a>
              </li>
            </ul>
          </li>
          @if (Auth::user()->roles != 'WATCHER')
            <li class="nav-item
              {{ (request()->is('surat-keterangan/domisili')) ? 'menu-open' : '' }}
              {{ (request()->is('surat-keterangan/kelahiran')) ? 'menu-open' : '' }}   
              {{ (request()->is('surat-keterangan/kematian')) ? 'menu-open' : '' }}   
              {{ (request()->is('surat-keterangan/pendatang')) ? 'menu-open' : '' }}   
              {{ (request()->is('surat-keterangan/pindah')) ? 'menu-open' : '' }}  
            ">
              <a href="#" 
                class="nav-link
                {{ (request()->is('surat-keterangan/domisili')) ? 'active' : '' }}   
                {{ (request()->is('surat-keterangan/kelahiran')) ? 'active' : '' }}   
                {{ (request()->is('surat-keterangan/kematian')) ? 'active' : '' }}   
                {{ (request()->is('surat-keterangan/pendatang')) ? 'active' : '' }}   
                {{ (request()->is('surat-keterangan/pindah')) ? 'active' : '' }}   
              ">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Kelola Surat
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('surat_keterangan_domisili') }}" 
                    class="nav-link {{ (request()->is('surat-keterangan/domisili')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon text-warning text-warning"></i>
                    <p>Su-Ket Domisili</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('surat_keterangan_kelahiran') }}" 
                    class="nav-link {{ (request()->is('surat-keterangan/kelahiran')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon text-warning text-warning"></i>
                    <p>Su-Ket Kelahiran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('surat_keterangan_kematian') }}" 
                    class="nav-link {{ (request()->is('surat-keterangan/kematian')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon text-warning text-warning"></i>
                    <p>Su-Ket Kematian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('surat_keterangan_pendatang') }}" 
                    class="nav-link {{ (request()->is('surat-keterangan/pendatang')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon text-warning text-warning"></i>
                    <p>Su-Ket Pendatang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('surat_keterangan_pindah') }}" 
                    class="nav-link {{ (request()->is('surat-keterangan/pindah')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon text-warning text-warning"></i>
                    <p>Su-Ket Pindah</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif
          <li class="nav-header">SETTINGS</li>
          @if (Auth::user()->roles === 'SUPER ADMIN')
          <li class="nav-item">
            <a href="{{ route('pengguna') }}" 
              class="nav-link
              {{ (request()->is('pengguna')) ? 'active' : '' }}  
              {{ (request()->is('pengguna/create')) ? 'active' : '' }}  
              {{ (request()->is('pengguna/edit*')) ? 'active' : '' }}  
            ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pengguna Sistem
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="">
              @csrf
              @method('POST')
              <button type="submit" class="nav-link text-left bg-danger">
                <i class="nav-icon fas fa-arrow-circle-right"></i>
                <p>
                  Logout
                </p>
              </button>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>