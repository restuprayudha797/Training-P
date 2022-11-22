<div class="title p-5">
    <h1>Edit profile</h1>
</div>


<div class="container">

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('user/profile'); ?>

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="nik" value="<?= $user['NIK'] ?>" aria-label="readonly input example" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" name="nama" value="<?= $user['nama'] ?>">
                    <i class="text-danger"><?= form_error('nama') ?></i>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="notlp" class="col-sm-2 col-form-label">No tlp</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputPassword" name="notlp" value="<?= $user['notlp'] ?>">
                    <i class="text-danger"><?= form_error('notlp') ?></i>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" name="email" value="<?= $user['email'] ?>">
                    <i class="text-danger"><?= form_error('email') ?></i>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" name="alamat" value="<?= $user['alamat'] ?>">
                    <i class="text-danger"><?= form_error('alamat') ?></i>

                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-3">
                            <img class="img-thumbnail" src="<?= base_url('asset') ?>/images/profile/<?= $user['gambar'] ?>">
                        </div>
                        <div class="col-sm-7">
                            <input class="form-control" type="file" name="gambar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <button type="submit" onclick="return confirm('yakin ingin edit profile?')" class="btn btn-primary">Edit</button>
    </div>

    </form>


    <div class="container" style="margin-top: 100px ;">


        <h1 class="p-5">Ganti Password</h1>

        <form action="ganti" method="post">


            <div class="mb-3 row">
                <div class="col-sm-9">
                    <label for="passwordlama" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="passwordlama" required type="text" name="nik">
                    </div>
                </div>
                <div class="col-sm-9">
                    <label for="passwordbaru" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="passwordbaru" required type="password" name="nik">
                    </div>
                </div>
                <div class="col-sm-9">
                    <label for="konfirmasi" class="col-sm-2 col-form-label">Konfirmasi</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="konfirmasi" required type="password" name="nik">
                    </div>
                </div>
                <div class="col-sm-9 mt-4">
                    <button class="btn btn-primary">Ganti Password</button>
                </div>
            </div>
        </form>



    </div>
</div>






</div>