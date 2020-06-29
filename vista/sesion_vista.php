<?php
if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre']; ?>
    <div>
        <p class="alert alert-primary" ><?php echo 'bienvenido ' . $nombre ?></p>
    </div>
<?php } //fin sesion 
?>