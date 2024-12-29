<?php
/*
  select o.OrderID, o.EmployeeID, o.CustomerID, p.ProductName, od.UnitPrice, od.Quantity
  from OrderDetails od
  left join Orders o on o.OrderID = od.OrderID
  left join Employees e on o.EmployeeID = e.EmployeeID
  left join Products p on od.ProductID = p.ProductID
  where o.OrderID = 10248
*/
if (!$_REQUEST['orderId']) {
  $response = ['error' => 1];
} else {
  $orderId = $_REQUEST['orderId'];
  $mysqli = new mysqli('localhost', 'root', '', 'brad');
  $mysqli->set_charset('utf8');

  $sql = 'select o.EmployeeID eid, o.CustomerID cid, p.ProductName pname, od.UnitPrice price, od.Quantity qty
        from OrderDetails od
        left join Orders o on o.OrderID = od.OrderID
        left join Employees e on o.EmployeeID = e.EmployeeID
        left join Products p on od.ProductID = p.ProductID
        where o.OrderID = ?';

  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('i', $orderId);
  $stmt->execute();
  $stmt->store_result();

  // 如果沒有資料
  if ($stmt->num_rows == 0) {
    $response = [
      'error' => 2,
    ];
  } else {
    $response = [
      'error' => 0,
    ];

    // 放sql json
    $stmt->bind_result($eid, $cid, $pname, $price, $qty);
    while ($stmt->fetch()) {
      $response['cid'] = $cid;
      $response['eid'] = $eid;
      $response['detail'][] = [
        'pname' => $pname,
        'price' => $price,
        'qty' => $qty
      ];
    }
  }
}

header('Content-type: application/json'); // 在這之前不要有其他輸出不然會瀏覽器預設為html/text
echo json_encode($response); // 輸出，抓到有error code
