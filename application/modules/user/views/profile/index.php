<div class="container">
  <div class="row py-3">

    <div class="col-md-3">
      <div class="shadow rounded">
        <center>
          <img src="<?= base_url($profile->foto); ?>" width="120px" height="120px" class="rounded-circle overflow-hidden shadow-sm my-3 p-2" alt="">
          <h5><b>Aswar Kasim</b></h5>
        </center>

        <!-- Button trigger modal -->

        <?php
        include('foto.php');
        include('password.php') ?>

      </div>



    </div>


    <div class="col-md-9 shadow rounded p-3">
      <form action="<?= base_url('user/profile/update'); ?>" method="POST">
        <div class="row">
          <div class="col-md-6">
            <span class="text-muted">Data Pribadi</span>
            <hr class="text-muted">

            <div class="form-group mt-3">
              <label for="" class="form-label">Username</label>
              <input type="text" name="username" disabled id="" value="<?= $profile->username; ?>" class="form-control" placeholder="Username" aria-describedby="helpId">
            </div>

            <div class="form-group mt-3">
              <label for="" class="form-label">Nama Lengkap</label>
              <input type="text" name="namalengkap" value="<?= $profile->namalengkap; ?>" id="" class="form-control" placeholder="Nama Lengkap" aria-describedby="helpId">
            </div>

            <div class="form-group mt-3">
              <label for="" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" id="" class="form-control" value="<?= $profile->tgl_lahir; ?>" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group mt-3">
              <label for="" class="form-label">Gender</label>
              <select name="gender" class="form-control" id="">
                <option value="">--- Gender ---</option>
                <option value="Laki-laki" <?= $profile->gender == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?= $profile->gender == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
              </select>
            </div>


            <div class="form-group mt-3">
              <label for="" class="form-label">Agama</label>
              <input type="text" name="agama" id="" class="form-control" value="<?= $profile->agama; ?>" placeholder="Agama" aria-describedby="helpId">
            </div>

            <div class="form-group mt-3">
              <label for="" class="form-label">Alamat</label>
              <input type="text" name="alamat" id="" class="form-control" value="<?= $profile->alamat; ?>" placeholder="Alamat" aria-describedby="helpId">
            </div>




          </div>
          <div class="col-md-6">
            <span class="text-muted mt-4">Sosial Media</span>
            <hr class="text-muted">

            <div class="form-group mt-3">
              <label for="" class="form-label">Email</label>
              <input type="text" name="email" id="" class="form-control" value="<?= $profile->email; ?>" placeholder="Email" aria-describedby="helpId">
            </div>

            <div class="form-group mt-3">
              <label for="" class="form-label">No. Hp</label>
              <input type="text" name="nohp" id="" class="form-control" value="<?= $profile->nohp; ?>" placeholder="No. Hp" aria-describedby="helpId">
            </div>


            <div class="form-group mt-3">
              <label for="" class="form-label">WhatsApp</label>
              <input type="text" name="wa" id="" class="form-control" value="<?= $profile->wa; ?>" placeholder="WhatsApp" aria-describedby="helpId">
            </div>

            <div class="form-group mt-3">
              <label for="" class="form-label">Instagram</label>
              <input type="text" name="ig" id="" class="form-control" value="<?= $profile->ig; ?>" placeholder="Instagram" aria-describedby="helpId">
            </div>

            <div class="form-group mt-3">
              <label for="" class="form-label">Facebook</label>
              <input type="text" name="fb" id="" class="form-control" value="<?= $profile->fb; ?>" placeholder="Facebook" aria-describedby="helpId">
            </div>

            <div class="form-group mt-3">
              <label for="" class="form-label">Twitter</label>
              <input type="text" name="tw" id="" class="form-control" value="<?= $profile->tw; ?>" placeholder="Twitter" aria-describedby="helpId">
            </div>

          </div>

          <div class="mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>


        </div>
      </form>
    </div>


  </div>
</div>