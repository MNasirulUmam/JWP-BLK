<?php
    require_once 'App/init.php';
    session_start();
    if ($_SESSION['username'] == false){
        header('Location:index.php');
    }
    $kendaraan = new Kendaraan();
    if (isset($_POST['hapus'])){
        $kendaraan->delateKendaraan($_POST['id']);
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Data Sorum</title>
  </head>

  <body>
  
    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-12">
          <div class="card-body">
          <a href="logout.php" class="btn btn-md btn-secondary col-md-2 offset-md-10" style="margin-top: 10px">logout</a>
            <div class="card-header">
              DATA KENDARAAN 
            </div>
            <div class="card-body">
              <a href="form.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Roda</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Pabrikan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        foreach($kendaraan->getKendaraan() as $data){
                            echo "<tr>";
                                echo "<td>{$no}</td>";
                                echo "<td>{$data['jenis']}</td>";
                                echo "<td>{$data['roda']}</td>";
                                echo "<td>{$data['merek']}</td>";
                                echo "<td>{$data['pabrikan']}</td>";
                                echo "<td>{$data['tahun']}</td>";
                                echo "<td>";?>
                                    <a href="update.php/<?php echo $data['id_kendaraan']?>" class="btn btn-info">Edit</a>

                                    <form onsubmit="return confirm('Apakah yaknik mau dihapus?')" method="post" action="home.php">
                                        <input type="hidden" name="id" value="<?php echo $data['id_kendaraan'];?>">
                                        <input type="submit" name="hapus" value= "Hapus" class="btn btn-danger">
                                    </form>
                                    </td>
                            <?php echo "</tr>";
                            $no++;
                        }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
      <script type="text/javascript">
          $(document).ready(function() {
              if (sessionStorage.getItem('success')) {
                  let data = sessionStorage.getItem('success');
                  toastr.success('', data, {
                      timeOut: 1500,
                      preventDuplicates: true,
                      progressBar: true,
                      positionClass: 'toast-top-right',
                      // Redirect 
                  });

                  sessionStorage.clear();
              }

              if (sessionStorage.getItem('error')) {
                  let data = sessionStorage.getItem('error');
                  toastr.error('', data, {
                      timeOut: 1500,
                      preventDuplicates: true,
                      progressBar: true,
                      positionClass: 'toast-top-right',
                      // Redirect 
                  });

                  sessionStorage.clear();
              }
              
              const error = '{{session('error')}}';
              if (error) {
                  toastr.error('', error, {
                      timeOut: 1500,
                      preventDuplicates: true,
                      progressBar: true,
                      positionClass: 'toast-top-right',
                      // Redirect 
                  });

                  sessionStorage.clear();
              }

              const success = '{{session('success')}}';
              if (success) {
                  toastr.success('', success, {
                      timeOut: 1500,
                      preventDuplicates: true,
                      progressBar: true,
                      positionClass: 'toast-top-right',
                      // Redirect 
                  });

                  sessionStorage.clear();
              }
          })
      </script>
    <script></script>
  </body>
</html>