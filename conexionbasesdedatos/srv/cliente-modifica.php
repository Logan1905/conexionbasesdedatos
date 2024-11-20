<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_CLIENTES.php";

ejecutaServicio(function () {
    $id = recuperaIdEntero("id");

  $nombre = recuperaTexto("nombre");
  $apellidop = recuperaTexto("apellidop");
  $apellidom = recuperaTexto("apellidom");

  $nombre = validaNombre($nombre);
 
  
 
  $apellidop = validaNombre($apellidop);

 
  $apellidom = validaNombre($apellidom);

 update(
  pdo: Bd::pdo(),
  table: CLIENTE,
  set: [
    NOMBRE => $nombre,
    APELLIDO_PATERNO => $apellidop,
    APELLIDO_MATERNO => $apellidom
],
  where: [ID_CLIENTE => $id]
 );

 devuelveJson([
  "ID_Cliente" => ["value" => $id],
  "Nombre" => ["value" => $nombre],
  "Apellido_Paterno" => ["value" => $apellidop],
  "Apellido_Materno" => ["value" => $apellidom]
 ]);
});
