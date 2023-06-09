<?php
## Author : M. Nasirul Umam
## Tanggal : 25 Mei 2023
    include 'koneksi.php';
    session_start();
    

    $username = $_POST['username']; 
    $password = $_POST['password'];

    $query = "SELECT username, password from users WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) >0){
        $_SESSION["name"] = $_POST['username'];
        $_SESSION["username"] = true;
        header("Location: home.php");

    }else{
        header("Location: index.php");
    }

    // if (isset($_POST['login'])){ // pengecekan post dari user pada saat klik tombol button
    //     if(!empty($_POST["username"]) && !empty($_POST["password"])){ // pengecekan jika data tidak kosong pada inputan user dan password
    //         if($_POST["username"] ==$username && $_POST["password"] ==$password){ // pengecekan jika input usernama dan password sama dengan data variable (dummy)
                
    //              $_SESSION["name"] = $_POST['username'];
    //              $_SESSION["username"] = true;
                
    //             header("Location: form.php");
    //             //echo "Behasil Login"; // proses berhasil login
    //         }else{
    //             header("Location: index.php");
    //             // echo "Gagal Login"; // proses gagal login
    //         }
    //     }
    // }
?>