<!-- OrderDetails
OrderID 
UnitPrice*Quantity

Orders 
OrderID 
EmployeeID

select e.LastName, o.EmployeeID as '員工編號', sum(od.UnitPrice*od.Quantity) as '業績' 
from Orders o left join OrderDetails od on o.OrderID = od.OrderID 
left join Employees e on o.EmployeeID = e.EmployeeID 
group by o.EmployeeID 
order by 業績 desc

驗算
select sum(UnitPrice*Quantity)
from OrderDetails 
where OrderID in (
	select OrderID from Orders 
	where EmployeeID = 4
) -->
<?php

  $mysqli = new mysqli('localhost','root','','brad');
  $mysqli->set_charset('utf8');

  $sql = 'select e.LastName, o.EmployeeID, sum(od.UnitPrice*od.Quantity) as Sales
          from Orders o left join OrderDetails od on o.OrderID = od.OrderID 
          left join Employees e on o.EmployeeID = e.EmployeeID 
          group by o.EmployeeID 
          order by Sales desc';

  $stmt = $mysqli->prepare($sql); // 可以where時間
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($LastName, $No, $Sales);

?>
<table border="1">
  <tr>
    <th>排行</th>
    <th>員工</th>
    <th>員工編號</th>
    <th>業績</th>
  </tr>
  <?php
  
  $rank = 1;
  while($stmt->fetch()){
    echo "<tr>";
    echo "<td>{$rank}</td>";
    echo "<td>{$LastName}</td>";
    echo "<td>{$No}</td>";
    echo "<td>{$Sales}</td>";
    echo "</tr>";
    $rank++;
  }

  ?>
</table>