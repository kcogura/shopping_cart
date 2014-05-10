<?php
require_once("model/product.php");

class ProductsController {
    public function index() {
		$model_data = Product::all();
        include('views/products/index.php');
    }
}

$controller = new ProductsController();
$controller->index();
