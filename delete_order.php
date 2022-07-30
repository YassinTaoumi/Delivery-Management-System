<?php
$conn = connect_db();
echo "<script> window.alert(\"êtes-vous sûr? sinon retour à l'autre page \");</script>";
if($conn->query("DELETE FROM `Order` where id =".$_GET['id'])){
    echo "<script>window.location.replace(\"index.php?page=list_orders\");</script>";
}

?>