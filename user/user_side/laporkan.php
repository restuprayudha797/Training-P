   <!-- ======== sidebar-nav start =========== -->
   <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
        <a href="index.html">
          <img src="<?= base_url(); ?>assets/images/logo/logo.svg" alt="logo" />
        
        </a>
      </div>
      <nav class="sidebar-nav">
        <ul>
          
              

          <li class="nav-item  ">
            <a href="<?= base_url('user') ?>">
              <span class="icon">
              <i class="material-icons">dashboard</i>

              </span>
              <span class="text">Home</span>
            </a>
          </li>
         
           
          
          <span class="divider"><hr /></span>

       
          <li class="nav-item active ">
            <a href="<?= base_url('user/laporkan') ?>">
              <span class="icon">
              <i class="material-icons">report  </i>
                
              </span>
              <span class="text">Laporkan</span>
            </a>
          </li>
          <span class="divider"><hr /></span>

          <li class="nav-item">
            <a href="<?= base_url('user/notifikasi') ?>">
              <span class="icon">
              <i class="material-icons">notifications</i>
              </span>
              <span class="text">Notifikasi</span>
            </a>
          </li>
          <span class="divider"><hr /></span>

          <li class="nav-item ">
            <a href="<?= base_url('user/proses') ?>">
              <span class="icon">
              <i class="material-icons">import_contacts</i>
              </span>
              <span class="text">Dalam Proses</span>
            </a>
          </li>
          <span class="divider"><hr /></span>

          <li class="nav-item ">
            <a href="<?= base_url('user/laporan_selesai') ?>">
              <span class="icon">
              <i class="material-icons">assignment_turned_in</i>
              </span>
              <span class="text">Laporan Selesai</span>
            </a>
          </li>
          <span class="divider"><hr /></span>

          <li class="nav-item">
            <a href="<?= base_url('user/laporan_ditolak') ?>">
              <span class="icon">
              <i class="material-icons">assignment_late</i>
              </span>
              <span class="text">Laporan Ditolak</span>
            </a>
          </li>
          <span class="divider"><hr /></span>

          <li class="nav-item">
            <a href="<?= base_url('user/profile') ?>">
              <span class="icon">
              <i class="material-icons">assignment_ind</i>
              </span>
              <span class="text">Profile</span>
            </a>
          </li>
          <span class="divider"><hr /></span>

        </ul>
      </nav>
    
    </aside>
    <div class="overlay"></div>
