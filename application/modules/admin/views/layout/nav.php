<?php

$this->load->model('admin/Admin_model', 'AM');

$id_user = $this->session->userdata('id_user');
$role = $this->session->userdata('role');

$order = $this->AM->countOrder();

?>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>

            <li class="<?php if ($this->uri->segment(2) == "dashboard") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/dashboard')
                                        ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>


            <li class="<?php if ($this->uri->segment(2) == "produk") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/produk')
                                        ?>"><i class="fa fa-table"></i> <span>Produk</span></a></li>


            <li class="<?php if ($this->uri->segment(2) == "kategori") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/kategori')
                                        ?>"><i class="fa fa-list"></i> <span>Kategori</span></a></li>

            <li class="<?php if ($this->uri->segment(2) == "order") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/order')
                                        ?>"><i class="fa fa-inbox"></i> <span>Order</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right"><?= count($order) ?></span>
                    </span>
                </a></li>

            <li class="<?php if ($this->uri->segment(2) == "pencatatan") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/pencatatan')
                                        ?>"><i class="fa fa-exchange"></i> <span>Pencatatan</span>
                </a></li>

            <li class="treeview <?php if ($this->uri->segment(2) == "user") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-users"></i> <span>User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(4) == "pemasok") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/user/index/pemasok') ?>">Pemasok</a></li>

                    <li class="<?php if ($this->uri->segment(4) == "pembeli") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/user/index/pembeli') ?>">Pembeli</a></li>

                    <li class="<?php if ($this->uri->segment(4) == "user") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/user/index/user') ?>">Pengguna</a></li>

                </ul>
            </li>




            <li class="<?php if ($this->uri->segment(2) == "admin") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/admin')
                                        ?>"><i class="fa fa-user-secret"></i> <span>Admin</span></a></li>


            <li class="<?php if ($this->uri->segment(2) == "konfigurasi") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/konfigurasi')
                                        ?>"><i class="fa fa-cogs"></i> <span>Konfigurasi</span></a></li>


        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">