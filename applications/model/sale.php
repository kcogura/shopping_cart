<?php
require_once('DbUtil.php');
require_once('utils.php');

class Sale {

    private $id;
    private $product_id;
    private $name;
    private $sales_at;
    private $quantity;
    private $price;

    public function __construct($params) {
        $this->id         = isset($params['id']) ? $params['id'] : null;
        $this->product_id = isset($params['product_id']) ? $params['product_id'] : null;
        $this->sales_at   = isset($params['sales_at']) ? $params['sales_at'] : null;
        $this->quantity   = isset($params['quantity']) ? $params['quantity'] : null;
        $this->name  = isset($params['name']) ? $params['name'] : null;
        $this->price = isset($params['price']) ? $params['price'] : null;
    }

    public static function all() {

        $db = new DataBase();
        $pdo = $db->getPdo();

        $sql = "SELECT Sales.id, product_id, name, sales_at, quantity, price FROM Sales JOIN Products ON Products.id = Sales.product_id";
       $stmt = $pdo->query($sql);
        if (!$stmt) {
          $info = $pdo->errorInfo();
          exit($info[2]);
        }

        $rtn_data = array();
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $params['id'] = $data['id'];
            $params['product_id'] = $data['product_id'];
            $params['sales_at'] = $data['sales_at'];
            $params['quantity'] = $data['quantity'];
            $params['name'] = $data['name'];
            $params['price'] = $data['price'];
            $sale_temp = new Sale($params);
            array_push($rtn_data,$sale_temp);
        }
        $db = null;

        return $rtn_data;
    }

    public  static function save($id,$number) {

        $db = new DataBase();
        $pdo = $db->getPdo();

        $sql = "INSERT INTO Sales (product_id, quantity, sales_at) VALUES (".escape_sql($id).",".escape_sql($number).",now())";
        $stmt = $pdo->query($sql);
        if (!$stmt) {
          $info = $pdo->errorInfo();
          exit($info[2]);
        }
        $db = null;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    public function getSalesAt() {
        return $this->sales_at;
    }

    public function setSalesAt($sales_at) {
        $this->sales_at = $sales_at;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getName() {
        return $this->name;
    }
    public function getPrice() {
        return $this->price;
    }
}
