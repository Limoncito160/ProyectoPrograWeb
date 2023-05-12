<?php
$servidor="localhost";
$username="root";
$pwBD="";
$nomBD="estuches_pinceles";
//Conexion
$bd=mysqli_connect($servidor,$username,$pwBD,$nomBD);

if($bd->connect_error){
    die("La conexion fallo: ".$bd->connect_error);
}

$sql="SELECT * FROM prueba";
$resul=$bd->query($sql);

if(!$resul){
    die("La conexión fallo: ".$bd->connect_error);
}

while($row=$resul->fetch_assoc()){
    echo "
    <td>$row[ID]</td>
    <td>$row[Nombre]</td>
    <td>$row[Precio]</td>
    <td>$row[Existencia]</td>
    <td>Base de datos</td>
    ";
}
?>