<?php
session_destroy();
foreach ($_SESSION as $key => $value) {
    unset($_SESSION[$key]);
}
echo "<script>window.location.replace(\"index.php\");</script>";
?>