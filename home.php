<?php
session_start();

if (isset($_SESSION['correo']) && isset($_SESSION['id_rol'])) {

  // Existe una sesión activa, puedes acceder a los datos de la sesión
  $correo = $_SESSION['correo'];
  $id_rol = $_SESSION['id_rol'];

  // Resto del código para usuarios autenticados...
  // Verifica que tipo de usuario es

  if ($id_rol == '601') {

    //Código para el administrador
    $user_role = 'admin';
    include("header.php");

  } else if ($id_rol == '600') {

    //Código para el usuario mortal
    $user_role = 'user';
    include("header.php");

  }

} else {

  // Código para el usuario invitado
  $user_role = 'guest';
  include("header.php");

}
?>


<div class="container background-container" style="margin-start:10px; margin-bottom:20px; border-radius:20px;">
  <h1 style="text-align:left; color:white; text-align:center;"> <img src="img/lona.png" height="180px" width="180px"
      style="border-radius:25px"> <strong> Pincheles S.A.
      de C.V.</strong></h1>
  <h2 style="color:white;"><strong>Misión:</strong></h2>
  <h5 style="color:white;">
    En Pincheles, nuestra misión es proporcionar a nuestros clientes los mejores estuches de pinceles disponibles en
    el
    mercado. Nos esforzamos por ofrecer una experiencia de compra en línea fácil y satisfactoria, con un servicio al
    cliente excepcional y una entrega rápida y confiable. Queremos ayudar a nuestros clientes a llevar su creatividad
    al
    siguiente nivel, proporcionando herramientas de alta calidad y duraderas.
  </h5>
  <h2 style="color:white;"><strong>Visión:</strong></h2>
  <h5 style="color:white;">
    Nuestra visión en Pincheles es convertirnos en la tienda en línea líder en la venta de estuches de pinceles en el
    mercado nacional e internacional. Buscamos inspirar a nuestros clientes a través de nuestros productos, así como
    brindarles la confianza de que están comprando los mejores estuches de pinceles disponibles en el mercado.
    Queremos
    ser reconocidos como una empresa confiable, innovadora y sostenible, que contribuya al desarrollo de la comunidad
    y
    al cuidado del medio ambiente.
  </h5>
  <h2 style="color:white;"><strong>Valores:</strong></h2>
  <h5 style="color:white;"> - Excelencia: Nos esforzamos por ofrecer siempre lo mejor en términos de calidad, servicio
    y atención al cliente.
  </h5>
  <h5 style="color:white;"> - Pasión: Somos apasionados por nuestro trabajo y nos enfocamos en crear productos que
    inspiren y ayuden a
    nuestros
    clientes en su proceso creativo.</p>
    <h5 style="color:white;"> - Integridad: Nos regimos por altos estándares éticos y morales en todas nuestras
      operaciones y relaciones
      comerciales.</p>
      <h5 style="color:white;"> - Innovación: Nos mantenemos a la vanguardia de las tendencias y tecnologías en
        nuestra industria para ofrecer
        productos innovadores y de alta calidad.</p>
        <h5 style="color:white;"> - Responsabilidad social y ambiental: Nos preocupamos por el bienestar de la
          comunidad y el medio ambiente, y
          trabajamos para reducir nuestro impacto ambiental y contribuir al desarrollo social.</p>

          <br> </br>


          <div class="col-sm-6 offset-sm-3 mx-auto d-grid text-start" style="margin-bottom:30px;">
            <button type="submit" class="btn btn-dark" style="alignment:center;">
              <a href="articulos.php" class="text-white" style="text-decoration:none;">VER PRODUCTOS</a>
            </button>
          </div>



</div>

<footer class="text-center text-white" style="background-color: black; color:white; font-weight: lighter;">
  <div>Conoce mas en:
    <a href="https://github.com/Limoncito160/ProyectoPrograWeb">GitHub</a>
  </div>

  <div class="text-center text-white p-3" style="background-color: black;">
    © Mayo 2023 Copyright: Pincheles de S.A. de C.V.
  </div>

</footer>

<style>
  .background-container {
    background-image: url('img/background.jpg');
    background-size: cover;
    background-repeat: no-repeat;
  }
</style>