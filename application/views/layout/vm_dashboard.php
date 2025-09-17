<style>
        .custom-footer {
            background-color: #D7BA9C !important;
            /*color: rgba(212, 162, 118, 0.5) !important;*/
        }
    </style>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #FFF2E6;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>--><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner" style="background-color: #D4A276;">
                <h3><?php echo $total_anggota; ?></h3>

                <p>Anggota</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-users"></i>
              </div>
              <a href="<?= site_url('Anggota/') ?>" class="small-box-footer custom-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner" style="background-color: #E7BC91;">
                <h3><?php echo $total_buku; ?></h3>

                <p>Buku</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-book"></i>
              </div>
              <a href="<?= site_url('Buku/') ?>" class="small-box-footer custom-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box">
              <div class="inner" style="background-color: #BC8A5F; color:white;">
                <h3><?php echo $total_peminjaman; ?></h3>

                <p>Peminjaman</p>
              </div>
              <div class="icon">
                <i class="fa fa-sign-out"></i>
              </div>
              <a href="<?= site_url('Transaksi/') ?>" class="small-box-footer custom-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner" style="background-color: #e6ccb2;">
                <h3><?php echo $total_pengembalian; ?></h3>

                <p>Pengembalian</p>
              </div>
              <div class="icon">
                <i class="fa fa-sign-in"></i>
              </div>
              <a href="<?= site_url('TransaksiKembali/') ?>" class="small-box-footer custom-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  