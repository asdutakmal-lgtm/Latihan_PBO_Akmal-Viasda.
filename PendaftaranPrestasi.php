<?php
// file: PendaftaranPrestasi.php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($id = null, $nama = null, $sekolah = null, $nilai = null, $biayaDasar = null, $jenisPrestasi = null, $tingkatPrestasi = null) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    /**
     * OVERRIDING: Jalur prestasi mendapat potongan apresiasi Rp 50.000
     */
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Prestasi | Jenis: " . $this->jenisPrestasi . " (" . $this->tingkatPrestasi . ")";
    }

    public static function getDaftarPrestasi($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jenis_prestasi, tingkat_prestasi 
                  FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarSiswa = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarSiswa[] = new self($row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], $row['jenis_prestasi'], $row['tingkat_prestasi']);
        }
        return $daftarSiswa;
    }
}