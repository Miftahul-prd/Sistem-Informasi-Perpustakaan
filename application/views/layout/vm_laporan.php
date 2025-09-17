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
                        <li class="active"><a href="#tgl-peminjaman" class="nav-link" data-toggle="tab" style="color: #000;">Tanggal Peminjaman</a></li>
                        <li><a href="#tgl-pengembalian" class="nav-link" data-toggle="tab" style="color: #000;">Tanggal Pengembalian</a></li>
                        <li><a href="#nama-anggota" class="nav-link" data-toggle="tab" style="color: #000;">Nama Anggota ( Siswa )</a></li>
                    </ul>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Tanggal Pinjam -->
                            <div class="tab-pane active" id="tgl-peminjaman">
                                <section id="new">
                                    <form action="<?php echo site_url('Laporan/tgl_pinjam'); ?>" method="post" target="_blank">
                                        <div class="form-group">
                                            <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                                            <input type="date" class="form-control" id="datepicker" name="tanggal_peminjaman" placeholder="Tanggal Pinjam" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #7F5539; border: none;">Tampilkan Data</button>
                                        </div>
                                    </form>
                                </section>
                            </div>
                            <!-- /#tgl-pinjam] -->

                            <!-- Tanggal Pengembalian -->
                            <div class="tab-pane" id="tgl-pengembalian">
                                <section id="new">
                                    <form action="<?php echo site_url('Laporan/tgl_kembali'); ?>" method="post" target="_blank">
                                        <div class="form-group">
                                            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                                            <input type="date" class="form-control" id="datepicker" name="tanggal_pengembalian" placeholder="Tanggal Pengembalian" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #7F5539; border: none;">Tampilkan Data</button>
                                        </div>
                                    </form>
                                </section>
                            </div>
                            <!-- /#tgl-pengembalian] -->

                            <!-- Nama Anggota -->
                            <div class="tab-pane" id="nama-anggota">
                                <section id="new">
                                    <form action="<?php echo site_url('Laporan/nama_anggota'); ?>" method="post" target="_blank">
                                        <div class="form-group">
                                            <label for="nama_anggota">Nama Anggota</label>
                                            <input type="text" class="form-control" name="nama_anggota" id="datepicker" placeholder="Silahkan masukan nama anggota" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #7F5539; border: none;">Tampilkan Data</button>
                                        </div>
                                    </form>
                                </section>
                            </div>
                            <!-- /#nama-anggota] -->
                            <!-- /.tab-content -->
                        </div>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>