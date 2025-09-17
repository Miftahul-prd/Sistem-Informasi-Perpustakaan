<?php
// Inisialisasi $group_name sebelum loop foreach dimulai
$group_name = null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Perpustakaan</title>
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
            page-break-after: always;
            page-break-inside: avoid;
        }

        @media print {
            body, page[size="A4"] {
                margin: 0;
                box-shadow: 0;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: auto;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }

    </style>
</head>
<body>
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
                                            <div style="font-size: 11px;" align="center">Alamat : JL. AMD PINANG SEBATANG TIMUR .Email : sman3tualang@gmail.com</div>
                                        </td>
                                        <td>
                                            <div style="font-size: 11px;" align="center"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="font-size: 11px;" align="center">Telp. 0812 6752 5522 .Kode Pos: 28685</div>
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
                    <div align="center"><strong><?php echo $judul; ?></strong></div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div align="center">&nbsp</div>
                </td>
            </tr>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama Anggota</th>
                                    <th>Judul Buku Dipinjam</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Denda</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($transaksi)): ?>
                                    <?php foreach($transaksi as $row): ?>
                                    <tr>
                                        <td><?= $row['nama_anggota']; ?></td>
                                        <td><?= $row['buku']; ?></td>
                                        <td><?= $row['tanggal_peminjaman']; ?></td>
                                        <td><?= $row['tanggal_pengembalian']; ?></td>
                                        <td>Rp. <?= number_format($row['denda'], 0, ',', '.'); ?>,-</td>
                                        <td><?= $row['status_buku']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6">Tidak ada data <?php echo $judul; ?> tersebut.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </page>

        <page size="A4">
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
            </table>
        </page>
    </div>

    <script language="javascript1.2">
        window.print()
    </script>
</body>
</html>
