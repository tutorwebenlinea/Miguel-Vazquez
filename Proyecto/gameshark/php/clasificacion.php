<?php

//  Necesario
//obtiene las opciones de las clasificaciones disponibles para utilizarlas en las tablas de inventario.
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM clasificacion");

    $stmt->execute();

    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $id = $data['idclasificacion'];

        echo "<option value=" . '"' . $id . '"' . ">";
        echo $data['nombre'];
        echo '</option>';
    }
    $stmt->closeCursor();
} catch (PDOException $e) {

}
$conn = null;
