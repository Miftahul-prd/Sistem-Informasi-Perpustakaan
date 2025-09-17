<?php
// Inisialisasi $group_name sebelum loop foreach dimulai
$group_name = null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Print Detail Peminjaman</title>

    <style>
        body {
            background: rgba(0, 0, 0, 0.2);
        }

        page[size="A4"] {
            background: white;
            width: 21cm;
            height: 29.7cm;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5pc;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
            padding-left: 2.54cm;
            padding-right: 2.54cm;
            padding-top: 1.54cm;
            padding-bottom: 1.54cm;
        }

        @media print {
            body, page[size="A4"] {
                margin: 0;
                box-shadow: 0;
            }
        }
    </style>
</head>
<body  onload='window.print()'>
    <div id="printableArea">
        <page size="A4">
            
            <table style="border-bottom: 2px solid #000000;" border="0" width="100%">
                <tbody>
                    <tr>
                        <td width="100"><img src=<?= base_url('img/sekolah.png') ?> alt="logo" width="120" /></td>
                        <td><br />
                            <div style="font-weight: bold; " align="center">PEMERINTAHAN PROVINSI RIAU</div>
                            <div style="font-weight: bold; font-family: Times; font-size: 25px;" align="center">DINAS PENDIDIKAN</div>
                            <div style="font-weight: bold; font-family: Times; font-size: 28px;" align="center">SMA NEGERI 3 TUALANG</div>
                            <div style="font-weight: bold; font-family: Times; font-size: 18px;" align="center">KABUPATEN SIAK</div>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div style="font-size: 11px;" align="center">Alamat : JL. AMD PINANG SEBATANG TIMUR           .Email : sman3tualang@gmail.com</div>
                                        </td>
                                        <td>
                                            <div style="font-size: 11px;" align="center"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="font-size: 11px;" align="center">Telp. 0812 6752 5522            .Kode Pos: 28685</div>
                                        </td>
                                        <td>
                                            <div style="font-size: 11px;" align="center"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <tr>
                <td colspan="4">
                    <div align="center"><strong>LAPORAN DETAIL PEMINJAMAN BUKU</strong></div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div align="center">&nbsp</div>
                </td>
            </tr>

            <?php foreach ($transaksi as $trx) : ?>
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h2>Detail Transaksi</h2>
                            <p>Nama Anggota: <?= $trx['nama_anggota'] ?></p>
                            <p>Tanggal Peminjaman: <?= $trx['tanggal_peminjaman'] ?></p>
                            <h2>Detail Buku Dipinjam</h2>
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
                                                <?php if ($trx_item['nama_anggota'] == $trx['nama_anggota'] && $trx_item['tanggal_peminjaman'] == $trx['tanggal_peminjaman']): ?>
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
                    </div>
                </div>
            </div>
            <?php endforeach; ?>


            <td>&nbsp;</td>

            <table border="0" style="font-family:Arial, Helvetica, sans-serif;font-size:12px" width="700">
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="335">
                        <div align="right">Mengetahui,</div>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        <div align="right">Kepala Perpustakaan </div>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        <div align="right">SMA Negeri 1 Nan Sabaris </div>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        <div align="right">Nurmayanti, S.Pd</div>
                    </td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <script language="javascript1.2">
                    window.print()
                </script>
