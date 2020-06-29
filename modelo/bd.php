<?php
require('config.php');
class Datomysqli
{
   public $conection;
   public static function get_Datomysqli()
   {

      $conection = new mysqli(dbhost, dbusuario, dbpasword, dbnombre);
      if ($conection->connect_errno) {
         die("fallo la conexion a la base de datos");
      }
      return $conection;
   }
}
?>