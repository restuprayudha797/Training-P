<?php


$d_masuk = 0;

foreach ($masuk as $get) {

    $d_masuk++;
}



$d_proses = 0;

foreach ($proses as $get) {

    $d_proses++;
}


$d_tolak = 0;

foreach ($tolak as $get) {

    $d_tolak++;
}

$d_selesai = 0;

foreach ($selesai as $get) {

    $d_selesai++;
}


$total = $d_masuk + $d_proses + $d_tolak + $d_selesai;

?>


<div class="container my-5">
    <div class="card text-center">
        <div class="card-header">
            DASHBOARD
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-sm-3 ">
                    <a href='<?= base_url() ?>admin/laporan_masuk' class="text-dark ">
                        <div class="card">
                            <div class="card-body">
                                <b>Laporan Masuk</b>
                                <hr>
                                <?= $d_masuk ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href='<?= base_url() ?>admin/laporan_proses' class="text-dark">
                        <div class="card">
                            <div class="card-body">

                                <b>Laporan Diproses</b>
                                <hr>
                                <?= $d_proses ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href='<?= base_url() ?>admin/laporan_ditolak' class="text-dark">
                        <div class="card">
                            <div class="card-body">
                                <b>Laporan Ditolak</b>
                                <hr>
                                <?= $d_tolak ?>
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href='<?= base_url() ?>admin/laporan_selesai' class="text-dark">
                        <div class="card">
                            <div class="card-body">
                                <b>Laporan Selesai</b>
                                <hr>
                                <?= $d_selesai ?>

                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            TOTAL DATA : <?= $total ?>
        </div>
    </div>
</div>