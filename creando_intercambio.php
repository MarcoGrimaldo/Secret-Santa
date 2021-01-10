<?php
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=SecretSanta','root','');
    }catch(PDOException $e)
    {
        echo "Error: " , $e->getMessage();
    }

    $statement2 = $conexion->prepare('SELECT * FROM Amigos WHERE Id_usuario = :id_u');

    $statement2->execute(array(
        ':id_u' => $_SESSION['id']
    ));

    $resultado = $statement2->fetchAll();

    if($resultado)
    {
        foreach($resultado as $fila)
        {
            echo '<label class="list-group-item d-flex justify-content-start">
            <input class="form-check-input me-1" type="checkbox" value="">'.
                $fila['Nombre_amigo'] . '</label>';
        }
    }
    else
    {
        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
        No tienes amigos :(</li>';
    }

    if(isset($_POST['submit_inter']))
    {
        $nom_inter = $_POST['nom_inter'];
        $fecha = $_POST['date_inter'];
        $tema = $_POST['tema_inter'];
        $mon_max = $_POST['monto_max'];
        $comen = $_POST['descrip'];

        $statement3 = $conexion->prepare("INSERT INTO Intercambio VALUES(:id_usu, :keyInter, :nom_inter, :mon_max, :fecha, :tema, :comme)");
        $verif = $statement3->execute(array(
            ':id_usu' => intval($_SESSION['id']),
            ':keyInter' => $key0,
            ':nom_inter' => $nom_inter,
            ':mon_max' => $mon_max,
            ':fecha' => $fecha,
            ':tema' => $tema,
            ':comme' => $comen
        ));

        if($verif)
        {
        echo "<script>alert('Intercambio Creado!');</script>";
        }
    }
?> 
