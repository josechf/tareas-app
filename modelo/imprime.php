<?php
class Imprime
{
    private $sql;
    public function __construct()
    {
        require_once('bd.php');
        $this->sql = Datomysqli::get_Datomysqli();
    }
    public function imprimidor($entrada)
    {


        $pagina = $entrada;
        $final = 2;
        $ini = ($pagina - 1) * $final;
        $Sql = 'SELECT * FROM tareas LIMIT ' . $ini . ',' . $final . ''; //$final es la cantidad de vecez que se va a hacer el select
        $resultado = $this->sql->query($Sql);
        if ($resultado && $resultado->num_rows > 0) {
            $producto = array();
            while ($v = $resultado->fetch_All(MYSQLI_ASSOC)) {
                $producto = $v;
            }
            $resultado = null;
            $this->sql = null;
            return $producto;
        } else {
            echo "no se encontro ";
            exit;
        }
    }
}

class LIMIT
{
    private $conexion;
    public function __construct()
    {
        require_once('bd.php');
        $this->conexion = Datomysqli::get_Datomysqli();
    }
    public function limitador()
    {
        $sql = 'SELECT * FROM tareas';
        $resultado = $this->conexion->query($sql);
        $nfind = 0;
        while ($resultado->fetch_array(MYSQLI_NUM)) {
            $nfind++;
        }
        $resultado = null;
        $this->conexion = null;
        return $nfind;
    }
}
