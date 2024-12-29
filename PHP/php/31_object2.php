<?php

    class Bike {
        protected $speed;

        public function __construct() {
            $this->speed = 0;
            echo 'Bike()<br />';
        }

        public function upSpeed(){
            $this->speed = $this->speed< 1? 1 : $this->speed * 1.4;
        }
        public function downSpeed(){
            $this->speed = $this->speed< 1? 0 : $this->speed * 0.7;
        }

        public function getSpeed(){
            return $this->speed;
        }

    }

    class Scooter extends Bike {
        private $gear;
        public function __construct() {
            $this->gear = 0;
            echo 'Scooter()<br />';
        }
        public function upSpeed(){
            $this->speed = $this->speed< 1? 1 : $this->speed * 1.7 *$this->gear;
        }
        public function changeGear($gear = 0){
            if ($gear >= 0 && $gear <= 4) {
                $this->gear = $gear;
            }
        }
    }



    $myBike = new Bike();
    while ($myBike->getSpeed() < 10){
        $myBike->upSpeed();
    }
    echo $myBike->getSpeed();
    echo '<hr />';

    $myScooter = new Scooter();
    while ($myScooter->getSpeed() < 10){
        $myScooter->upSpeed();
    }
    echo $myScooter->getSpeed();
    echo '<hr />';







?>