<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="../dashboard/index.html" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="../assets/images/logo-dark.svg" class="img-fluid logo-lg" alt="logo">
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item">
          <a href="{{ route('dashboard') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>

        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span class="pc-mtext">Master Cuti</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="{{ route('bidang') }}">Jenis Cuti</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('kategori_cuti') }}">Kategori Cuti</a></li>
          </ul>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span class="pc-mtext">Master Data</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="{{ route('bidang') }}">Bidang</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('perusahaan') }}">Perusahaan</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('posisi') }}">Posisi</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('pegawai_lvl') }}">Level Manager</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('kelompok_umur') }}">Kelompok Umur</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('jenis_pekerjaan') }}">Jenis Pekerjaan</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('jenis_karyawan') }}">Jenis Karyawan</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('golongan_pekerjaan') }}">Golongan Pekerjaan</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('kelompok_gol_pekerjaan') }}">Kelompok Golongan Pekerjaan</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('ptkp_stts_anak') }}">PTKP Status Anak</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('pegawai') }}">Pegawai</a></li>
          </ul>
        </li>
        <li class="pc-item">
          <a href="{{ route('user') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user"></i></span>
            <span class="pc-mtext">Akun</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-power"></i></span>
            <span class="pc-mtext">Keluar</span>
          </a>
        </li>
      </ul>
  </div>
</nav>
