<?php
$usuario=$_POST['uname'];
$password=$_POST['psw'];

$_SESSION['usuario']=$usuario;

include('proyecto.php');

$consulta="SELECT * FROM login1 where login='$usuario' and password='$password'";
$resul=mysqli_query($bd,$consulta);

$mostrar = mysqli_fetch_array($resul);
$filas=mysqli_num_rows($resul);

if($filas){
    include("home.php");
}else{
    ?>
    <?php
    include("login.php");
    ?>
    <h1 class="bad">¡Error en el Correo o la Contraseña!</h1>
    <?php   
}
mysqli_free_result($resul);
mysqli_close($bd);