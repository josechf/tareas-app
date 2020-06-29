<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <?php formularios();
                function formularios()
                { ?>
                    <form action="modelo/save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="descripcion"></textarea>
                        </div>
                        <input type="submit" class="btn btn-outline-dark" name="tarea" value="guardar">
                    </form>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <button class="btn btn-outline-dark" name="cerrar">cerrar sesion</button>
                        <button class="btn btn-outline-dark" name="iniciar">crear usuario</button>
                    </form>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>description</th>
                        <th>Fecha</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['carga'])) {
                        if ($_GET['carga'] == 0) {
                            primera();
                        } else {
                            segunda();
                        }
                    } else {
                        primera();
                    }
                    $total = limite();
                    function ciclo($i, $v)
                    {
                        foreach ($v as $e) { ?>
                            <tr>
                                <td>
                                    <?php echo $e['titulo']; ?>
                                </td>
                                <td>
                                    <?php echo $e['descripcion']; ?>
                                </td>
                                <td>
                                    <?php echo $e['fecha']; ?>
                                </td>
                                <td>
                                    <a class="btn btn-secondary" href="controlador/edit.php?id=<?php echo $e['id'] ?> & i=<?php echo $i ?>"><i class="fas fa-pencil-alt"></i></a>
                                    <a class="btn btn-danger" href="modelo/delete.php?id=<?php echo $e['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                    <?php  }
                    } ?>
                    <td>
                        <?php
                        for ($i = 1; $i <= $total; $i++) { ?>
                            <a href="?carga=<?php echo $i ?>"><?php echo $i ?></a>
                        <?php } ?>
                    </td>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
