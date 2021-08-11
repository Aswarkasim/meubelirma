<?php
$is_user = $this->uri->segment(1);
$uri = $this->uri->segment(2);

if ($uri == 'paket') {
?>
  <div class="col-md-3">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active"><i class="fa fa-houzz"></i> Paket</a>
      <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-check-circle-o"></i> Hasil</a>
    </div>
  </div>
<?php } else { ?>

  <div class="col-md-3">
    <div class="list-group">
      <a href="<?= base_url($is_user . '/modul'); ?>" class="list-group-item list-group-item-action <?= $uri == 'modul' ? 'active' : '' ?>"><i class="fa fa-book"></i> Modul</a>
      <a href="<?= base_url($is_user . '/diskusi'); ?>" class="list-group-item list-group-item-action <?= $uri == 'diskusi' ? 'active' : '' ?>"><i class="fa fa-group"></i> Diskusi</a>
      <a href="<?= base_url($is_user . '/tugas'); ?>" class="list-group-item list-group-item-action <?= $uri == 'tugas' ? 'active' : '' ?>"><i class="fa fa-hourglass"></i> Tugas</a>
      <a href="<?= base_url($is_user . '/quiz'); ?>" class="list-group-item list-group-item-action <?= $uri == 'quiz' ? 'active' : '' ?>"><i class="fa fa-rocket"></i> Quiz</a>
    </div>
  </div>

<?php } ?>