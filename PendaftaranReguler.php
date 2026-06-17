<?php
// file: PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($id = null, $nama = null, $sekolah = null, $nilai = null, $biayaDasar = null, $skIkatanDinas = null, $instansiSponsor = null) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    /**
     * OVERRIDING: Jalur kedinasan dikenakan tambahan surcharge kemitraan dinas sebesar 25%
     */
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Kedinasan | Sponsor: " . $this->instansiSponsor . " | No SK: " . $this->skIkatanDinas;
    }

    public static function getDaftarKedinasan($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, sk_ikatan_dinas, instansi_sponsor 
                  FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarSiswa = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarSiswa[] = new self($row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], $row['sk_ikatan_dinas'], $row['instansi_sponsor']);
        }
        return $daftarSiswa;
    }
}