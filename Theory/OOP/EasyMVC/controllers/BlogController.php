<?php

class BlogController extends Controller {
    
  function index() {
      echo "home page of HomeController";
  }
  
  function list($list) {
      echo "This is list of blog $list";
  }
  
}

?>