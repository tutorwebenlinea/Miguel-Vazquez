<?php

// Coneccion con la base de datos
include_once "coneccion.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM  usuario");
    $stmt->execute();

    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $idusuario    = $data['idusuario'];
        $tipo_usuario = $data['tipo_usuario'];

        echo '</tr>';

        echo '<td>';
        echo $data['nombre'];
        echo '</td>';

        echo '<td>';
        echo $data['usuario'];
        echo '</td>';

        echo '<td>';
        echo $data['correo'];
        echo '</td>';

        echo '<td>';
        echo $data['pass'];
        echo '</td>';

        echo '<td>';
        echo $data['tipo_usuario'];
        echo '</td>';

        // =============================
        //  Botón para editar recupera el ID del récord de turno.
        //  Recuperamos también el tipo de usuario y así  evitar la
        //  eliminación del administrador en el momento de que se ejecute
        // la consulta relacionada con este formulario

        echo '<td>';
        // Formulario ediitar
        echo '<form  action="editar.php" method="get">';

        echo "<input type='hidden'name='idusuario'value='$idusuario'/>";
        echo "<input type='hidden'name='tipo_usuario'value='$tipo_usuario'/>";
        echo "<input type='submit' class='btn btn-warning'value='Editar'> ";

        echo '</form>';

        echo '</td>';

        echo '<td>';
        //  Formularioo eliminar
        echo '<form  action="eliminar.php" method="get">';
        echo "<input type='hidden'name='idusuario'value='$idusuario'/>";
        echo "<input type='hidden'name='tipo_usuario'value='$tipo_usuario'/>";

        echo '</form>';
        echo '</td>';

        echo '</tr>';
    }

} catch (PDOException $e) {
    echo "Error:" . $e->getMessage();
}
$conn = null;
