<?php
Session_start();
include "Functions.php";
if(isset($_POST['login'])){
    $con = connect_db();
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $sql = "SELECT * FROM User WHERE Username='$username' AND password='$password'";

    $result = $con->query($sql,PDO::FETCH_ASSOC);

    if ($result->rowCount($result) === 1) {
        $row =$result->fetch(PDO::FETCH_ASSOC);
        if ($row['Username'] === $username && $row['password'] === $password) {
            $_SESSION['user_name'] = $row['Username'];
            $_SESSION['name'] = $row['FullName'];
            $_SESSION['id'] = $row['UserId'];
            $_SESSION['Profile'] = $row['Profile'];
            if($row['Profile']==="1"){
                header("Location: index.php?page=Dash");
            }elseif($row['Profile']==="2"){
                header("Location: index.php?page=LivCOmm");
            }elseif($row['Profile'] === "3") {
                header("Location: index.php?page=vendCom");
            }
            
        }
}}

?>