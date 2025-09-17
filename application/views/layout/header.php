<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIP SMANTIG</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="icon" type="image/png" href="<?= base_url('img/sekolah.png') ?>">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>/../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>/../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <style>
    .dataTables_wrapper .dataTables_paginate .page-item.active .page-link {
        background-color: #7F5539; /* Warna latar belakang yang diinginkan */
        color: #fff; /* Warna teks */
        border: 1px solid #7F5539; /* Opsi: jika ingin menambahkan garis tepi */
    }
    .dataTables_wrapper .dataTables_paginate .page-link {
      position: relative;
      display: block;
      padding: .5rem .75rem;
      margin-left: -1px;
      line-height: 1.25;
      color: #8E8E8E;
      background-color: #fff;
      border: 1px solid #dee2e6;
    }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #E6CCB2;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-slide="true" href="<?= base_url('auth/logout'); ?>" role="button" style="color: #7F5539;"> Sign Out&nbsp;&nbsp;
          <i class="fa fa-sign-out"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #D7BA9C;">
    <!-- Brand Logo -->
    <a href="<?= site_url('Dashboard/') ?>" class="brand-link">
      <b><center><span class="brand-text font-weight-dark">SIP SMANTIG</span></center></b>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <?php if (isset($tb_pengguna) && !is_null($tb_pengguna)): ?>
          <div class="image">
            <img src="<?= base_url('uploads_foto/' . $tb_pengguna['foto']); ?>" class="img-circle elevation-2" alt="User Image" style="width: 35px; height: 35px; object-fit: cover; border-radius: 50%;">
          </div>
          <div class="info">
            <a href="#" class="d-block" style="color: #000;"><?= $tb_pengguna['nama_pengguna']; ?></a>
          </div>
        <?php else: ?>
            <div class="info">
                <a href="#" class="d-block" style="color: #000;">User not logged in</a>
            </div>
        <?php endif; ?>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <?php if ($tb_pengguna['level'] == 'Administrator') { ?>
            <li class="nav-item">
              <a href="<?= site_url('Dashboard/') ?>" class="nav-link" style="color: #000;">
                <i class="nav-icon fas fa-th" ></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="" class="nav-link" style="color: #000;">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Master Data
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= site_url('Pengguna/') ?>" class="nav-link" style="color: #000;">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Data User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('Anggota/') ?>" class="nav-link" style="color: #000;">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Data Anggota</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('Rak/') ?>" class="nav-link" style="color: #000;">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>Data Rak</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('Kategori/') ?>" class="nav-link" style="color: #000;">
                    <i class="nav-icon fas fa-table"></i>
                    <p>Data Kategori Buku</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('Buku/') ?>" class="nav-link" style="color: #000;">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Data Buku</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link" style="color: #000;">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Transaksi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= site_url('Transaksi/') ?>" class="nav-link" style="color: #000;">
                  <i class="nav-icon fas fa-arrow-down"></i>
                    <p>Peminjaman</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('TransaksiKembali') ?>" class="nav-link" style="color: #000;">
                    <i class="nav-icon fas fa-arrow-up"></i>
                    <p>Pengembalian</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="<?= site_url('Laporan') ?>" class="nav-link" style="color: #000;">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Laporan
                </p>
              </a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a href="<?= site_url('Dashboard/') ?>" class="nav-link" style="color: #000;">
                <i class="nav-icon fas fa-th" ></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="" class="nav-link" style="color: #000;">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Master Data
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= site_url('Anggota/') ?>" class="nav-link" style="color: #000;">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Data Anggota</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('Rak/') ?>" class="nav-link" style="color: #000;">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>Data Rak</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('Kategori/') ?>" class="nav-link" style="color: #000;">
                    <i class="nav-icon fas fa-table"></i>
                    <p>Data Kategori Buku</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('Buku/') ?>" class="nav-link" style="color: #000;">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Data Buku</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link" style="color: #000;">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Transaksi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= site_url('Transaksi/') ?>" class="nav-link" style="color: #000;">
                  <i class="nav-icon fas fa-arrow-down"></i>
                    <p>Peminjaman</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('TransaksiKembali') ?>" class="nav-link" style="color: #000;">
                    <i class="nav-icon fas fa-arrow-up"></i>
                    <p>Pengembalian</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="<?= site_url('Laporan') ?>" class="nav-link" style="color: #000;">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Laporan
                </p>
              </a>
            </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>
</body>
</html>
