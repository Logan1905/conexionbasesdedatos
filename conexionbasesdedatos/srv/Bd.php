<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS cliente (
      ID_Cliente INTEGER,
      Nombre TEXT NOT NULL,
      Apellido_Paterno TEXT NOT NULL,
      Apellido_Materno TEXT NOT NULL,
      CONSTRAINT PAS_PK
       PRIMARY KEY(ID_Cliente),
       UNIQUE(Nombre),
       CHECK(LENGTH(Nombre) > 0)
     ) ENGINE=InnoDB"
   );
  }

  return self::$pdo;
 }
}
