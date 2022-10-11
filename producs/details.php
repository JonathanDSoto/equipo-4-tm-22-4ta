<?php

    include "../app/BrandController.php";
	include "../app/ProductsController.php";

    $brandController = new BrandController();
	$productController = new ProductsController();

	$product_slug = $_GET['slug'];
	$producto = $productController->getProduct($product_slug);
    $brands = $brandController->getBrands();
?>
