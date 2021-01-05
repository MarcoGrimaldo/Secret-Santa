 <?php
    $realname = $_POST['realname'];
    $nickname = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

    $reqlen = strlen($realname) * strlen($nickname) * strlen($pass) * strlen($email);
    
    if($reqlen > 0)
    {
        require("connect_db.php");
        //$pass = md5($pass);
        mysql_query("INSERT INTO Usuario VALUES(NULL,'$realname','$nickname','$email','$pass')");
        mysql_close($link);
        echo '<div class="social-media"><p> Se ha registrado exitosamente </p></div>';
        header('Location: sign-in.php');

    }
    else
    {
        echo 'Por favor, rellene todos los campos requeridos';
    }

?>