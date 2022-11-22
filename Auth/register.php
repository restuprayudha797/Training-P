<body class="bg-info p-2">


  <div class="bungkus  bg-light" style="width: 100% ;">
    <div class="title">
      <h3 class="p-3 text-center">Register</h3>

      <hr>
    </div>
    <div class="form mt-5">

      <form action="<?= base_url('auth/register') ?>" method="post" class="p-3">

        <div class="row">
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">bug_report</i>
              <input id="icon_prefix" type="number" name="nik" placeholder="NIK" value="<?= set_value('nik') ?>">
              <i class="ml-3 text-danger"><?= form_error('nik') ?></i>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">face</i>
              <input id="icon_prefix" type="text" name="nama" placeholder="Nama" value="<?= set_value('nama') ?>">
              <i class="ml-3 text-danger"><?= form_error('nama') ?></i>

            </div>
          </div>
        </div>
    </div>
    <div class="row">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          <input id="icon_prefix" type="text" name="email" placeholder="Email" value="<?= set_value('email') ?>">
          <i class="ml-3 text-danger"><?= form_error('email') ?></i>

        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input type="number" name="notlp" placeholder="Telephone" value="<?= set_value('notlp') ?>">
          <i class="ml-3 text-danger"><?= form_error('notlp') ?></i>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="container">
        <div class="input-field col s12">
          <i class="material-icons prefix">description</i>

          <textarea id="textarea1" class="materialize-textarea" name="alamat" placeholder="Alamat"><?= set_value('alamat') ?></textarea></textarea>
          <i class="ml-3 text-danger"><?= form_error('alamat') ?></i>

        </div>
      </div>

    </div>
    <div class="row">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_box</i>
          <input id="icon_prefix" type="text" name="username" placeholder="Username" value="<?= set_value('username') ?>">
          <i class="ml-3 text-danger"><?= form_error('username') ?></i>

        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">https</i>
          <input type="password" name="password" placeholder="password">
          <i class="ml-3 text-danger"><?= form_error('password') ?></i>

        </div>
      </div>
      <div class="input-field col s6">
        <i class="material-icons prefix">https</i>
        <input type="password" name="password1" placeholder="Konfirmasi Password">
        <i class="ml-3 text-danger"><?= form_error('password1') ?></i>

      </div>
    </div>


    <div class="tombol p-5">
      <div class="d-grid gap-2">
        <button class="btn btn-primary" name="reg" type="submit">Register</button>
        <a href="<?= base_url('auth') ?>" class="btn btn-primary">already have an account</a>
      </div>
      </form>


    </div>