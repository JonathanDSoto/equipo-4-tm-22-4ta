<?php
    include '../app/ProductsController.php';
    include "../app/BrandController.php";

    $producto = new ProductsController();
    $brandController = new BrandController();

    $productos = $producto -> getProducts();
    $brands = $brandController->getBrands();

?>
