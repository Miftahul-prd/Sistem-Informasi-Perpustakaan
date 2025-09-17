<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-left: 20px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $judul; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <form class="form-inline ml-3" action="<?php echo site_url('katalogbuku'); ?>" method="get">
                  <div class="input-group input-group-sm">
                      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="keyword">
                      <div class="input-group-append">
                          <button class="btn btn-navbar" type="submit">
                              <i class="fas fa-search"></i>
                          </button>
                      </div>
                  </div>
              </form>
              </li>
              <li >
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-solid" style="margin-left: 10px; margin-right: 10px;" >
        <div class="card-body pb-0">
          <div class="row">
            <?php foreach ($buku as $us) : ?>
                <div class="col-6 col-md-3">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            <b><?= $us['judul_buku']; ?></b>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <p class="text-muted text-sm"><?= $us['status']; ?></p>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="<?= base_url('uploads/cover/' . $us['cover']); ?>" class="img-fluid" alt="Foto Buku">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-detail<?= $us['id_buku'] ?>" style="background-color: #7F5539; border: none;">
                                    <b>Detail</b>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <!-- Modal Detail -->
<?php foreach ($buku as $us) : ?>
<div class="modal fade" id="modal-detail<?= $us['id_buku'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Tampilkan foto buku -->
                        <img src="<?= base_url('uploads/cover/' . $us['cover']); ?>" class="img-fluid rounded" alt="Foto Anggota" style="max-width: 100%; max-height: 1500px;">
                    </div>
                    <div class="col-md-8">
                        <h3><?= $us['judul_buku']; ?></h3>
                        <div class="row">
                            <div class="col-md-4">Eksemplar</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['eksemplar']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Penulis</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['penulis']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Penerbit</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['penerbit']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Tempat Terbit</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['tempat_terbit']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Edisi</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['edisi']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Tahun Terbit</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['tahun_terbit']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Asal</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['asal']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Harga</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['harga']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Jenis Buku</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['jenis_buku']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Kategori</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['kategori']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Rak</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['rak']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Klasisfikasi</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['klasifikasi']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">No. Panggil</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['no_panggil']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Stok</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['stok']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Status</div>
                            <div class="col-md-0">:</div>
                            <div class="col-md-6"><?= $us['status']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>