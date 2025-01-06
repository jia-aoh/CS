<?php

class HomeController extends Controller {
    
    function index() {
        echo "home page of HomeController";
    }
    
    function hello($name) {
        $user = $this->model("User"); // 直接使用父類method 意思是 $user = new User()
        $user->name = $name;
        $this->view("Home/hello", $user); // 在views/Home/hello使用 [$user, $series]一個內可以->幾個
        // echo "Hello! $user->name";
    }
    
}

?>
