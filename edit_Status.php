<?php
$conn = connect_db();
if(isset($_POST['affecter'])){
    $query = "UPDATE `Order` SET status='".$_POST['user']."' where reference_number=".$_POST['ref'];
    if($conn->query($query) && $conn->query("INSERT INTO order_track set status= '".$_POST['user']."' , orderId =".$_POST['id'])){
        echo "<script> window.alert(\"L'operation a bien effectuee \");</script>";
        echo "<script>window.location.replace(\"index.php?page=list_orders\");</script>";
    }
}

?>
<div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4">
            
            <form method="POST" action="">
            <input type="text" value="<?php echo $_GET['ref']; ?>" name="ref" hidden>
            <input type="text" value="<?php echo $_GET['id']; ?>" name="id" hidden>
            <h4>Selectionner le Nouveau Statut :</h4>
            <select class="form-select form-select-sm mb-3" name="user">
            <option value="8">Selectionner un statut </option>
            <option value="2">En cours de livraison</option>
            <option value="3">Livré</option>
            <option value="4">Client injoignable</option>
            <option value="5">Annulee</option>
            <option value="0">attente de validation</option>
            </select>
            <button type="submit" class="btn btn-primary" name="affecter">Modifier</button>
            </form>
        </div>
</div>
       