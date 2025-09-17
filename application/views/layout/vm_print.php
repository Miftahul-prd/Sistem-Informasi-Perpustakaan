<!DOCTYPE html>
<html>
<head>
	<title>Print Data Anggota</title>

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

        .library-card {
            width: 338px;  /* 85.6 mm converted to pixels */
            height: 212px; /* 53.98 mm converted to pixels */
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 10px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        hr {
            width: 100%; /* Membuat garis horizontal sejajar dengan card */
            margin-top: 20px; /* Atur jarak antara garis dan konten sebelumnya */
            margin-bottom: -10px; /* Atur jarak antara garis dan konten setelahnya */
            border: 1px solid #000; /* Ganti warna dan ketebalan sesuai kebutuhan */
        }

        .school-logo {
            margin-bottom: -20px;
        }

        .school-logo img {
            width: 25px;
            height: 25px;
        }

        .h4 {
            text-align: center;
            margin: 0;
            font-size: 1.2em;
        }

		.student-photo {
			margin-left: -30px;
        }

        .student-photo img {
            width: 80px;
            height: 80px;
        }

        .student-info {
            flex-grow: 1;
            text-align: left;
            display: flex;
            align-items: center;
        }

        .student-info h2 {
            margin: 0;
            font-size: 1.2em;
        }

        .student-info .details {
            margin-left: 10px;
        }

        .student-info .details p {
            margin: 5px 0;
            font-size: 0.9em;
        }

        .barcode img {
            width: 100px;
        }

        .rules {
            font-size: 0.7em;
        }

        .logo-and-title {
            display: flex;
            align-items: center;
			margin-top: -20px;
            margin-bottom: -20px;
        }

        .logo-and-title .school-logo {
            margin-right: 10px;
        }

        .school-name {
            text-align: center;
            font-size: 1em;
        }
    </style>
</head>
<body  onload='window.print()'>
    <div id="printableArea">
        <page size="A4">
            <div class="library-card">
                <div class="logo-and-title">
                    <div class="school-logo">
                        <img src="<?= base_url('img/sekolah.png') ?>" alt="Logo Sekolah">
                    </div>
                    <h4>KARTU ANGGOTA PERPUSTAKAAN</h4>
                </div>
                <div class="school-name">SMAN 3 TUALANG</div>
                <hr/> <!-- Garis Horizontal -->
                <div class="student-info">
                    <div class="student-photo">
					<img src="<?= base_url('uploads/' . $anggota['pas_foto']); ?>" class="img-responsive" alt="Foto Anggota">
                    </div>
                    <div class="details">
                        <p><strong>Nama:</strong> <?= $anggota['nama']; ?></p>
                        <p><strong>Jenis Kelamin:</strong> <?= $anggota['jenis_kelamin']; ?></p>
                        <p><strong>Jurusan:</strong> <?= $anggota['jurusan']; ?></p>
						<p><strong>Alamat:</strong> <?= $anggota['alamat']; ?></p>
						<p><strong>Berlaku:</strong> Selama Menjadi Siswa/i</p>
                    </div>
                </div>
            </div>
        </page>
    </div>
</body>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
</html>
