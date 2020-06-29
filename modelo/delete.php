<?php
class Delete 
{
    private $conexion;
    public function __construct()
    {
require_once('bd.php');

        $this->conexion = Datomysqli::get_Datomysqli();
    }
    public function get_delete($id)
    {
        
        $sql = 'DELETE FROM tareas WHERE id=?';
        $resultado = $this->conexion->prepare($sql);
        $resultado->bind_param('i', $id);
        $resultado->execute();
        if ($resultado) {
            header('location:./../index.php');
        } else {
            echo "delete fallido ";
            exit;
        }
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $v = new Delete();
    $v->get_delete($id);
} else {
    echo 'fallo';
}
?>