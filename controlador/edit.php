<?php
include("../vista/include/header.html");
include("../vista/include/fooder.html");
if (!isset($_POST['update'])) {
  $id = $_GET['id'];
  $i = $_GET['i'];
  require_once('../modelo/imprime.php');
  $va = new Imprime();
  $v = $va->imprimidor($i);
}
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  require('../modelo/update.php');
  $ac = new Actualiza();
  $ac->get_actualizador($titulo, $descripcion, $id);
}
?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?> " method="post">
          <?php foreach ($v as $e) {
            if (trim($id)==$e['id']) { ?>
              <input type="hidden" name="id" value=" <?php echo $e['id']; ?>"></input>
              <div class="form-group">
                <input class="form-control" type="text" name="titulo" value=" <?php echo $e['titulo']; ?>"></input>
              </div>
              <div class="form-group">
                <textarea class="form-control" row="2" name="descripcion"><?php echo $e['descripcion']; ?></textarea>
              </div>

          <?php }
          } ?>
          <button class="btn btn-outline-dark" name="update" type="submit">
            <i class="fas fa-pencil-alt"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>