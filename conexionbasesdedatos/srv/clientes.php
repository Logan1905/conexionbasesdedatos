<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_CLIENTES.php";
ejecutaServicio(function () {
  try {
      $lista = select(
          pdo: Bd::pdo(),
          from: CLIENTE,
          orderBy: "Nombre"
      );

      if (!empty($lista)) {
          $render = "";
          foreach ($lista as $modelo) {
              $id = htmlentities(urlencode($modelo["ID_Cliente"]));
              $nombre = htmlentities($modelo["Nombre"]);
              $apellidoP = htmlentities($modelo["Apellido_Paterno"]);
              $apellidoM = htmlentities($modelo["Apellido_Materno"]);

              $render .= "
                  <dt>
                      <a href='modifica.html?id=$id'>$nombre</a>
                  </dt>
                  <dd>
                      Apellido Paterno: $apellidoP, Apellido Materno: $apellidoM
                  </dd>
              ";
          }
      } else {
          $render = "<p>No se encontraron clientes.</p>";
      }

      devuelveJson(["lista" => ["innerHTML" => $render]]);
  } catch (Exception $e) {
      devuelveJson(["error" => $e->getMessage()], 500);
  }
});