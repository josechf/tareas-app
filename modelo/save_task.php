<?php
class Accion
{
    private $conexion;
    public function __construct()
    { 
        require_once('bd.php');
        $this->conexion= Datomysqli::get_Datomysqli();
    }
    public function get_accion($title, $description)
    {
        $resultado = $this->conexion->prepare('INSERT INTO tareas(titulo,descripcion) VALUES (?,?)');
        $resultado->bind_param('ss', $title, $description);
        $resultado->execute();
        if ($resultado) {
            header("location:./../index.php");
        } else {
            echo "fallo la insercion";
        }
    }
}

if (isset($_POST['tarea'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $variable = new Accion();
    $variable->get_accion($title, $description);
}
?>