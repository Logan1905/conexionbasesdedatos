<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "mysql:host=sql206.infinityfree.com;dbname=if0_37714906_clientes;charset=utf8",
    // usuario
    "if0_37714906",
    // contraseña
    "xP6QDg6Rhdg",
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS cliente (
      ID_Cliente INT PRIMARY KEY AUTO_INCREMENT,
      Nombre TEXT NOT NULL,
      Apellido_Paterno TEXT NOT NULL,
      Apellido_Materno TEXT NOT NULL,
      CONSTRAINT CLI_PK
       PRIMARY KEY(ID_Cliente),
      CONSTRAINT CLI_NOM_LGTH
       CHECK(LENGTH(Nombre) >= 3),
      CONSTRAINT CLI_AP_P_LGTH
       CHECK(LENGTH(Apellido_Paterno) >= 3),
      CONSTRAINT CLI_AP_M_LGTH
       CHECK(LENGTH(Apellido_Materno) >= 3)
     )"
   );
  }

  return self::$pdo;
 }
}
