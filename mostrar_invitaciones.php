<?php
        try{
          $conexion = new PDO('mysql:host=localhost;dbname=SecretSanta','root','');
        }catch(PDOException $e)
        {
            echo "Error: " , $e->getMessage();
        }

        $statement2 = $conexion->prepare('SELECT * FROM Invitacion WHERE Id_usuario = :id_u');

        $statement2->execute(array(
            ':id_u' => $_SESSION['id']
        ));

        $resultado = $statement2->fetchAll();
        $ids_inter = array();

        if($resultado)
        {
            foreach($resultado as $fila)
            {
              echo '<li class="list-group-item d-flex justify-content-between align-items-center">'.
                    $fila['Nom_Intercambio'] .
              '<a href="intercambio.php?id_in='. $fila['Clave_intercambio'] .'" type="button" class="btn btn-success btn-sm" >Ver</a>
            </li>';

            array_push($ids_inter,$fila['Clave_intercambio']);
            }
        }
        else
        {
          echo '<li class="list-group-item d-flex justify-content-between align-items-center">
          No tienes invitaciones</li>';
        }
    ?>