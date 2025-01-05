<?php
function selectCharactersBySeries(PDO $pdo, int $series_id)
{
  $sql = "select id, name from Characters WHERE series_id = :series_id";
  $stmt = $pdo->prepare($sql);
  
  $stmt->bindParam(':series_id', $series_id, PDO::PARAM_INT);
  
  try {
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    // echo '查詢資料成功！';
    // print_r($result);
    return $result;
  } catch (PDOException $e) {
    echo '查詢資料失敗：' . $e->getMessage();
    exit;
  }
}

function selectCharactersBySeriesFowards(PDO $pdo, int $series_id)
{
  $sql = "select id, name from Characters WHERE series_id = :series_id";
  $stmt = $pdo->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
  
  $stmt->bindParam(':series_id', $series_id, PDO::PARAM_INT);
  
  try {
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
      $data = $row[0] . "\t" . $row[1];
      print $data;
    }
    // echo '查詢資料成功！';
    // return $result;
  } catch (PDOException $e) {
    echo '查詢資料失敗：' . $e->getMessage();
    exit;
  }
}
?>