<?php
    include_once __DIR__ . '/myapi/Products.php';
    use MARKETZONE\MAIN\Products as Product; 
    $product = new Product('marketzone');
    $product->delete($_POST['id']);
    echo $product->getResponse();
?>