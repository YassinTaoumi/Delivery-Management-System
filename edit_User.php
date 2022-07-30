<?php
$conn = connect_db();
$qry = $conn->query("SELECT * FROM `User` where UserId = ".$_GET['id'])->fetchAll(PDO::FETCH_ASSOC);
foreach($qry as $k => $v){
	foreach($v as $key=>$value){
        $$key = $value;
    }
if($_GET['type']==='2'){
$result = $conn->query("SELECT count(*) as nb FROM `Order` where LivreurId =".$_GET['id']." AND status = '2'");
$nbcommand = $result->fetch(PDO::FETCH_ASSOC);
}

}
if(isset($_POST['Ajouter'])){
    $data = "";
    $state = false;
    foreach($_POST as $k=>$v){
        if($k === "Ajouter"){
            continue;
        }
        if($k === "type"){
            continue;
        }
        if(empty($v)){
            echo "<div class=\"alert alert-warning\" role=\"alert\">
            Please Fill all the fields Please
        </div>";
        $state = true;
        break;
        }

        if(empty($data)){
            $data= "$k=$v";
        }else{
            $data.=",$k='$v'";
        }
        
    }
    
    if($state === false){
        $conn = connect_db();
        $result = $conn->query("UPDATE `User` Set $data where UserId=".$_POST['UserId']);
        echo "<script>window.location.replace(\"index.php?page=list_Livreurs&type=".$_POST['type']."\");</script>";
    }
}

?>
<div class="container-fluid pt-4 px-4">
    
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Informations sur le Livreur</h6>
                <form action="" method="POST">
                <input type="text" hidden value="<?php echo $_GET['type']; ?>" name="type">
                    <input type="text" hidden value="<?php echo $UserId; ?>" name="UserId">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nom du Livreur</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="FullName" value="<?php echo $FullName; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Adress</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="Addresse" value="<?php echo $Addresse; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="Contact" value="<?php echo $Contact; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Login</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="Username" value="<?php echo $Username; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de pass </label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $password; ?>">
                    </div>
               
            </div>
</div>
    <?php if($_GET['type']==='2'){ ?>
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Informations sur les commandes</h6>
            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre des commandes Effectuee : </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Prix" value="<?php echo $nbcommand['nb'];?>" disabled></th>

                                    </tr>
                                    
                                    <tr>
                                        <td></td>
                                        <td></td>
                                       
                                        <td><button type="submit" name="Ajouter" class="btn btn-primary"> Sauvegarder </button></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
            </div>
            <?php }else{ ?>
                <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
            
            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Prix" value="<?php echo $nbcommand['nb'];?>" hidden></th>

                                    </tr>
                                    
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                       
                                        <td><button type="submit" name="Ajouter" class="btn btn-primary"> Sauvegarder </button></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
            </div>
            <?php } ?>

        </div>
        
</form>
</div>
</div>