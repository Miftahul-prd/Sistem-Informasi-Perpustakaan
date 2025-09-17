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
                            <form class="form-inline ml-3" action="<?php echo site_url('buku'); ?>" method="get">
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
                        <li>
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
                                    <th>Judul Buku</th>
                                    <th>Penulis</th>
                                    <th>Kategori</th>
                                    <th>Rak</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Cover</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($buku as $us) : ?>
                                    <tr>
                                        <td><?= $i; ?>.</td>
                                        <td><?= $us['judul_buku']; ?></td>
                                        <td><?= $us['penulis']; ?></td>
                                        <td><?= $us['kategori']; ?></td>
                                        <td><?= $us['rak']; ?></td>
                                        <td><?= $us['stok']; ?></td>
                                        <td><?= $us['status']; ?></td>
                                        <td>
                                            <img src="<?= base_url('uploads/cover/' . $us['cover']); ?>" class="img-fluid rounded" alt="Foto Buku" style="max-width: 80px; max-height: 80px;">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit<?= $us['id_buku'] ?>">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-detail<?= $us['id_buku'] ?>">
                                                <i class="fa fa-info"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-delete<?= $us['id_buku'] ?>">
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
<!-- Pesan Sukses -->
<!--<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('pesan') ?>
    </div>
    <?php endif; ?>
-->
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
                <!-- Form untuk menambahkan buku -->
                <?php echo form_open_multipart('Buku/tambah') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Judul Buku" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Eksemplar</label>
                            <input type="text" class="form-control" id="eksemplar" name="eksemplar" placeholder="Eksemplar" required>
                        </div>
                    </div>
                    <!-- Tambah input untuk mengunggah foto -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Cover</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="cover" required>
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir bagian untuk input foto -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Penulis</label>
                            <input type="text" class="form-control" name="penulis" placeholder="Penulis" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" placeholder="Penerbit" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tempat Terbit</label>
                            <input type="text" class="form-control" name="tempat_terbit" placeholder="Tempat terbit" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Edisi</label>
                            <input type="text" class="form-control" name="edisi" placeholder="Edisi" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="text" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Asal</label>
                            <select class="form-control select2" name="asal" style="width: 100%;" placeholder="Asal">
                              <option selected="selected">Pilih Asal Buku</option>
                              <option value="BOS">BOS</option>
                              <option value="BOSDA">BOSDA</option>
                              <option value="BOSNAS">BOSNAS</option>
                              <option value="Hadiah">Hadiah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" name="harga" placeholder="Harga">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jenis Buku</label>
                            <select class="form-control select2" name="jenis_buku" style="width: 100%;" placeholder="Jenis Buku">
                              <option selected="selected">Pilih Jenis Buku</option>
                              <option value="Fiksi">Fiksi</option>
                              <option value="Non Fiksi">Non Fiksi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-control select2" style="width: 100%;" required>
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Rak</label>
                            <select name="id_rak" id="id_rak" class="form-control select2" style="width: 100%;" required>
                                <option value="">Pilih Rak</option>
                                <?php foreach ($rak as $r) : ?>
                                    <option value="<?= $r['id_rak']; ?>"><?= $r['rak_buku']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Klasifikasi</label>
                            <input type="text" class="form-control" name="klasifikasi" placeholder="Klasifikasi" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>No. Panggil</label>
                            <input type="text" class="form-control" name="no_panggil" placeholder="No. Panggil" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" class="form-control" name="stok" placeholder="Stok" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" name="status" placeholder="Status" required>
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

<!-- JavaScript untuk mengubah label file input -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.querySelector('.custom-file-input');
        const label = document.querySelector('.custom-file-label');

        input.addEventListener('change', function() {
            const fileName = this.files[0].name;
            label.innerText = fileName;
        });
    });
</script>

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

<script>
    function printModal(modalId) {
        var printContents = document.getElementById(modalId).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

<!-- modal hapus -->
<?php foreach ($buku as $us) : ?>
<div class="modal fade" id="modal-delete<?= $us['id_buku'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Buku/hapus/' . $us['id_buku']) ?> <!-- Perbaikan URL -->
                <div class="form-group">
                    Yakin Hapus Data <b><?= $us['judul_buku'] ?></b> ?
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
<?php foreach ($buku as $us) : ?>

<div class="modal fade" id="modal-edit<?= $us['id_buku'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Buku/edit/' . $us['id_buku']) ?> <!-- Perbaikan URL -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text" class="form-control" value="<?= $us['judul_buku'] ?>" name="judul_buku" placeholder="Judul Buku" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Eksemplar</label>
                            <input type="text" class="form-control" value="<?= $us['eksemplar'] ?>" name="eksemplar" placeholder="Eksemplar" required>
                        </div>
                    </div>
                    <!-- Tambah input untuk mengunggah foto -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Cover</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="cover" required>
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir bagian untuk input foto -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Penulis</label>
                            <input type="text" class="form-control" value="<?= $us['penulis'] ?>" name="penulis" placeholder="Penulis" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" value="<?= $us['penerbit'] ?>" name="penerbit" placeholder="Penerbit" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tempat Terbit</label>
                            <input type="text" class="form-control" value="<?= $us['tempat_terbit'] ?>" name="tempat_terbit" placeholder="Tempat Terbit" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Edisi</label>
                            <input type="text" class="form-control" value="<?= $us['edisi'] ?>" name="edisi" placeholder="Edisi" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="text" class="form-control" value="<?= $us['tahun_terbit'] ?>" name="tahun_terbit" placeholder="Tahun Terbit" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Asal</label>
                            <select class="form-control select2" name="asal" style="width: 100%;">
                                <option value="BOS" <?= ($us['asal'] == 'BOS') ? 'selected' : '' ?>>BOS</option>
                                <option value="BOSDA" <?= ($us['asal'] == 'BOSDA') ? 'selected' : '' ?>>BOSDA</option>
                                <option value="BOSNAS" <?= ($us['asal'] == 'BOSNAS') ? 'selected' : '' ?>>BOSNAS</option>
                                <option value="Hadiah" <?= ($us['asal'] == 'Hadiah') ? 'selected' : '' ?>>Hadiah</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" value="<?= $us['harga'] ?>" name="harga" placeholder="Harga">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jenis Buku</label>
                            <select class="form-control select2" name="jenis_buku" style="width: 100%;">
                                <option value="Fiksi" <?= ($us['jenis_buku'] == 'Fiksi') ? 'selected' : '' ?>>Fiksi</option>
                                <option value="Non Fiksi" <?= ($us['jenis_buku'] == 'Non Fiksi') ? 'selected' : '' ?>>Non Fiksi</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-control select2" style="width: 100%;" required>
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id_kategori']; ?>" <?= ($k['id_kategori'] == $us['kategori']) ? 'selected' : ''; ?>><?= $k['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Rak</label>
                            <select name="id_rak" id="id_rak" class="form-control select2" style="width: 100%;" required>
                                <option value="">Pilih Rak</option>
                                <?php foreach ($rak as $r) : ?>
                                    <option value="<?= $r['id_rak']; ?>" <?= ($r['id_rak'] == $us['rak']) ? 'selected' : ''; ?>><?= $r['rak_buku']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Klasifikasi</label>
                            <input type="text" class="form-control" value="<?= $us['klasifikasi'] ?>" name="klasifikasi" placeholder="Klasifikasi" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>No. Panggil</label>
                            <input type="text" class="form-control" value="<?= $us['no_panggil'] ?>" name="no_panggil" placeholder="No. Panggil" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" class="form-control" value="<?= $us['stok'] ?>" name="stok" placeholder="Stok" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" value="<?= $us['status'] ?>" name="status" placeholder="Status" required>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menangani perubahan input file untuk semua modal
        document.querySelectorAll('.custom-file-input').forEach(function(input) {
            input.addEventListener('change', function() {
                const fileName = this.files[0].name;
                this.nextElementSibling.innerText = fileName;
            });
        });
    });
</script>

<?php endforeach; ?>