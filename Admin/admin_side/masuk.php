   <!-- ======== sidebar-nav start =========== -->
   <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
        <a href="index.html">
          <img src="<?= base_url(); ?>assets/images/logo/logo.svg" alt="logo" />
        
        </a>
      </div>
      <nav class="sidebar-nav">
        <ul>
          
              

          <li class="nav-item ">
            <a href="<?= base_url('admin') ?>">
              <span class="icon">
              <i class="material-icons">apps</i>

              </span>
              <span class="text">Home</span>
            </a>
          </li>
         
           
          
          <span class="divider"><hr /></span>

       
          <li class="nav-item active">
            <a href="<?= base_url('admin/laporan_masuk') ?>">
              <span class="icon">
              <i class="material-icons">assignment_returned</i>
                
              </span>
              <span class="text">Laporan Masuk</span>
            </a>
          </li>
          <span class="divider"><hr /></span>

          <li class="nav-item">
            <a href="<?= base_url('admin/laporan_proses') ?>">
              <span class="icon">
              <i class="material-icons">assignment</i>
              </span>
              <span class="text">Diproses</span>
            </a>
          </li>
          <span class="divider"><hr /></span>

          <li class="nav-item">
            <a href="<?= base_url('admin/laporan_selesai') ?>">
              <span class="icon">
              <i class="material-icons">assignment_turned_in</i>
              </span>
              <span class="text">Laporan Selesai</span>
            </a>
          </li>
          <span class="divider"><hr /></span>

          <li class="nav-item">
            <a href="<?= base_url('admin/laporan_ditolak') ?>">
              <span class="icon">
              <i class="material-icons">assignment_late</i>
              </span>
              <span class="text">Laporan Ditolak</span>
            </a>
          </li>
          <span class="divider"><hr /></span>

          <li class="nav-item">
            <a href="<?= base_url('admin/print') ?>">
              <span class="icon">
              <i class="material-icons">print</i>
              </span>
              <span class="text">Cetak</span>
            </a>
          </li>
          <span class="divider"><hr /></span>

        </ul>
      </nav>
    
    </aside>
    <div class="overlay"></div>
