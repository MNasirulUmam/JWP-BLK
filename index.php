<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="Css/styles.css">
</head>
<?php
session_start();
 $username = "admin"; // variable menampung data username dummu
 $password = "123456"; // variable menampung data password dummu
 if(isset($_POST['login'])){
    if(empty($_POST['username']) && empty($_POST['password'])){
        $error_userpass = "Username dan password harus di isi !!!";
    }else if(!empty($_POST['username']) && empty($_POST['password'])) {
        $error_password = " Password harus di isi !!!";
    }else if(empty($_POST['username']) && !empty($_POST['password'])) {
        $error_username = "Username harus di isi !!!";
    }else if(!empty($_POST['username']) && !empty($_POST['password'])) {
        if($username != $_POST['username'] && $password != $_POST['password']){
           $error = "Username dan Password Harus Tepat !!!";
        }else if($username == $_POST['username'] && $password != $_POST['password']){
            $salah_pass = "Password salah !";
        }else if($username != $_POST['username'] && $password == $_POST['password']){
           $salah_username = "Username salah !";
        }else if($username == $_POST['username'] && $password == $_POST['password']){
           $_SESSION["name"] = $_POST['username'];
           $_SESSION["username"] = true;
           header("Location:home.php");
           
        }
    }
}   
?>
<body>
    <div id ="form-container">
        <form method="post" action ="proses.php">
                <div class="container">
                    <h1>Login</h1>
                </div>
                <?php if(isset($salah_username)){
                            echo '<span  class="notif ml-3"style="color:red">'.$salah_username.'</span>';
                        } ?>
                        <?php if(isset($salah_pass)){
                            echo '<span  class="notif ml-3"style="color:red">'.$salah_pass.'</span>';
                        } ?>
                        <?php if(isset($error_username)){
                            echo '<span  class="notif ml-3"style="color:red">'.$error_username.'</span>';
                        } ?>
                        <?php if(isset($error_userpass)){
                            echo '<span  class="notif ml-3"style="color:red">'.$error_userpass.'</span>';
                        } ?>
                         <?php if(isset($error)){
                            echo '<span  class="notif ml-3"style="color:red">'.$error.'</span>';
                        } ?>
                <input type="text" name="username" placeholder="Username"  autofocus><br><br>
                <?php if(isset($error_password)){
                            echo '<span  class="notif ml-3"style="color:red">'.$error_password.'</span>';
                        } ?>
                <input type="password" name="password" placeholder="Password"  autofocus><br><br>
            <!-- <div class="row button"> -->
                <input type="submit" value="Login" name="login"  autofocus><br>
            <!-- </div> -->
            <p>Don't have an account? <a href="">Registasion Now</a></p>
        </form>
    </div>
</body>
</html>
