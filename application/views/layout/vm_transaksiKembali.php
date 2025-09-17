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
              <form class="form-inline ml-3" action="<?php echo site_url('TransaksiKembali'); ?>" method="get">
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
            <?php 
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-check"></i>' . $this->session->flashdata('pesan') . '</div>';
                }
            ?>
            <?php 
                if ($this->session->flashdata('message')) {
                    echo '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-check"></i>' . $this->session->flashdata('message') . '</div>';
                }
            ?>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Anggota</th>
                  <th>Tanggal Peminjaman</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Status Buku</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
            <?php 
                // Inisialisasi array untuk melacak transaksi yang sudah ditampilkan
                $displayedTransactions = array();
            ?>
            <?php $i=1; ?>
            <?php foreach ($transaksi as $us) : ?>
                <?php 
                    // Kunci untuk transaksi yang sedang diproses
                    $transactionKey = $us['nama_anggota'] . '_' . $us['tanggal_peminjaman'];
                    
                    // Periksa apakah transaksi dengan kunci ini sudah ditampilkan sebelumnya
                    if (!isset($displayedTransactions[$transactionKey])) {
                        // Tampilkan transaksi dan tandai bahwa sudah ditampilkan
                        $displayedTransactions[$transactionKey] = true;

                        // Tampilkan hanya jika status buku "Dikembalikan"
                        if ($us['status_buku'] == 'Dikembalikan') :
                ?>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td><?= $us['nama_anggota']; ?></td>
                                <td><?= date('d-m-Y', strtotime($us['tanggal_peminjaman'])); ?></td>
                                <td><?= date('d-m-Y', strtotime($us['tanggal_pengembalian'])); ?></td>
                                <td><?= $us['status_buku']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-delete<?= $us['id_transaksi'] ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-detail<?= $us['id_transaksi'] ?>">
                                        <i class="fa fa-info"></i>
                                    </button>
                                </td>
                                <?php $i++; ?>
                            </tr>
                <?php 
                        endif; // End if status buku "Dikembalikan"
                    }
                ?>
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


   <!-- Modal pinjam -->
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Peminjaman</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Transaksi/pinjam') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Anggota</label>
                            <select name="id_anggota" id="id_anggota" class="form-control select2" style="width: 100%;" required>
                                <option value="">Pilih Nama Anggota</option>
                                <?php foreach ($anggota as $a) : ?>
                                    <option value="<?= $a['id_anggota']; ?>"><?= $a['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" class="form-control float-right" id="reservation" name="tanggal_peminjaman" placeholder="Tanggal Pinjam" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Cari Buku</label>
                            <input type="text" id="searchBooks" class="form-control" placeholder="Cari Buku">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Judul Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="searchResults">
                                <!-- Hasil pencarian buku akan ditampilkan di sini -->
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Judul Buku</th>
                                    <th>Kode Buku</th>
                                </tr>
                            </thead>
                            <tbody id="selectedBooksTable">
                                <!-- Daftar buku yang dipilih akan ditampilkan di sini -->
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status Buku</label>
                            <select class="form-control select2" name="status_buku" style="width: 100%;">
                                <option selected="selected">Pilih Status Buku</option>
                                <option value="Dipinjam">Dipinjam</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#searchBooks').keyup(function(){
            var searchText = $(this).val();
            $.ajax({
                url: "<?php echo base_url('Transaksi/searchBooks'); ?>",
                method: "POST",
                data: {searchText: searchText},
                dataType: "json",
                success: function(data){
                    var html = '';
                    $.each(data, function(index, book){
                        html += '<tr>';
                        html += '<td>' + book.judul_buku + '</td>';
                        html += '<td><button type="button" class="btn btn-primary btn-pilih" data-id-buku="' + book.id_buku + '">Pilih</button></td>';
                        html += '</tr>';
                    });
                    $('#searchResults').html(html);
                }
            });
        });

        // Tambahkan event listener untuk tombol "Pilih"
        $(document).on('click', '.btn-pilih', function(){
            var bookId = $(this).data('id-buku');
            var bookTitle = $(this).closest('tr').find('td:first').text();
            
            // Tambahkan buku yang dipilih ke dalam tabel atau daftar yang sesuai
            $('#selectedBooksTable').append('<tr><td><input type="hidden" name="id_buku[]" value="' + bookId + '">' + bookTitle + '</td><td><input type="text" class="form-control" name="kode_buku[]" placeholder="Kode Buku" required></td></tr>');
        });
    });
</script>


<!-- modal hapus -->
<?php foreach ($transaksi as $us) : ?>
<div class="modal fade" id="modal-delete<?= $us['id_transaksi'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Transaksi/hapus/' . $us['id_transaksi']) ?> <!-- Perbaikan URL -->
                <div class="form-group">
                    Yakin Hapus Data <b><?= $us['no_peminjaman'] ?></b> ?
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
<?php foreach ($transaksi as $us) : ?>
    <?php if (!isset($group_name) || $group_name != $us['nama_anggota'] || $group_date != $us['tanggal_peminjaman']) : ?>
        <div class="modal fade" id="modal-edit<?= $us['id_transaksi'] ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit <?= $judul ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('Transaksi/kembalikan') ?> <!-- Perbaikan URL -->
                        <div class="row">
                            <div class="col-sm-6">   
                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <input type="text" class="form-control" value="<?= $us['nama_anggota']; ?>" name="nama_anggota" readonly>
                                    <?php $group_name = $us['nama_anggota']; ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Peminjaman</label>
                                    <input type="text" class="form-control" value="<?= $us['tanggal_peminjaman']; ?>" name="tanggal_peminjaman" readonly>
                                    <?php $group_date = $us['tanggal_peminjaman']; ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Jatuh Tempo</label>
                                    <input type="date" class="form-control" value="<?= $us['tanggal_jatuhtempo']; ?>" name="tanggal_jatuhtempo" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Pengembalian</label>
                                    <input type="date" class="form-control float-right" id="reservation" name="tanggal_pengembalian" placeholder="Tanggal Pengembalian" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Denda</label>
                                    <input type="text" class="form-control" value="<?= $us['denda']; ?>" name="denda" require>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status Denda</label>
                                    <select class="form-control select2" name="status_denda" style="width: 100%;">
                                        <option value="Lunas">Lunas</option>
                                        <option value="Belum Lunas">Belum Lunas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status Buku</label>
                                    <select class="form-control select2" name="status_buku" style="width: 100%;">
                                        <option value="Dipinjam">Dipinjam</option>
                                        <option value="Dikembalikan">Dikembalikan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label>Detail Buku Dipinjam</label>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Judul Buku</th>
                                            <th>Kode Buku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Loop untuk mengisi baris tabel -->
                                        <?php foreach ($transaksi as $trx_item): ?>
                                            <?php if ($trx_item['nama_anggota'] == $group_name && $trx_item['tanggal_peminjaman'] == $group_date): ?>
                                                <tr>
                                                    <td><?= $trx_item['judul_buku']; ?></td>
                                                    <td><?= $trx_item['kode_buku']; ?></td>
                                                    <input type="hidden" name="buku_ids[]" value="<?= $trx_item['id_transaksi']; ?>">
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-flat">Kembali</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>


<!-- Modal Detail -->
<?php foreach ($transaksi as $trx) : ?>
    <!-- Check if this is a new group of transactions -->
    <?php if (!isset($group_name) || $group_name != $trx['nama_anggota'] || $group_date != $trx['tanggal_peminjaman']) : ?>
        <!-- Set the group name and date -->
        <?php $group_name = $trx['nama_anggota']; ?>
        <?php $group_date = $trx['tanggal_peminjaman']; ?>
        <div class="modal fade" id="modal-detail<?= $trx['id_transaksi'] ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Peminjaman</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h2>Detail Transaksi</h2>
                        <p>Nama Anggota: <?= $trx['nama_anggota'] ?></p>
                        <p>Tanggal Peminjaman: <?= date('d-m-Y', strtotime($trx['tanggal_peminjaman'])); ?></p>
                        <p>Tanggal Jatuh Tempo: <?= date('d-m-Y', strtotime($trx['tanggal_jatuhtempo'])); ?></p>
                        <p>Tanggal Pengembalian: <?= date('d-m-Y', strtotime($trx['tanggal_pengembalian'])); ?></p>
                        <p>Denda: <?= $trx['denda'] ?></p>
                        <h2>Detail Buku Dipinjam</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Tabel hanya dibuat sekali -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Judul Buku</th>
                                            <th>Kode Buku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Loop untuk mengisi baris tabel -->
                                        <?php foreach ($transaksi as $trx_item): ?>
                                            <?php if ($trx_item['nama_anggota'] == $group_name && $trx_item['tanggal_peminjaman'] == $group_date): ?>
                                                <tr>
                                                    <td><?= $trx_item['judul_buku']; ?></td>
                                                    <td><?= $trx_item['kode_buku']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <!--<a class="btn btn-primary" target="_blank" href="<?= base_url('/Transaksi/printDetailTransaksi/') . $us['id_transaksi']; ?>" style="background-color: #7F5539; border: 1px solid #7F5539;">
                            <i class="fa fa-print"></i> Cetak
                        </a>-->
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>


   <!-- Modal pinjam -->
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Peminjaman</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Transaksi/pinjam') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Anggota</label>
                            <select name="id_anggota" id="id_anggota" class="form-control select2" style="width: 100%;" required>
                                <option value="">Pilih Nama Anggota</option>
                                <?php foreach ($anggota as $a) : ?>
                                    <option value="<?= $a['id_anggota']; ?>"><?= $a['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" class="form-control float-right" id="reservation" name="tanggal_peminjaman" placeholder="Tanggal Pinjam" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Cari Buku</label>
                            <input type="text" id="searchBooks" class="form-control" placeholder="Cari Buku">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Judul Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="searchResults">
                                <!-- Hasil pencarian buku akan ditampilkan di sini -->
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Judul Buku</th>
                                    <th>Kode Buku</th>
                                </tr>
                            </thead>
                            <tbody id="selectedBooksTable">
                                <!-- Daftar buku yang dipilih akan ditampilkan di sini -->
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status Buku</label>
                            <select class="form-control select2" name="status_buku" style="width: 100%;">
                                <option selected="selected">Pilih Status Buku</option>
                                <option value="Dipinjam">Dipinjam</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#searchBooks').keyup(function(){
            var searchText = $(this).val();
            $.ajax({
                url: "<?php echo base_url('Transaksi/searchBooks'); ?>",
                method: "POST",
                data: {searchText: searchText},
                dataType: "json",
                success: function(data){
                    var html = '';
                    $.each(data, function(index, book){
                        html += '<tr>';
                        html += '<td>' + book.judul_buku + '</td>';
                        html += '<td><button type="button" class="btn btn-primary btn-pilih" data-id-buku="' + book.id_buku + '">Pilih</button></td>';
                        html += '</tr>';
                    });
                    $('#searchResults').html(html);
                }
            });
        });

        // Tambahkan event listener untuk tombol "Pilih"
        $(document).on('click', '.btn-pilih', function(){
            var bookId = $(this).data('id-buku');
            var bookTitle = $(this).closest('tr').find('td:first').text();
            
            // Tambahkan buku yang dipilih ke dalam tabel atau daftar yang sesuai
            $('#selectedBooksTable').append('<tr><td><input type="hidden" name="id_buku[]" value="' + bookId + '">' + bookTitle + '</td><td><input type="text" class="form-control" name="kode_buku[]" placeholder="Kode Buku" required></td></tr>');
        });
    });
</script>


<!-- modal hapus -->
<?php foreach ($transaksi as $us) : ?>
<div class="modal fade" id="modal-delete<?= $us['id_transaksi'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Transaksi/hapus/' . $us['id_transaksi']) ?> <!-- Perbaikan URL -->
                <div class="form-group">
                    Yakin Hapus Data <b><?= $us['no_peminjaman'] ?></b> ?
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger btn-flat">Hapus</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>

<!-- modal edit -->
<?php foreach ($transaksi as $us) : ?>
    <?php if (!isset($group_name) || $group_name != $us['nama_anggota'] || $group_date != $us['tanggal_peminjaman']) : ?>
        <div class="modal fade" id="modal-edit<?= $us['id_transaksi'] ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit <?= $judul ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('Transaksi/kembalikan') ?> <!-- Perbaikan URL -->
                        <div class="row">
                            <div class="col-sm-6">   
                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <input type="text" class="form-control" value="<?= $us['nama_anggota']; ?>" name="nama_anggota" readonly>
                                    <?php $group_name = $us['nama_anggota']; ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Peminjaman</label>
                                    <input type="text" class="form-control" value="<?= $us['tanggal_peminjaman']; ?>" name="tanggal_peminjaman" readonly>
                                    <?php $group_date = $us['tanggal_peminjaman']; ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Jatuh Tempo</label>
                                    <input type="date" class="form-control" value="<?= $us['tanggal_jatuhtempo']; ?>" name="tanggal_jatuhtempo" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Pengembalian</label>
                                    <input type="date" class="form-control float-right" id="reservation" name="tanggal_pengembalian" placeholder="Tanggal Pengembalian" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Denda</label>
                                    <input type="text" class="form-control" value="<?= $us['denda']; ?>" name="denda" require>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status Denda</label>
                                    <select class="form-control select2" name="status_denda" style="width: 100%;">
                                        <option value="Lunas">Lunas</option>
                                        <option value="Belum Lunas">Belum Lunas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status Buku</label>
                                    <select class="form-control select2" name="status_buku" style="width: 100%;">
                                        <option value="Dipinjam">Dipinjam</option>
                                        <option value="Dikembalikan">Dikembalikan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label>Detail Buku Dipinjam</label>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Judul Buku</th>
                                            <th>Kode Buku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Loop untuk mengisi baris tabel -->
                                        <?php foreach ($transaksi as $trx_item): ?>
                                            <?php if ($trx_item['nama_anggota'] == $group_name && $trx_item['tanggal_peminjaman'] == $group_date): ?>
                                                <tr>
                                                    <td><?= $trx_item['judul_buku']; ?></td>
                                                    <td><?= $trx_item['kode_buku']; ?></td>
                                                    <input type="hidden" name="buku_ids[]" value="<?= $trx_item['id_transaksi']; ?>">
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-flat">Kembali</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>


<!-- Modal Detail -->
<?php foreach ($transaksi as $trx) : ?>
    <!-- Check if this is a new group of transactions -->
    <?php if (!isset($group_name) || $group_name != $trx['nama_anggota'] || $group_date != $trx['tanggal_peminjaman']) : ?>
        <!-- Set the group name and date -->
        <?php $group_name = $trx['nama_anggota']; ?>
        <?php $group_date = $trx['tanggal_peminjaman']; ?>
        <div class="modal fade" id="modal-detail<?= $trx['id_transaksi'] ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Peminjaman</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h2>Detail Transaksi</h2>
                        <p>Nama Anggota: <?= $trx['nama_anggota'] ?></p>
                        <p>Tanggal Peminjaman: <?= $trx['tanggal_peminjaman'] ?></p>
                        <h2>Detail Buku Dipinjam</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Tabel hanya dibuat sekali -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Judul Buku</th>
                                            <th>Kode Buku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Loop untuk mengisi baris tabel -->
                                        <?php foreach ($transaksi as $trx_item): ?>
                                            <?php if ($trx_item['nama_anggota'] == $group_name && $trx_item['tanggal_peminjaman'] == $group_date): ?>
                                                <tr>
                                                    <td><?= $trx_item['judul_buku']; ?></td>
                                                    <td><?= $trx_item['kode_buku']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <a class="btn btn-primary" target="_blank" href="<?= base_url('/Transaksi/printDetailTransaksi/') . $us['id_transaksi']; ?>">
                            <i class="fa fa-print"></i> Cetak
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
