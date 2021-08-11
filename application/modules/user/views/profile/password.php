<div class="d-grid gap-2">
  <button type="button" class="btn btn-primary md-block mx-3  mt-1 mb-3" data-bs-toggle="modal" data-bs-target="#modelIdPassword">
    <i class="fa fa-lock"></i> Ubah Password
  </button>
</div>





<!-- Modal -->
<div class="modal fade" id="modelIdPassword" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('user/password'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="" class="form-label">Password Lama</label>
            <input type="password" name="password_lama" id="" required placeholder="Password Lama" class="form-control">
          </div>

          <div class="form-group">
            <label for="" class="form-label">Password Baru</label>
            <input type="password" name="password" placeholder="Password Baru" required class="form-control">
          </div>

          <div class="form-group">
            <label for="" class="form-label">Konfirmasi Password</label>
            <input type="password" name="re_password" placeholder="Konfirmasi Password" required class="form-control">
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>