<?php
    class Roda_empat extends Kendaraan{ // class roda dua inherited / trunan dari kedaraan
        public $rodaEmpat;

        public function __construct($jenis = "motor", $merek = "inpor", $pabrikan = "inpor", $tahun = "tahun", $rodaEmpat = 0){
            parent::__construct($jenis, $merek , $pabrikan , $tahun);
            $this->rodaEmpat = $rodaEmpat;
        }

        public function getInfoKendaraan() {

            $info = parent::getInfoKendaraan() . "\n mempunyai {$this->rodaEmpat}, roda";

            return $info;
        
        }

    }
?>