<?php
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
            $data= "$k='$v'";
        }else{
            $data.=",$k='$v'";
        }
        
    }

    if($state === false){
        $data.=",Profile='".$_POST['type']."'";
        $conn = connect_db();
        $result = $conn->query("INSERT INTO `User` Set $data");
        echo "<script>window.location.replace(\"index.php?page=list_Livreurs&type=".$_POST['type']."\");</script>";
       
    }
}

?>


<div class="container-fluid pt-4 px-4">
    
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Informations sur le Livreur</h6>
                <form action="" method="POST">
                <input type="text" value="<?php echo $_GET['type'] ?>" name="type" hidden>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nom du <?php echo (($_GET['type']==='2')?("Livreur"):("Vendeur"));?></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="FullName" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Adress</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="Addresse" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="Contact" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Login</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="Username" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de pass </label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <table class="table table-borderless">
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button type="submit" name="Ajouter" class="btn btn-primary"> Ajouter </button></td>
                        </tr>
                    </table>
                    
                    </form>
            </div>
</div>

