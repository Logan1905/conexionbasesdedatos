<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaApellidoP(false|string $apellidop)
{

 if ($apellidop === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el apellido paterno.",
   type: "/error/faltaapellidop.html",
   detail: "La solicitud no tiene el valor de apellido paterno."
  );

 $trimApellidop = trim($apellidop);

 if ($trimApellidop === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Apellido paterno en blanco.",
   type: "/error/apellidopenblanco.html",
   detail: "Pon texto en el campo apellido paterno.",
  );

 return $trimApellidop;
}
