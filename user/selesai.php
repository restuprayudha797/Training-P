<div class="container p-3">
  <div class="row p-3  ">

    <?php foreach ($notifikasi as $notif) :   ?>
      <div class="bg-light" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
        <div class="col-sm-6 p-3 bg-light">
          <div class="d-flex">
            <div class="isi">
              <b>Laporan anda: <?= $notif['judulLaporan'] ?></b>
              <p><?= $notif['notif'] ?></p>
              <br>
              <p class="text-disable"><?= date('d F Y', $notif['n_masuk']) ?></p>
            </div>

            <div class="col-sm-1 p-3 ">
              <center>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#a<?= $notif['id_notifikasi'] ?>">
                  <i class="material-icons">more_vert</i>
                </button>
              </center>


            </div>
          </div>

        </div>
      </div>
      <hr>

    <?php endforeach; ?>

  </div>
</div>





<!-- awal dari modal -->

<?php foreach ($notifikasi as $modal) : ?>




  <div class="modal fade" id="a<?= $modal['id_notifikasi'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel"><?= $modal['judulLaporan'] ?></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body " style="overflow-y: scroll; height:450px">

          <div class="container">

            <div class="mb-3 mt-3 ">
              <div class="mb-3 mt-5  ">
                <div class="row ">
                  <div class="col-sm-2">Judul Laporan:</div>
                  <div class="col-sm-9"><?= $modal['judulLaporan'] ?></div>
                </div>
                <div class="row ">
                  <div class="col-sm-2 ">Laporan:</div>
                  <div class="col-sm-9 "><?= $modal['laporan'] ?></div>
                </div>
              </div>
            </div>

            <div class="gbr  mt-4">
              <center>
                <img src="<?= base_url('asset/images/pelaporan/') . $modal['bukti'] ?>" width="20%" alt="">

              </center>
            </div>

          </div>


        </div>

        <div class="modal-footer">
          <p class="btn btn-succes">
          <p>Selesai</p><i class="material-icons right">done</i></p>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- akhir dari modal -->