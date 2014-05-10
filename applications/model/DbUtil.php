<?php
define("dsn","mysql:dbname=webpro2exam;host=localhost"); 
define("username","root"); 
define("password","root");    

class DataBase {
  private $pdo = null;

  public function __construct() {
        try {
          $this->pdo = new PDO(dsn, username, password);
        } catch (PDOException $e) {
          exit('データベースに接続できませんでした。' . $e->getMessage());
        }
        $stmt = $this->pdo->query('SET NAMES utf8');
        if (!$stmt) {
          $info = $this->pdo->errorInfo();
          exit($info[2]);
        }
    }
   	public function getPdo() {
    	return $this->pdo;
    }
}
