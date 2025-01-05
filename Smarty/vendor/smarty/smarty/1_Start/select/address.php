<?php

function county(PDO $pdo)
{
  $sql = "select id, county from County";
  $stmt = $pdo->prepare($sql);  
  try {
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    // echo '查詢資料成功！';
    // print_r($result);
  } catch (PDOException $e) {
    echo '查詢資料失敗：' . $e->getMessage();
    exit;
  }
}