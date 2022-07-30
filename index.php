<?php
session_start();
include 'Functions.php';
$pdo = connect_db();
if(isset($_GET['page'])){
  if($_GET['page'] === "Login"){
    if(!isset($_SESSION['user_name'])){
      header("Location:/Delivery/dist/index.html");
    }
    
  }
  if(isset($_SESSION['user_name']) && isset($_SESSION['name']) && isset($_SESSION['id'])){
    template_header();
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
    include $page .'.php';
    template_footer();
  }
}

else{
  header("Location:/Delivery/HomePage/public/index.html");
}

?>
