<style>
.nav-link.active {
    background-color: #D4A276 !important;
    color: white !important;
}
</style>

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
                            <form class="form-inline ml-3" action="<?php echo site_url('anggota'); ?>" method="get">
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
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" style="background-color: #F3D5B5;">
                            <li class="active"><a href="#siswa" class="nav-link" data-toggle="tab" style="color: #000;">Siswa/i</a></li>
                            <li><a href="#guru" class="nav-link" data-toggle="tab" style="color: #000;">Guru</a></li>
                        </ul>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if ($this->session->flashdata('pesan')) {
                                echo '<div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fas fa-check"></i>' . $this->session->flashdata('pesan') . '</div>';
                            }
                            ?>
                            <div class="tab-content">
                                <!-- Tab Siswa -->
                                <div class="tab-pane active" id="siswa">
                                    <section id="new">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Anggota</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Kelas</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($anggota as $us) : ?>
                                                    <?php if ($us['role'] === 'siswa') : ?>
                                                        <tr>
                                                            <td><?= $i; ?>.</td>
                                                            <td><?= $us['nama']; ?></td>
                                                            <td><?= $us['jenis_kelamin']; ?></td>
                                                            <td><?= $us['kelas']; ?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit<?= $us['id_anggota'] ?>">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-detail<?= $us['id_anggota'] ?>">
                                                                    <i class="fa fa-info"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-delete<?= $us['id_anggota'] ?>">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </section>
                                </div>

                                <!-- Tab Guru -->
                                <div class="tab-pane" id="guru">
                                    <section id="new">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Anggota</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Mapel</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($anggota as $us) : ?>
                                                    <?php if ($us['role'] === 'guru') : ?>
                                                        <tr>
                                                            <td><?= $i; ?>.</td>
                                                            <td><?= $us['nama']; ?></td>
                                                            <td><?= $us['jenis_kelamin']; ?></td>
                                                            <td><?= $us['mapel']; ?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit<?= $us['id_anggota'] ?>">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-detail<?= $us['id_anggota'] ?>">
                                                                    <i class="fa fa-info"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-delete<?= $us['id_anggota'] ?>">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </section>
                                </div>
                            </div>

                        </div>
                    <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
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
                <?php echo form_open_multipart('Anggota/tambah') ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                            </div>
                        </div>
                        <!-- Tambah input untuk mengunggah foto -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Pas Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="pas_foto" required>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir bagian untuk input foto -->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control select2" name="jenis_kelamin" style="width: 100%;">
                                    <option selected="selected">-Pilih Jenis Kelamin-</option>
                                    <option value="perempuan">Perempuan</option>
                                    <option value="laki-laki">Laki-laki</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control select2" name="role" id="role-add" onchange="toggleRoleFields('add')" style="width: 100%;">
                                    <option selected="selected">-Pilih Role-</option>
                                    <option value="siswa">Siswa</option>
                                    <option value="guru">Guru</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Fields specific to 'siswa' -->
                    <div id="siswaFields-add" class="row" style="display:none;">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" class="form-control" name="kelas" placeholder="Kelas">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control select2" name="jurusan" style="width: 100%;">
                                    <option selected="selected">-Pilih Jurusan-</option>
                                    <option value="IPA">IPA</option>
                                    <option value="IPS">IPS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                            </div>
                        </div>
                    </div>

                    <!-- Fields specific to 'guru' -->
                    <div id="guruFields-add" class="row" style="display:none;">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <input type="text" class="form-control" name="mapel" placeholder="Mata Pelajaran">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
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

<script>
function toggleRoleFields(type) {
    var role = document.getElementById('role-' + type).value;
    var siswaFields = document.getElementById('siswaFields-' + type);
    var guruFields = document.getElementById('guruFields-' + type);

    if (role == 'siswa') {
        siswaFields.style.display = 'flex';
        guruFields.style.display = 'none';
    } else if (role == 'guru') {
        siswaFields.style.display = 'none';
        guruFields.style.display = 'flex';
    } else {
        siswaFields.style.display = 'none';
        guruFields.style.display = 'none';
    }
}

// Call function on page load to set initial state
document.addEventListener('DOMContentLoaded', function() {
    toggleRoleFields('add');
});
</script>

<!-- modal edit -->
<?php foreach ($anggota as $us) : ?>
<div class="modal fade" id="modal-edit<?= $us['id_anggota'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Anggota/edit/' . $us['id_anggota']) ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" value="<?= $us['nama'] ?>" name="nama" placeholder="Nama" required>
                            </div>
                        </div>
                        <!-- Tambah input untuk mengunggah foto -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Pas Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="pas_foto">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir bagian untuk input foto -->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" value="<?= $us['jenis_kelamin'] ?>" name="jenis_kelamin" placeholder="Jenis Kelamin" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control select2" name="role" id="role-<?= $us['id_anggota'] ?>" onchange="toggleRoleFields(<?= $us['id_anggota'] ?>)" style="width: 100%;">
                                    <option value="">-Pilih Role-</option>
                                    <option value="siswa" <?= $us['role'] == 'siswa' ? 'selected' : '' ?>>Siswa</option>
                                    <option value="guru" <?= $us['role'] == 'guru' ? 'selected' : '' ?>>Guru</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Fields specific to 'siswa' -->
                    <div id="siswaFields-<?= $us['id_anggota'] ?>" class="row" style="display: <?= $us['role'] == 'siswa' ? 'flex' : 'none' ?>;">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" class="form-control" value="<?= $us['kelas'] ?>" name="kelas" placeholder="Kelas">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control select2" name="jurusan" style="width: 100%;">
                                    <option value="">-Pilih Jurusan-</option>
                                    <option value="IPA" <?= $us['jurusan'] == 'IPA' ? 'selected' : '' ?>>IPA</option>
                                    <option value="IPS" <?= $us['jurusan'] == 'IPS' ? 'selected' : '' ?>>IPS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" value="<?= $us['alamat'] ?>" name="alamat" placeholder="Alamat">
                            </div>
                        </div>
                    </div>

                    <!-- Fields specific to 'guru' -->
                    <div id="guruFields-<?= $us['id_anggota'] ?>" class="row" style="display: <?= $us['role'] == 'guru' ? 'flex' : 'none' ?>;">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <input type="text" class="form-control" value="<?= $us['mapel'] ?>" name="mapel" placeholder="Mata Pelajaran">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" value="<?= $us['alamat'] ?>" name="alamat" placeholder="Alamat">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-flat" style="background-color: #7F5539; border: 1px solid #7F5539;">Simpan</button>
            </div>
                </div>
            </div>
            
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>

<script>
function toggleRoleFields(id) {
    var role = document.getElementById('role-' + id).value;
    var siswaFields = document.getElementById('siswaFields-' + id);
    var guruFields = document.getElementById('guruFields-' + id);

    if (role == 'siswa') {
        siswaFields.style.display = 'flex';
        guruFields.style.display = 'none';
    } else if (role == 'guru') {
        siswaFields.style.display = 'none';
        guruFields.style.display = 'flex';
    } else {
        siswaFields.style.display = 'none';
        guruFields.style.display = 'none';
    }
}

// Menangani perubahan input file untuk semua modal
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.custom-file-input').forEach(function(input) {
        input.addEventListener('change', function() {
            const fileName = this.files[0].name;
            this.nextElementSibling.innerText = fileName;
        });
    });
});
</script>

<!-- modal hapus -->
<?php foreach ($anggota as $us) : ?>
<div class="modal fade" id="modal-delete<?= $us['id_anggota'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Anggota/hapus/' . $us['id_anggota']) ?> <!-- Perbaikan URL -->
                <div class="form-group">
                    Yakin Hapus Data <b><?= $us['nama'] ?></b> ?
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