<?php
    use Myapi\Update\Update as Update;
    require_once __DIR__.'/start.php';

    $producto = new Update('marketzone');
    $producto->edit( json_decode( json_encode($_POST) ) );
    echo $producto->getData();
?>