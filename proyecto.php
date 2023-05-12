<?php
$servidor="localhost";
$username="root";
$pwBD="";
$nomBD="bd1";
//Conexion
$bd=mysqli_connect($servidor,$username,$pwBD,$nomBD);

if($bd->connect_error){
    die("La conexion fallo: ".$bd->connect_error);
}
/*
$sql="SELECT * FROM login";
$resul=$bd->query($sql);

if(!$resul){
    die("La conexión fallo: ".$bd->connect_error);
}

while($row=$resul->fetch_assoc()){
    echo "
    <td>$row[id]</td>
    <td>$row[login]</td>
    <td>$row[password]</td>
    <td>Base de datos</td>
    ";
*/
?>