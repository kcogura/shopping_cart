<?php
require_once('DbUtil.php');
require_once('utils.php');

class Product {

    private $id;
    private $name;
    private $price;

    public function __construct($params) {
        $this->id    = isset($params['id']) ? $params['id'] : null;
        $this->name  = isset($params['name']) ? $params['name'] : null;
        $this->price = isset($params['price']) ? $params['price'] : null;
    }

    public static function all() {

        $db = new DataBase();
        $pdo = $db->getPdo();

        $stmt = $pdo->query('SELECT * FROM Products');
        if (!$stmt) {
          $info = $pdo->errorInfo();
          exit($info[2]);
        }

        $rtn_data = array();
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $params['id'] = $data['id'];
            $params['name'] = $data['name'];
            $params['price'] = $data['price'];
            $product_temp = new Product($params);
            array_push($rtn_data,$product_temp);
        }
        $db = null;

        return $rtn_data;
    }

    public static function load($id) {

        $db = new DataBase();
        $pdo = $db->getPdo();

        $stmt = $pdo->query('SELECT * FROM Products where id = '.escape_sql($id));
        if (!$stmt) {
          $info = $pdo->errorInfo();
          exit($info[2]);
        }

        $rtn_product = null;
        if ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $params['id'] = $data['id'];
            $params['name'] = $data['name'];
            $params['price'] = $data['price'];
            $rtn_product = new Product($params);
        }
        $db = null;

        return $rtn_product;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
     public function getPrice() {
        return $this->price;
    }

}
