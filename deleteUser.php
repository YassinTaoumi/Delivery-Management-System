<?php
$conn = connect_db();
echo "<script> window.alert(\"êtes-vous sûr? sinon retour à l'autre page \");</script>";
if($conn->query("DELETE FROM `User` where UserId =".$_GET['id'])){
    echo "<script>window.location.replace(\"index.php?page=list_Livreurs&type=".$_GET['type']."\");</script>";
}
?>