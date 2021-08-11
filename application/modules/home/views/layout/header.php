<?php

$id_user = $this->session->userdata('id_user');
$user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
$uri =  $this->uri->segment(2); ?>

<header>
  <div class="px-3 py-2 bg-primary text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="<?= base_url(); ?>" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
          <img src="<?= base_url('assets/img/logo.png'); ?>" width="150px" alt="">
        </a>

        <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
          <!-- <li>
            <a href="<?= base_url('home'); ?>" class="nav-link text-secondary text-center">
              <i class="fa fa-home fa-2x"></i><br>
              Home
            </a>
          </li> -->

          <li>
            <a href="<?= base_url('home/produk'); ?>" class="nav-link <?= $uri == 'produk' ? 'text-secondary' : 'text-white'; ?> text-center">
              <i class="fa fa-home fa-2x"></i><br>
              Home
            </a>
          </li>

          <li>
            <a href="<?= base_url('home/cart'); ?>" class="nav-link <?= $uri == 'cart' ? 'text-secondary' : 'text-white'; ?> text-center">
              <i class="fa fa-shopping-cart fa-2x"></i><br>
              Keranjang
            </a>
          </li>

          <li>
            <a href="<?= base_url('home/order'); ?>" class="nav-link <?= $uri == 'order' ? 'text-secondary' : 'text-white'; ?> text-center">
              <i class="fa fa-inbox fa-2x"></i><br>
              Order
            </a>
          </li>

          <li>
            <a href="<?= base_url('user/profile'); ?>" class="nav-link <?= $uri == 'profile' ? 'text-secondary' : 'text-white'; ?> text-center">
              <i class="fa fa-user fa-2x"></i><br>
              Profil
            </a>
          </li>

          <?php if (!$this->session->userdata('id_user') && !$this->session->userdata('role')) { ?>
            <li>
              <a href="<?= base_url('home/auth/register'); ?>" class="nav-link <?= $uri == 'auth' ? 'text-secondary' : 'text-white'; ?> text-center">
                <i class="fa fa-user-plus fa-2x"></i><br>
                Register
              </a>
            </li>

            <li>
              <a href="<?= base_url('home/auth'); ?>" class="nav-link <?= $uri == 'auth' ? 'text-secondary' : 'text-white'; ?> text-center">
                <i class="fa fa-sign-in fa-2x"></i><br>
                Login
              </a>
            </li>
          <?php } else { ?>
            <li>
              <a href="<?= base_url('home/auth/logout'); ?>" class="nav-link text-white text-center">
                <i class="fa fa-sign-out fa-2x"></i><br>
                Logout
              </a>
            </li>
          <?php } ?>

        </ul>
      </div>
    </div>
  </div>
</header>