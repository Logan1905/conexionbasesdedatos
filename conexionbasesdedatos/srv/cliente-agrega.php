<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_CLIENTES.php";

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");

 $nombre = validaNombre($nombre);

 $apellidop = recuperaTexto("apellidop");

 $apellidop = validaNombre($apellidop);

 $apellidom = recuperaTexto("apellidom");

 $apellidom = validaNombre($apellidom);

 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: CLIENTE, values: [
    'Nombre' => $nombre,
    'Apellido_Paterno' => $apellidop,
    'Apellido_Materno' => $apellidom
]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/cliente.php?id=$encodeId", [
  "ID_Cliente" => ["value" => $id],
  "Nombre" => ["value" => $nombre],
  "Apellido_Paterno" =>["value" => $apellidop],
  "Apellido_Materno" =>["value" => $apellidom]
 ]);
});
