<div class="d-grid gap-2">
  <button type="button" class="btn btn-primary md-block mx-3" data-bs-toggle="modal" data-bs-target="#modelId">
    <i class="fa fa-edit"></i> Ubah Foto
  </button>
</div>





<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Foto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open_multipart('user/profile/uploadFoto') ?>
      <form action="" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="" class="form-label">Pilih Foto</label>
            <input type="file" name="foto" id="" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
      </form>
      <?= form_close() ?>
    </div>
  </div>
</div>