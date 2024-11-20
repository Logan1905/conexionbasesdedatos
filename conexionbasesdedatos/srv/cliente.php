<?php

require_once __DIR__ . "/../lib/php/NOT_FOUND.php";
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/selectFirst.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_CLIENTES.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");

 $modelo =
  selectFirst(pdo: Bd::pdo(),  from: CLIENTE,  where: [ID_CLIENTE => $id]);

 if ($modelo === false) {
  $idHtml = htmlentities($id);
  throw new ProblemDetails(
   status: NOT_FOUND,
   title: "Cliente no encontrado.",
   type: "/error/clientenoencontrado.html",
   detail: "No se encontró ningún cliente con el id $idHtml.",
  );
 }

 devuelveJson([
  "ID_Cliente" => ["value" => $id],
  "Nombre" => ["value" => $modelo[NOMBRE]],
  "Apellido_Paterno" => ["value" => $modelo[APELLIDO_PATERNO]],
  "Apellido_Materno" => ["value" => $modelo[APELLIDO_MATERNO]]
 ]);
});
