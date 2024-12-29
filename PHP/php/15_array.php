<?php

// index可以是有意義的
$a1 = [1, 2, 3, 4, 5, 6=>6];
$a3 = '資策會';

var_dump($a3);
//utf8：2^24一個中文占3個長度
//big5：2^16一個中文占2個長度ms950(常用字，造字)

echo $a1[5];
echo '<hr>';
$a1[] = 'ok';
echo count($a1);
echo '<hr>';


// for
for($i = 0; $i < count($a1); $i++) {
echo $a1[$i].'<br>';
}

// 如python dictionary key => value對應
$person = ['name' => 'Brad', 'age' => 18, 'weight' => '80.2', 'gender' => true];
var_dump($person);
echo '<hr>';
echo $person['name'];
echo '<hr>';

// forEach
foreach($person as $ky => $vlu){
echo "$ky : $vlu<br>";
}

//如javascript(forin, foroff)

//相同型態，index，如何透過key進行存取的動作

echo gettype($_ENV);
foreach($_ENV as $k => $v){
  echo "$k : $v<br>";
}
// agent: safari