<div class="container my-3">
  <h4><b>Belajar</b></h4>

  <div class="row">
    <?php $this->load->view('nav_user'); ?>


    <div class="col-md-9 pb-5 rounded shadow-sm">
      <?php if ($content_belajar) {
        $this->load->view($content_belajar);
      } ?>
    </div>


  </div>


</div>
</div>