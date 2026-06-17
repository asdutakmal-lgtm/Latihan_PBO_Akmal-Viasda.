<?php
// 1. Import semua file koneksi dan class yang diperlukan
require_once 'koneksi.php';
require_once 'Pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// Initialize koneksi database
$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die("Gagal terhubung ke database.");
}

// 2. Memanfaatkan metode query spesifik dari tiap kelas anak untuk mengambil data
$daftarReguler   = PendaftaranReguler::getDaftarReguler($db);
$daftarPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($db);
$daftarKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendaftaran Mahasiswa Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        h2 {
            color: #2c3e50;
            border-left: 5px solid #3498db;
            padding-left: 10px;
            margin-top: 40px;
            margin-bottom: 15px;
        }
        .table-responsive {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #34495e;
            color: #fff;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .badge {
            display: inline-block;
            padding: 5px 10px;
            background-color: #ecf0f1;
            color: #2c3e50;
            border-radius: 4px;
            font-size: 0.85em;
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .empty-row {
            text-align: center;
            color: #7f8c8d;
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Panel Manajemen Pendaftaran Mahasiswa Baru</h1>

    <h2><span style="color: #3498db;">■</span> Kategori Jalur Reguler</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Calon</th>
                    <th>Asal Sekolah</th>
                    <th class="text-center">Nilai Ujian</th>
                    <th>Informasi Spesifik Jalur (Polimorfisme)</th>
                    <th class="text-right">Biaya Dasar</th>
                    <th class="text-right">Total Biaya Akhir (Polimorfisme)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($daftarReguler)): ?>
                    <tr><td colspan="7" class="empty-row">Tidak ada data pendaftaran jalur reguler.</td></tr>
                <?php else: ?>
                    <?php foreach ($daftarReguler as $siswa): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($siswa->getIdPendaftaran()) ?></strong></td>
                            <td><?= htmlspecialchars($siswa->getNamaCalon()) ?></td>
                            <td><?= htmlspecialchars($siswa->getAsalSekolah()) ?></td>
                            <td class="text-center"><?= htmlspecialchars($siswa->getNilaiUjian()) ?></td>
                            <td><span class="badge"><?= htmlspecialchars($siswa->tampilkanInfoJalur()) ?></span></td>
                            <td class="text-right">Rp <?= number_format($siswa->getBiayaPendaftaranDasar(), 2, ',', '.') ?></td>
                            <td class="text-right" style="font-weight: bold; color: #27ae60;">
                                Rp <?= number_format($siswa->hitungTotalBiaya(), 2, ',', '.') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <h2><span style="color: #2ecc71;">■</span> Kategori Jalur Prestasi</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Calon</th>
                    <th>Asal Sekolah</th>
                    <th class="text-center">Nilai Ujian</th>
                    <th>Informasi Spesifik Jalur (Polimorfisme)</th>
                    <th class="text-right">Biaya Dasar</th>
                    <th class="text-right">Total Biaya Akhir (Polimorfisme)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($daftarPrestasi)): ?>
                    <tr><td colspan="7" class="empty-row">Tidak ada data pendaftaran jalur prestasi.</td></tr>
                <?php else: ?>
                    <?php foreach ($daftarPrestasi as $siswa): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($siswa->getIdPendaftaran()) ?></strong></td>
                            <td><?= htmlspecialchars($siswa->getNamaCalon()) ?></td>
                            <td><?= htmlspecialchars($siswa->getAsalSekolah()) ?></td>
                            <td class="text-center"><?= htmlspecialchars($siswa->getNilaiUjian()) ?></td>
                            <td><span class="badge" style="background-color: #e8f8f5; color: #117a65;"><?= htmlspecialchars($siswa->tampilkanInfoJalur()) ?></span></td>
                            <td class="text-right">Rp <?= number_format($siswa->getBiayaPendaftaranDasar(), 2, ',', '.') ?></td>
                            <td class="text-right" style="font-weight: bold; color: #27ae60;">
                                Rp <?= number_format($siswa->hitungTotalBiaya(), 2, ',', '.') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <h2><span style="color: #e67e22;">■</span> Kategori Jalur Kedinasan</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Calon</th>
                    <th>Asal Sekolah</th>
                    <th class="text-center">Nilai Ujian</th>
                    <th>Informasi Spesifik Jalur (Polimorfisme)</th>
                    <th class="text-right">Biaya Dasar</th>
                    <th class="text-right">Total Biaya Akhir (Polimorfisme)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($daftarKedinasan)): ?>
                    <tr><td colspan="7" class="empty-row">Tidak ada data pendaftaran jalur kedinasan.</td></tr>
                <?php else: ?>
                    <?php foreach ($daftarKedinasan as $siswa): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($siswa->getIdPendaftaran()) ?></strong></td>
                            <td><?= htmlspecialchars($siswa->getNamaCalon()) ?></td>
                            <td><?= htmlspecialchars($siswa->getAsalSekolah()) ?></td>
                            <td class="text-center"><?= htmlspecialchars($siswa->getNilaiUjian()) ?></td>
                            <td><span class="badge" style="background-color: #fdf2e9; color: #a04000;"><?= htmlspecialchars($siswa->tampilkanInfoJalur()) ?></span></td>
                            <td class="text-right">Rp <?= number_format($siswa->getBiayaPendaftaranDasar(), 2, ',', '.') ?></td>
                            <td class="text-right" style="font-weight: bold; color: #27ae60;">
                                Rp <?= number_format($siswa->hitungTotalBiaya(), 2, ',', '.') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>