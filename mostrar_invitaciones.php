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

        if(isset($_POST['clave_inter']))
        {
          $clave_int = $_POST['claveI'];

          //Obtenemos la fila del intercambio
          $statement0 = $conexion->prepare('SELECT * FROM Intercambio WHERE Clave_intercambio = :id_i');

          $statement0->execute(array(
              ':id_i' => $clave_int
          ));

          $resultado_in = $statement0->fetch();

          /*if($resultado_in)
          {
            echo "<script>alert('Se obtuvo la fila de intercambio');</script>";
          }*/

          //Vamos a agregar al creador del intercambio
          $statement3 = $conexion->prepare("INSERT INTO Amigos VALUES(:id_usu, NULL, :nom_amigo, :correo_amix)");
          $verif = $statement3->execute(array(
              ':id_usu' => intval($resultado_in['Id_usuario']), //creador del intercambio
              ':nom_amigo' => $_SESSION['usuario'],
              ':correo_amix' => $_SESSION['email']
          ));

          /*if($verif)
          {
            echo "<script>alert('Se agrego al creador');</script>";
          }*/

          //Obtenemos la fila del intercambio
          $statement22 = $conexion->prepare('SELECT Clave_amigo FROM Amigos WHERE Id_usuario = :id_i AND Correo = :correo');

          $xd = $statement22->execute(array(
              ':id_i' => $resultado_in['Id_usuario'],
              ':correo' => $_SESSION['email']
          ));

          $resultado_amix = $statement22->fetch();

          /*if($xd)
          {
            echo "<script>alert('Se obtuvo la clave de amigo');</script>";
          }*/

          //agregamos al usuario
          $statement4 = $conexion->prepare("INSERT INTO Participantes_intercambio VALUES(:id_in, :id_am, :nom_am, 0, '.')");
          $verif0 = $statement4->execute(array(
              ':id_in' => $clave_int,
              ':id_am' => intval($resultado_amix['Clave_amigo']),
              ':nom_am' => $_SESSION['usuario']
          ));

          /*if($verif0)
          {
            echo "<script>alert('Se agrego el usuario a los participantes');</script>";
          }*/

          //ingresa a invitacion
          $statement6 = $conexion->prepare("INSERT INTO Invitacion VALUES(NULL,:id_am,:id_inter,:nom_int,0)");
          $result = $statement6->execute(array(
              ':id_am' => intval($_SESSION['id']),
              ':id_inter' => $clave_int,
              ':nom_int' => $resultado_in['Nombre_intercambio']
          ));

          if($result)
          {
            echo "<script>alert('Se agrego la invitacion');</script>";
          }
        }
    ?>