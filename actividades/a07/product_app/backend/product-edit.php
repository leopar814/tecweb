<?php
    use MARKETZONE\MAIN\Products as Product; 
    include_once __DIR__ . '/myapi/Products.php';
    $product = new Product('marketzone');
    $product->edit($_POST);
    echo $product->getResponse();
?>