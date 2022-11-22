<div class="container mt-5">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('asset') ?>/images/profile/<?= $user['gambar'] ?>" class="img-fluid rounded-start" alt="<?= $user['nama'] ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="card" style="width: 18rem;">
                        <ul class="p-3">
                            <li>NIK: <b><?= $user['NIK'] ?></b></li>
                            <li>Nama: <?= $user['nama'] ?></li>
                            <li>Nohp: <?= $user['notlp'] ?></li>
                            <li>Email: <?= $user['email'] ?></li>
                            <li>Alamat: <?= $user['alamat'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>