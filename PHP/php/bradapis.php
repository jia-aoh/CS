<?php
    $mysqli = new mysqli('localhost',
    'root','', 'brad');
    $mysqli->set_charset('utf8');   

    define('LETTERS', 'ABCDEFGHJKLMNPQRSTUVXYWZIO');

    function checkTWId($id){
        $isRight = false;

        /*
        if (strlen($id) == 10) {
            $c1 = substr($id,0,1);
            $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            if (strpos($letters, $c1) !== false){
                $c2 = substr($id,1,1);
                if ($c2 == '1' || $c2 == '2'){

                }
            }
        }
        A123456789
        192.168.3.4
        2024-10-25
        09:55:33
        0921-123456
        04-23265860
        */

        if (preg_match('/^[A-Z][12][0-9]{8}$/', $id)){
            //$isRight = true;
            $c1 = substr($id,0,1);
           
            $a12 = strpos(LETTERS, $c1) + 10;
            $a1 = (int)($a12 / 10);
            $a2 = $a12 % 10;
            $n1 = substr($id, 1, 1);
            $n2 = substr($id, 2, 1);
            $n3 = substr($id, 3, 1);
            $n4 = substr($id, 4, 1);
            $n5 = substr($id, 5, 1);
            $n6 = substr($id, 6, 1);
            $n7 = substr($id, 7, 1);
            $n8 = substr($id, 8, 1);
            $n9 = substr($id, 9, 1);

            $sum = $a1*1 + $a2*9 + $n1*8 + $n2*7 + $n3*6 + $n4*5 +
                    $n5*4 + $n6*3 + $n7*2 + $n8*1 + $n9 * 1;
            $isRight = $sum % 10 == 0;
        }

        return $isRight;
    }

    function createTWIdByRandom(){
        $isMale = rand(0,1) == 0;
        return createTWIdByGender($isMale);
    }
    function createTWIdByArea($area){
        $isMale = rand(0,1) == 0;
        return createTWIdByBoth($area, $isMale);
    }
    function createTWIdByGender($isMale){
        $area = substr(LETTERS, rand(0,25), 1);
        return createTWIdByBoth($area, $isMale);
    }
    function createTWIdByBoth($area, $isMale){
        $id = $area;
        $id .= $isMale? '1' : '2';
        for ($i=0; $i<7; $i++) $id .= rand(0,9);

        for ($i = 0; $i < 10; $i++){
            if (checkTWId($id . $i)){
                $id .= $i;
                break;
            }
        }
        return $id;
    }

    class Student{
        private $name, $ch, $en, $math;
        public function __construct($name, $ch, $en, $math){
            $this->name = $name;
            $this->ch = $ch;
            $this->en = $en;
            $this->math = $math; 
        }

        public function getName(){
            return $this->name;
        }

        public function sum(){
            return $this->ch + $this->en + $this->math;
        }

        public function avg(){
            return $this->sum() / 3;
        }

        public function setMath($math){
            $this->math = $math;
        }
    }

    class Member{
        private $id, $account, $name, $icon; //密碼不需要存
        
        public function __construct($id, $account, $name, $icon){
            $this->id = $id;
            $this->account = $account;
            $this->name = $name;
            $this->icon = $icon;
        }
        //getter
        public function getId(){
            return $this->id;
        }
        public function getAccount(){
            return $this->account;
        }
        public function getName(){
            return $this->name;
        }
        public function getIcon(){
            return $this->icon;
        }

    }

?>