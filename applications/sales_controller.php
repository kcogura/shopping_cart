<?php
require_once("model/product.php");
require_once("model/sale.php");
require_once("utils.php");

class SalesController {
    public function index() {
        $model_data = Sale::all();        
//        var_dump($model_data);
        include('views/sales/index.php');
    }

    public function indexNew($id) {
        $model_data = Product::load($id);       
        include('views/sales/new.php');
    }

 	public function indexCreate($id,$number) {
        $model_data = Sale::save($id,$number);
    }
}

$controller = new SalesController();

if(isset($request_data["action"])){
	if($request_data["action"] == "new"){
		$controller->indexNew($request_data["id"]);
	} else if($request_data["action"] == "create") {
	   $controller->indexCreate($request_data["id"],$request_data["number"]);
	   header("Location:products_controller.php");
    }
} else{
    $controller->index();    
}



