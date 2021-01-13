<?php
    $id_intercambio = $_GET['id_in'];
    $name_inter = "";
    $fecha_inter = "";
    $mon_max = 0;
    $tema_inter = "";
    $coments = "";

    try{
        $conexion = new PDO('mysql:host=localhost;dbname=SecretSanta','root','');
    }catch(PDOException $e)
    {
        echo "Error: " , $e->getMessage();
    }

    $statement2 = $conexion->prepare('SELECT * FROM Intercambio WHERE Clave_intercambio = :id_i');

    $statement2->execute(array(
        ':id_i' => $id_intercambio
    ));

    $resultado = $statement2->fetch();

    if($resultado)
    {
        $name_inter = $resultado['Nombre_intercambio'];
        $fecha_inter = $resultado['Fecha_limite'];
        $mon_max = $resultado['Monto_maximo'];
        $tema_inter = $resultado['Tema_intercambio'];
        $coments = $resultado['Comentarios'];
    }
?>