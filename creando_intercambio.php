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
    $ids_amigos = array();
    $noms_amigos = array();
    $correo_amigos = array();

    if($resultado)
    {
        foreach($resultado as $fila)
        {
            echo '<label class="list-group-item d-flex justify-content-start">
            <input class="form-check-input me-1" type="checkbox" name="' . $fila['Clave_amigo'] .'">'.
                $fila['Nombre_amigo'] . '</label>';
            array_push($ids_amigos,$fila['Clave_amigo']);
            array_push($noms_amigos,$fila['Nombre_amigo']);
            array_push($correo_amigos,$fila['Correo']);
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

        $i = 0;
        foreach ($ids_amigos as $id_a)
        {
            if(isset($_POST[$id_a]))
            {
                //echo "<script>alert('" . $noms_amigos[$i] ." seleccionado');</script>";
                //echo "<script>alert('" . $key0 ." seleccionado');</script>";
                $statement4 = $conexion->prepare("INSERT INTO Participantes_intercambio VALUES(:id_in, :id_am, :nom_am, 0, '.')");
                $verif0 = $statement4->execute(array(
                    ':id_in' => $key0,
                    ':id_am' => intval($id_a),
                    ':nom_am' => $noms_amigos[$i]
                ));

                $statement6 = $conexion->prepare("INSERT INTO Invitacion VALUES(NULL,:id_inter,:id_am,:tema,:nom_ami,:fecha,0,'.')");
                $result = $statement6->execute(array(
                    ':id_inter' => $key0,
                    ':id_am' => intval($id_a),
                    ':tema' => $tema,
                    ':nom_ami' => $noms_amigos[$i],
                    ':fecha' => $fecha
                ));
                
                if($result)
                {
                    echo "<script>alert('Invitacion enviada');</script>";
                }



                /*if($verif0)
                {
                    echo "<script>alert('" . $noms_amigos[$i] ." Agregado');</script>";
                }*/
        
            }
            $i++;

            
        }
        
        if($verif)
        {
            echo "<script>alert('Intercambio Creado!');</script>";
        }
    }
?> 
