<?php
$data = '0123456789';
$where = strpos($data, 666);

if ($where === false) {
  echo 'not found';
} else {
  echo $where;
}
