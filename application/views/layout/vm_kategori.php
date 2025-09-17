  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #FFF2E6;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $judul; ?></h1>
          </div>
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <form class="form-inline ml-3" action="<?php echo site_url('kategori'); ?>" method="get">
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
                <!-- Right navbar links -->
                <li class="nav-item">
                <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-sm" style="background-color: #7F5539; border: 1px solid #7F5539;">
                  Tambah
                </button>
                </li>
              </li>
            </ol>
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
            <?php if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-check"></i>' . $this->session->flashdata('pesan') . '</div>';
                    }
            ?>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori Buku</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach ($kategori as $us) : ?>
                    <tr>
                      <td><?= $i; ?>.</td>
                      <td><?= $us['nama_kategori']; ?></td>
                      <td>
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit<?= $us['id_kategori'] ?>">
                          <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-delete<?= $us['id_kategori'] ?>">
                          <i class="fas fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal Tambah -->
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menambahkan anggota -->
                <?php echo form_open_multipart('Kategori/tambah') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kategori Buku</label>
                            <input type="text" class="form-control" name="nama_kategori" placeholder="Kategori Buku" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-flat" style="background-color: #7F5539; border: 1px solid #7F5539;">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- modal hapus -->
<?php foreach ($kategori as $us) : ?>
<div class="modal fade" id="modal-delete<?= $us['id_kategori'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Kategori/hapus/' . $us['id_kategori']) ?> <!-- Perbaikan URL -->
                <div class="form-group">
                    Yakin Hapus Data <b><?= $us['nama_kategori'] ?></b> ?
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger btn-flat" style="background-color: #7F5539; border: 1px solid #7F5539;">Hapus</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>

<!-- modal edit -->
<?php foreach ($kategori as $us) : ?>

<div class="modal fade" id="modal-edit<?= $us['id_kategori'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Kategori/edit/' . $us['id_kategori']) ?> <!-- Perbaikan URL -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kategori Buku</label>
                            <input type="text" class="form-control" value="<?= $us['nama_kategori'] ?>" name="nama_kategori" placeholder="Kategori Buku" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-flat" style="background-color: #7F5539; border: 1px solid #7F5539;">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php endforeach; ?>