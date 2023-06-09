<?php
    require_once 'App/init.php';
    session_start();
    if ($_SESSION['username'] == false){
        header('Location:index.php');
    }

    $queryJenis = "SELECT * FROM jenis";
    $result01 = mysqli_query($koneksi, $queryJenis);

    $queryPabrikan = "SELECT * FROM pabrikan";
    $result02 = mysqli_query($koneksi, $queryPabrikan);

    $hasil = 0;
    if(isset($_POST['simpan'])){
        $Kendaraan = new Kendaraan();
        $insert = $Kendaraan->insertKendaran($_POST['jenis_id'],$_POST['merek'],$_POST['pabrikan_id'],$_POST['tahun']);
        if($insert==1){
            $hasil = 1;
        }else {
            $hasil = 0 ; 
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Tambah kendaraan</title>
  </head>
  <body>
    <div class="container" style="margin-top: 100px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <a href="home.php" class="btn btn-md btn-secondary col-md-3 offset-md-9" style="margin-top: 10px">Kembali</a>
            <div class="card-header">
              Tambah Kendaraan
            </div>
            <div class="card-body">
              <form action="form.php" method="POST">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Jenis</label>
                        <select name="jenis_id" class="form-control">
                            <option selected ="0">Pilih Jenis</option>
                            <?php
                                foreach($result01 as $data){
                                    echo "<option value=".$data ['id'].">".$data ['jenis']."</option>";
                                } 
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Merek</label>
                        <input type="text" name="merek" id="merek" placeholder="Merek" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Pabrikan</label>
                        <select name="pabrikan_id" class="form-control">
                            <option selected ="0">Pilih Pabrikan</option>
                            <?php
                                foreach($result02 as $datas){
                                    echo "<option value=".$datas ['id'].">".$datas ['pabrikan']."</option>";
                                } 
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tahun</label>
                        <input type="date" name="tahun" class="form-control">
                    </div>
                </div>                
                <button type="submit" name="simpan" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>
