<?php
class Actualiza
{
    private $resulset;
    public function __construct()
    {
        require_once('bd.php');
        $this->resulset = Datomysqli::get_Datomysqli();
    }

    public function get_actualizador($titulo, $descripcion, $id)
    {
        $sql = 'UPDATE tareas SET titulo=?, descripcion=? WHERE id=?';
        $resultado = $this->resulset->prepare($sql);
        $resultado->bind_param('ssi', $titulo, $descripcion, $id);
        $resultado->execute();
        if ($resultado) {
            header("location:./../index.php");
        } else {
            echo "fallo la actualizacion";
        }
    }
}
?>