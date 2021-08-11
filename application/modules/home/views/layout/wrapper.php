<?php
require_once('head.php');

$role = $this->session->userdata('role');

if ($role == 'guru') {
  require_once('header_guru.php');
} else if ($role == 'siswa') {
  require_once('header_siswa.php');
} else {
  require_once('header.php');
}
require_once('content.php');
require_once('footer.php');
