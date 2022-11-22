 <!-- ======== main-wrapper start =========== -->
 <main class="main-wrapper">
   <!-- ========== header start ========== -->
   <header class="header">
     <div class="container-fluid">
       <div class="row">
         <div class="col-lg-5 col-md-5 col-6">
           <div class="header-left d-flex align-items-center">
             <div class="menu-toggle-btn mr-20">
               <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                 <i class="lni lni-chevron-left me-2"></i> Menu
               </button>
             </div>

           </div>
         </div>
         <div class="col-lg-7 col-md-7 col-6">
           <div class="header-right">


             <div class="profile-box ml-15">
               <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                 <div class="profile-info">
                   <div class="info">
                     <h6><?= $user['nama'] ?></h6>
                     <div class="image">
                       <img src="<?= base_url('asset') ?>/images/profile/<?= $user['gambar'] ?>" alt="" />
                       <span class="status"></span>
                     </div>
                   </div>
                 </div>
               </button>
               <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">

                 <?php if ($this->session->userdata['is_active'] == 1) : ?>



                   <li>
                     <a href="<?= base_url('home/lo') ?>"> <i class="lni lni-exit"></i> Sign Out </a>
                   </li>

                 <?php else : ?>

                   <li>
                     <a href="<?= base_url('user/profile') ?>">
                       <i class="lni lni-user"></i>Profile
                     </a>
                   </li>
                   <li>
                     <a href="<?= base_url('user/notifikasi') ?>">
                       <i class="lni lni-alarm"></i> Notifications
                     </a>
                   </li>

                   <li>
                     <a href="<?= base_url('home/lo') ?>"> <i class="lni lni-exit"></i> Sign Out </a>
                   </li>

                 <?php endif; ?>

               </ul>
             </div>
             <!-- profile end -->
           </div>
         </div>
       </div>
     </div>
   </header>