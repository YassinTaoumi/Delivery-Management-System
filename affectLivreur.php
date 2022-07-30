<?php
$conn = connect_db();
$result = $conn->query("SELECT * FROM User where Profile='2'");
$users = $result->fetchAll(PDO::FETCH_ASSOC);
$result2 = $conn->query("SELECT * FROM `Order` where status='0'");
$data = $result2->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST['affecter'])){
    $query = "UPDATE `Order` SET LivreurId=".$_POST['user'].",status='1' where id=".$_POST['commande'];
    if($conn->query($query) && $conn->query("INSERT INTO order_track set status= '1' , orderId = $id".$_POST['commande'])){
        echo "<script> window.alert(\"L'operation a bien effectuee \");</script>";
        echo "<script>window.location.replace(\"index.php?page=list_orders\");</script>";
    }
}
?>
<div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Affecter Une Commande a un livreur :</h6>
            <form action="" method="POST">
            <h4>Selectionner la Commande :</h4>
            <select class="form-select form-select-sm mb-3" name="commande">
            <option value="0">Selectionner une Commande </option>
            <?php foreach($data as $k=>$v){ ?>
            <option value="<?php echo $v['id'];?>"><?php echo $v['reference_number'].",".$v['sender_name'].",".$v['recipient_name'];?></option>
            <?php } ?>
            </select>
            <h4>Selectionner le Livreur :</h4>
            <select class="form-select form-select-sm mb-3" name="user">
            <option value="0">Selectionner un Livreur </option>
            <?php foreach($users as $k=>$v){ ?>
            <option value="<?php echo $v['UserId'];?>"><?php echo $v['FullName']?></option>
            <?php } ?>
            </select>
            <button type="submit" class="btn btn-primary" name="affecter">Affecter</button>
            </form>
            
            </div>
        </div>
       