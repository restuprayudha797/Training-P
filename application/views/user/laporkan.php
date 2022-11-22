<div class="main p-3 ">
    


<div class="laporkan ">
    <div class="jdl">
        <h3 class="text-center p-5">FORM PELAPORAN</h3>
        <hr>
    </div>

    <?= form_open_multipart('user/laporkan');?>

    <div class="mb-3 mt-3">
  <label for="judulLaporan" class="form-label">Judul Laporan</label>
  <input type="text" class="form-control" name="judulLaporan" id="exampleFormControlInput1" placeholder="Masukkan judul laporan">
  <i class="text-danger"><?= form_error('judulLaporan') ?></i>

</div>

  <div class="form-floating">
  <textarea class="form-control"  placeholder="Leave a comment here" id="floatingTextarea2" name="laporan" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Masukkan Laporan</label>
  <i class="text-danger"><?= form_error('laporan') ?></i>
</div>
<div class="mb-3 mt-3">
  <label for="exampleFormControlInput1" class="form-label">Upload gambar</label>
  <input type="file" class="form-control" name="bukti" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="col-sm-3 mt-3">
  <button class="btn btn-primary" onclick="return confirm('yakin semua sudah benar')">Laporkan</button>
</div>

</form>



</div>




</div>