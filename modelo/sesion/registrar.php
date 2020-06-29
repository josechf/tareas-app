<?php

require_once('modelo/bd.php');
class sesionstart extends Datomysqli
{
  private $resulset;
  function __construct()
  {
    $this->resulset = self::get_Datomysqli();
  }
  public function get_sesionstart($nombre, $password)
  {
    $sql = 'SELECT * FROM sesion where nombre=?';
    $resultado = $this->resulset->prepare($sql);
    $resultado->bind_param('s', $nombre);
    $resultado->execute();
    $resultado = $resultado->get_result();
    if ($resultado && $resultado->num_rows > 0) {
      while ($v = $resultado->fetch_assoc()) {
        if (password_verify($password, $v['password'])) {
          if (!isset($_SESSION['nombre'])) {
            session_start();
            $_SESSION['nombre'] = $_POST['nombre'];
          } else {
            return;
          }
        } else {
          echo 'fallo ' . $v['password'] . ' ' . $password;
        }
      }
    } else {
      echo 'bad';
      exit;
    }
  }
}

$nombre = htmlentities(addslashes($_POST['nombre']));
$password = htmlentities(addslashes($_POST['password']));
$envia = new sesionstart();
$envia->get_sesionstart($nombre, $password);
?>