<?php
    class Roda_dua extends Kendaraan{ // class roda dua inherited / trunan dari kedaraan
        public $rodaDua; // modified public degan property roda dua

        public function __construct($jenis = "motor", $merek = "inpor", $pabrikan = "inpor", $tahun = "tahun", $rodaDua = 0){ // merupakan constructor yang dimana property sudah default
            parent::__construct($jenis, $merek , $pabrikan , $tahun); // memanggil constructor di parent kendaraan
            $this->rodaDua = $rodaDua; // sisahnya property di isi manual
        }
        public function getInfoKendaraan() {
            $info =  parent::getInfoKendaraan(). "\n mempunyai {$this->rodaDua}, roda"; // untuk memanggi parent dari function getinfo  
        
            return $info;

        }

    }
?>