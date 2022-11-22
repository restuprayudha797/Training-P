<div class="container p-3">
    <div class="row p-3  ">

        <?php foreach ($notifikasi as $notif) : ?>
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

                                <?php if ($notif['title'] == 'Selesai') : ?>

                                    <a href="<?= base_url('user/laporan_selesai') ?>">

                                        <button class="btn btn-<?= $notif['warna'] ?>">
                                            <i class="material-icons"><?= $notif['logo'] ?></i><?= $notif['title'] ?>
                                        </button>
                                    </a>
                                <?php endif; ?>
                                <?php if ($notif['title'] == 'Ditolak') : ?>

                                    <a href="<?= base_url('user/laporan_ditolak') ?>">

                                        <button class="btn btn-<?= $notif['warna'] ?>">
                                            <i class="material-icons"><?= $notif['logo'] ?></i><?= $notif['title'] ?>
                                        </button>
                                    </a>

                                <?php endif; ?>

                                <?php if ($notif['title'] == 'Proses') : ?>

                                    <a href="<?= base_url('user/proses') ?>">

                                        <button class="btn btn-<?= $notif['warna'] ?>">
                                            <i class="material-icons"><?= $notif['logo'] ?></i><?= $notif['title'] ?>
                                        </button>
                                    </a>

                                <?php endif; ?>


                            </center>



                        </div>
                    </div>


                </div>
            </div>

            <hr>
            <?php if (empty($notif)) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

        <?php endforeach; ?>

    </div>
</div>