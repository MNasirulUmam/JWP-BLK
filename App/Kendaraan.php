<?php
    class Kendaraan{ // merupakan class dari kendaraan yang menampung methode, variable dan function
        private $jenis, $merek , $pabrikan , $tahun; // modified public degan property jenis, merek, pabrikan dan tahun

        public function __construct( $jenis = "motor", $merek = "inpor", $pabrikan = "inpor", $tahun = "tahun"){  // merupakan constructor yang dimana property sudah default
            $this->jenis = $jenis;
            $this->merek = $merek;
            $this->pabrikan = $pabrikan;
            $this->tahun = $tahun;
        
        }
        public function setJenis($jenis){
            $this->jenis = $jenis;
        }
        
        public function setMerek($merek){
            $this->merek = $merek;
        }
        public function getMerek(){
            return $this->merek;
        }
        public function setPabrikan($pabrikan){
            $this->pabrikan = $pabrikan;
        }
        
        public function setTahun($tahun){
            $this->tahun = $tahun;
        }
        public function getTahun(){
            return $this->tahun;
        }

        public function sorum(){ // merupakan methode 
            return "$this->merek, dari  $this->pabrikan";
        }

        public function getInfoKendaraan(){
        
            $info = "Sorum {$this->jenis} dengan {$this->sorum()} (th. {$this->tahun})";
            return $info;
        }
        public function insertKendaran($jenis_id, $merek, $pabrikan_id, $tahun){
            include ('koneksi.php');
            $query = "INSERT INTO kendaraan (jenis_id, merek, pabrikan_id,tahun) VALUES ('$jenis_id','$merek','$pabrikan_id','$tahun')";
            // echo $query;
            if(mysqli_query($koneksi,$query) === TRUE) {
                header("Location: ./home.php");
                return 1;
            }else{

                return 0;
            }
        }
        function getKendaraan(){

            include ('koneksi.php');

            $query = "SELECT *,kendaraan.id as id_kendaraan FROM kendaraan join jenis on kendaraan.jenis_id = jenis.id join pabrikan on kendaraan.pabrikan_id = pabrikan.id order by kendaraan.id asc";
            $result = mysqli_query($koneksi,$query);
            
            return $result;
        }
        function delateKendaraan($id){
            include ('koneksi.php');
            $query = "DELETE FROM kendaraan WHERE id = $id";
            $result = mysqli_query($koneksi,$query);
            return $result;

        }
        function updateKendaraan($jenis_id, $merek, $pabrikan_id, $tahun, $id){
            include ('koneksi.php');
            $query = "UPDATE kendaraan SET jenis_id='$jenis_id', merek ='$merek', pabrikan_id = '$pabrikan_id',tahun='$tahun'  WHERE id = $id" ;
            $result = mysqli_query($koneksi,$query);
            header("Location: ../home.php");
        }
        function getJenis(){
            include ('koneksi.php');
            $queryJenis = "SELECT * FROM jenis";
            $result01 = mysqli_query($koneksi, $queryJenis);
            return $result01;
        }
        function getPabrikan(){
            include ('koneksi.php');
            $queryPabrikan = "SELECT * FROM pabrikan";
            $result02 = mysqli_query($koneksi, $queryPabrikan);
            return $result02;
        }
        function getEditKendaraan($id_kendaraan){
            include ('koneksi.php');
            $queryKendaraan = "SELECT * FROM kendaraan where id = $id_kendaraan";
            $result = mysqli_query($koneksi, $queryKendaraan);

            return mysqli_fetch_array($result);
        }
    }
?>