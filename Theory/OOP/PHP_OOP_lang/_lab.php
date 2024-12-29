<?php
/* 基本操作 

記憶體位址：
  class: 靜態方法static
  object, instance: new出來的物件編號、資料、動態方法
  reference: 存object在記憶體的“位置” $obj->instance裡的屬性

  reference=null, object instance自動消失(michael jackson沒人聽就會忘記)

  session工作狀態：沒清掉購物車內容就還在

  分階級：php管object instance, 

*/
$obj = new CDog(); // ()呼叫__contruct -- 工廠方法：思考自己生?or體系來生?但要提出規格。
// $obj = findAnimal(""); 有可能找不到，new or find(規劃的問題)，像是我們用php
// $obj = null; 虛無指向：哥的女朋友的身高，但哥沒女朋有
$obj->makeNoise();
// echo $obj->weight; //class設private就拿不到

// 自己加屬性，可以__set, __get
// $obj->location = "TC";
// echo "$obj->location<br>";

class CAnimal{
  public $weight = 1; //private
  public function makeNoise(){
    echo "Animal: ...<br>";
  }
}
/* 封裝
UML四方形
訪客加入購物車+1呼吸變1，按一下購物車跳到購物車畫面，批次採購(checkbox)
購物車、產品、付錢都是不同的事

/prod/item/3: 1.check data >1, 2.呼叫api insert, 3.redirect->/cart/list
/prod/batch 1.insert X3, 2.redirect
/cart/list 1.select*from cart where uid = 017, show data

總價->紅利點數->壽星->特價商品(一個一個物件，如生產線)
讓業務人員可以自定義創造物件

多人共用：容錯、廠商、庫存、衝突調解、合作

程式設計＞系統分析＞專案經理

降低耦合：
原 A --> B
Y
A ----> doc ----> B
            ----> C

A
B

M = plan(A, B) -- M負責通知下一個

*/

/* 繼承
UML三角形
*/
// $dog = new CDog();
// echo $dog->makeNoise();
class CDog extends CAnimal{
  //多型
  public function makeNoise(){
    parent::makeNoise(); //父階拿來用
    echo "Dog: wang!<br>weight: $this->weight<br>";
  }
}
// class CCat extends CAnimal{
//   public function makeNoise(){
//     echo "Cat: meow!<br>";
//   }
// }

// play($obj);
// function play($anAnimal){
//   $anAnimal->makeNoise();
// }

/* 抽象：
eg門
物件導向是程式設計的哲學
*/

/* 
-- 操作用interface, implements
1_可以視為一套標準(有照這個標準，就都會有這些功能)
2_可以用來擴充功能
開車：透過操作介面跟駕駛互動 
組合代替繼承: interface能弄在不同class
*/
interface IDrive{
  //加速
  public function addSpeed($value);
  //減速
}
class CCar extends CAnimal implements IDrive{
  private $_speed = 0; 
  public function addSpeed($value){
    $this->_speed += $value;
  }
  public function getSpeed(){
    return $this->_speed;
  }
}

/* 
abstract:
抽象界定後，才能界定標準
*/
?>