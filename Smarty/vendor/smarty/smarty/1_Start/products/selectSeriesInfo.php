<?php
class Series
{
  private $pdo;
  private $id;
  private $name;
  private $stock;

  public function __construct($pdo){
    if (!$pdo) {
      die("Database connection failed.");
    } else {
      $this->pdo = $pdo;
    }

  }

  public function loadSeries($series_id = null){
    if (isset($series_id)){
      $sql = "select id, name, stock from Series where id = :series_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(':series_id', $series_id, PDO::PARAM_INT);
    } else {
      $sql = "select id, name, stock from Series order by stock";
      $stmt = $this->pdo->prepare($sql);
    }
    $stmt->execute();
    $series = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($series);
    return $series;
  }

  public function updateStock($series_id, $stock){
    if (isset($series_id) && isset($stock)){
      $sql = "update Series set stock = :stock where id = :series_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(':series_id', $series_id, PDO::PARAM_INT);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
      $stmt->execute();
      $series = $stmt->fetchAll(PDO::FETCH_ASSOC);
      // var_dump($series);
      return ['error' => 'done'];
    } else {
      return ['error' => 'missimg series_id, stock'];
    }
  }


}