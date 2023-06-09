<?php
    require_once 'App/init.php';
    
    session_start();
    if ($_SESSION['username'] == false){
        header('Location:index.php');
    }
    
    $Kendaraan = new Kendaraan();
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);

    $id_kendaraan = $uri_segments[3];

    $result01 = $Kendaraan->getJenis();
    $result02 = $Kendaraan->getPabrikan();
    $isidata = $Kendaraan->getEditKendaraan($id_kendaraan);
   
    if (isset($_POST["simpan"])) {
        $insert = $Kendaraan->updateKendaraan($_POST['jenis_id'], $_POST['merek'], $_POST['pabrikan_id'], $_POST['tahun'], $_POST['id']);
    }
    $hasil = 0;
    
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
    <title>Edit kendaraan</title>
  </head>
  <body>
    <div class="container" style="margin-top: 100px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <a href="http://localhost/jualan/home.php" class="btn btn-md btn-secondary col-md-3 offset-md-9" style="margin-top: 10px">Kembali</a>
            <div class="card-header">
              Edit Kendaraan
            </div>
            <!-- <form acttion = "http://localhost/jualan/update.php/<?php echo $isidata['id']?>" method="post">
                <input type ="hidden" name="id_kendaraan" value="<?php echo $isidata['id']?>"></input>
            </form> -->
            <div class="card-body">
              <form acttion ="http://localhost/jualan/update.php/<?php echo $isidata['id']?>"  method="POST">
              <input type ="hidden" name="id" value="<?php echo $isidata['id']?>"></input>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Jenis</label>
                        <select name="jenis_id" class="form-control">
                            <?php
                                foreach($result01 as $data){
                                    $selected = "";
                                    if($isidata['jenis_id'] == $data['id']) {
                                        $selected = "selected";
                                    }
                                    echo "<option value=".$data ['id']." $selected>".$data ['jenis']."</option>";
                                } 
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Merek</label>
                        <input type="text" name="merek" value="<?php echo $isidata['merek']?>" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Pabrikan</label>
                        <select name="pabrikan_id" class="form-control">
                            <?php
                                foreach($result02 as $data){
                                    $selected = "";
                                    if($isidata['pabrikan_id'] == $data['id']) {
                                        $selected = "selected";
                                    }
                                    echo "<option value=".$data ['id']." $selected>".$data ['pabrikan']."</option>";
                                } 
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tahun</label>
                        <input type="date" name="tahun" id="tahun" value="<?php echo $isidata['tahun']?>" class="form-control">
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
