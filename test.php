<?php
// class: DataBase,
// 都先設定為private
// __constuct: 使用config.php內參數與mariadb建立連線,
// __destruct: 關閉pdo連線資源,
// connect: 連線成功回報"連線成功",
// connectFailed: 連線失敗回報"連線失敗"與錯誤訊息
require_once("test_config.php");

class Database {
  private $dsn;
  private $user;
  private $passwd;
  private $pdo;
  public function __construct($sql) {
    $this->dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
    $this->user = DB_USER;
    $this->passwd = DB_PASSWORD;
    try {
      $this->pdo = new PDO($this->dsn, $this->user, $this->passwd);
      // 設定連線屬性 error全部回報, 使用原生prepare, utf8編碼
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $this->pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8"); 
      echo "連線成功" . "<br><br>";
      // return $this->pdo;
      // query


    } catch (PDOException $e) {
      echo "連線失敗" . $e->getMessage() . "<br>";
    }
  }
  public function __destruct() {
    $this->pdo = null;
    echo "<br><br>" . "關閉連線";
  }

  // public function 增刪改查 params ($sql, $table, $bind = [], )

}

$db = new Database('
  $sql = "select * from Users";
  $stmt = $this->pdo->prepare($sql);
  $stmt->execute();
  $jsonOutput = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  echo json_encode($jsonOutput);
  ');

var_dump($db);
