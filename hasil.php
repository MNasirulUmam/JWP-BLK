
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <?php
        require_once 'App/init.php';

        if(isset($_POST['simpan'])){
            
            // // proses menambahkan data arry
            if(empty($_POST['jenis']) && empty($_POST['merek']) && empty($_POST['pabrikan']) && empty($_POST['tahun'])){
                header('location: hasil.php');
            }
            // var_dump($_POST['jenis'] == "Motor");
            // if($_POST['jenis'] == "Motor"){
            //     $rodaDua = new Roda_dua($_POST['jenis'],$_POST['merek'],$_POST['pabrikan'],$_POST['tahun'], 2); // merupakan obejct instance dari class kendaraan
            //     echo $rodaDua->getInfoKendaraan(); 
            // }else if($_POST['jenis'] == "Mobil"){
            //     $rodaEmpat = new Roda_empat($_POST['jenis'],$_POST['merek'],$_POST['pabrikan'],$_POST['tahun'], 4); // merupakan obejct instance dari class kendaraan
            //     echo $rodaEmpat->getInfoKendaraan();
            // }
            $rodaDua = new Roda_dua();
            $rodaDua->setJenis($_POST['jenis']);
            $rodaDua->setMerek($_POST['merek']);
            $rodaDua->setPabrikan($_POST['pabrikan']);
            $rodaDua->setTahun($_POST['tahun']);
            
    ?>
    <table class="table caption-top">
    <!-- <caption>List kendaraan</caption> -->
    <thead>
        <tr>
        <th scope="col">Jenis</th>
        <th scope="col">Merek</th>
        <th scope="col">Pabrikan</th>
        <th scope="col">Tahun</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td><?= $rodaDua->getJenis()?></td>
        <td><?= $rodaDua->getMerek()?></td>
        <td><?= $rodaDua->getPabrikan()?></td>
        <td><?= $rodaDua->getTahun()?></td>
        </tr>
    </tbody>
    </table>
    <?php }?>
</body>
</html>