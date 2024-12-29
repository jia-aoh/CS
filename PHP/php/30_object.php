<?php
/* 

java物件導向:
A. 定義
  1. 屬性
    e.g. 電子商務購物車：購物清單(品項、數量、不要價錢結帳再弄)、
  2. 方法 
  3. 如何方法

B. 資料存取
  4. 建構式：物件初始化(所有類別一定有建構式：繼承)
  5. 資料存取function內容

C. new()：記憶體產生實體 -> 初始化 -> 

-- 設計物件 > 應用物件

檢查：
有沒有可能是負的數字

D. 發揚光大
E. function改寫
*/

 // 慣例會把首字大寫，駝峰式命名
  class Bike{

    // 屬性(誰-public 可以存取)
    // 速度不可能對外營業，用private封裝
    // private $speed; //慣例全小寫，(java有強型別、初始值)
    
    
    // 速度能給繼承的子類別用
    protected $speed; //慣例全小寫，(java有強型別、初始值)

    // 建構式、子、方法 function __construct()
    public function __construct(){
      $this->speed = 0;
      echo "Bike()<br>"; //確保mybike有進行初始化程序
    }
    
    // 方法
    public function upSpeed(){
      $this->speed = $this->speed < 1 ? 1 : $this->speed * 1.4;
    }
    
    public function downSpeed(){
      $this->speed = $this->speed < 1 ? 0 : $this->speed * 0.7;
    }
    
    //  新增計速器，不能以其他方法加速
    public function getSpeed(){
      return $this->speed;
    }
  }
  
  class Scooter extends Bike{ // 發揚光大(繼承1)
    
    // 增加檔位屬性
    private $gear;
    
    public function __construct(){
      $this->gear = 0;
      echo "Scooter()<br>";
      // echo "$this->speed<br>"; // 因有自己的所以不用父類別的屬性
    }

    public function upSpeed(){
      $this->speed = $this->speed < 1 ? 1 : $this->speed * 1.7 * $this->gear; //齒輪比
    }

    public function changeGear($gear = 0){
      if($gear >= 0 && $gear <= 4){
        $this->gear = $gear;

      }
    }
  }

  // 建立腳踏車
  $myBike = new Bike();

  // $myBike->speed = 10.1; 因為沒封裝所以產生bug

  // 加速
  while($myBike->getSpeed() < 10){
    $myBike->upSpeed();
  }

  echo $myBike->getSpeed(); // 全都用方法處理
  echo "<hr>";

  // 建立機車
  $myScooter = new Scooter();
  while($myScooter->getSpeed() < 10){
    $myScooter->upSpeed();
  }
  
  echo $myScooter->getSpeed();
  echo "<hr>";

?>