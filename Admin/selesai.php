<h2 class="p-5 text-center">DATA LAPORAN SELESAI</h2>


<div class="container bg-light">


  <div class="">

    <center>
      <table class="table table-light table-borderless  ">

        <thead class="text-center">

          <tr>
            <th>
              <h6>No</h6>
            </th>
            <th>
              <h6>Nik</h6>
            </th>
            <th>
              <h6>Nama</h6>
            </th>
            <th>
              <h6>Laporan</h6>
            </th>
            <th>
              <h6>Status</h6>
            </th>
            <th>
              <h6>Action</h6>
            </th>
          </tr>
        </thead>

        <?php $i = 1; ?>
        <?php foreach ($laporan as $pelaporan) : ?>

          <tbody class="text-center">

            <tr>
              <td><?= $i ?></td>
              <td><?= $pelaporan['NIK'] ?></td>
              <td><?= $pelaporan['nama'] ?></td>
              <td><?= $pelaporan['judulLaporan'] ?></td>
              <td><i class="btn btn-success ">Selesai</i></td>

              <td>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#a<?= $pelaporan['id_pelaporan'] ?>">
                  <i class="material-icons">more_vert</i>
                </button>

              </td>

            </tr>
          </tbody>

          <?php $i++; ?>
        <?php endforeach; ?>



      </table>
    </center>
  </div>
</div>


<!-- awal dari modal -->
<?php foreach ($laporan as $modal) : ?>


  <div class="modal fade" id="a<?= $modal['id_pelaporan'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel"><?= $modal['nama'] ?></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body " style="overflow-y: scroll; height:450px">

          <div class="container">

            <div class="mb-3 mt-3 ">
              <center>

                <img class="" src="<?= base_url('asset/images/profile/') . $modal['gambar']  ?>" alt="<?= $modal['nama'] ?>" style="border-radius: 50%" width="250px" height="250px">

              </center>
              <div class="row mt-5">
                <div class="col-sm-1 ">Nik:</div>
                <div class="col-sm-3 "><?= $modal['NIK'] ?></div>
              </div>
              <div class="row ">
                <div class="col-sm-1 ">Nama:</div>
                <div class="col-sm-3 "><?= $modal['nama'] ?></div>
              </div>
              <div class="row ">
                <div class="col-sm-1 ">No tlp:</div>
                <div class="col-sm-3 "><?= $modal['notlp'] ?></div>
              </div>
              <div class="row ">
                <div class="col-sm-1 ">Email:</div>
                <div class="col-sm-3 "><?= $modal['email'] ?></div>
              </div>
              <div class="row ">
                <div class="col-sm-1 ">Alamat:</div>
                <div class="col-sm-3 "><?= $modal['alamat'] ?></div>
              </div>
            </div>


            <br>
            <hr>

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

        <div class="modal-footer">
          <p class="btn btn-succes">
          <p>Selesai</p><i class="material-icons right">done</i></p>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- akhir dari modal -->