<?php
function register(
  PDO $pdo,
  string $name,
  string $email,
  string $password,
  int $county_id,
  string $birth
  )
{
  if(empty($pdo)) return '請連接DB';
  if(empty($name)) return '請輸入name';
  if(empty($email)) return '請輸入email';
  if(empty($password)) return '請輸入password';
  if(empty($county_id)) return '請選擇county';
  if(empty($birth)) return '請選擇birth';

  $sql = "insert into Users (name, email, password, county_id, birth) values (:name, :email, :password, :county_id, :birth)";
  $stmt = $pdo->prepare($sql);
  
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':password', $password, PDO::PARAM_STR);
  $stmt->bindParam(':county_id', $county_id, PDO::PARAM_INT);
  $stmt->bindParam(':birth', $birth, PDO::PARAM_STR);
  
  try {
    $stmt->execute();
    return '註冊成功';
    // echo '查詢資料成功！';
    // print_r($result);
    // return $result;
  } catch (PDOException $e) {
    return '註冊失敗：' . $e->getMessage();
    exit;
  }
}