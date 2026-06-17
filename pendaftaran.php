<?php
// file: Pendaftaran.php

abstract class Pendaftaran {
    // 3. Properti/Atribut Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar; // Mapping dari kolom 'biaya_pendaftaran_dasar'

    /**
     * Konstruktor untuk memetakan data langsung dari kolom database ke properti objek
     */
    public function __construct($id_pendaftaran = null, $nama_calon = null, $asal_sekolah = null, $nilai_ujian = null, $biaya_pendaftaran_dasar = null) {
        $this->id_pendaftaran = $id_pendaftaran;
        $this->nama_calon = $nama_calon;
        $this->asal_sekolah = $asal_sekolah;
        $this->nilai_ujian = $nilai_ujian;
        $this->biayaPendaftaranDasar = $biaya_pendaftaran_dasar;
    }

    // Getter (Metode akses aman untuk properti yang terenkapsulasi)
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaPendaftaranDasar() { return $this->biayaPendaftaranDasar; }

    // 4. Metode Abstrak (Wajib diimplementasikan tanpa body di sini)
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();
}
?>