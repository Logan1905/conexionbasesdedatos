<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaApellidoM(false|string $apellidom)
{

 if ($apellidom === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el apellido materno.",
   type: "/error/faltaapellidom.html",
   detail: "La solicitud no tiene el valor de apellido materno."
  );

 $trimApellidom = trim($apellidom);

 if ($trimApellidom === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Apellido materno en blanco.",
   type: "/error/apellidomenblanco.html",
   detail: "Pon texto en el campo apellido materno.",
  );

 return $trimApellidom;
}
