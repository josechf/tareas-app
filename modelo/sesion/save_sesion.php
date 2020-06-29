<?php

class nuevasesion
{
   private $resultet;
   public function __construct()
   {
      require('modelo/bd.php');
      $this->resultet = Datomysqli::get_Datomysqli();
   }
   public function get_accion($nombre, $password, $pass_cifrado, $gmail)
   {
      $resultado = $this->resultet->prepare('INSERT INTO sesion(nombre,password,gmail) VALUES (?,?,?)');
      $resultado->bind_param('sss', $nombre, $pass_cifrado, $gmail);
      $resultado->execute();
      if ($resultado) {
         return;
      } else {
         echo "fallo la insercion";
      }
   }
}
?>