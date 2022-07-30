<?php
if(isset($_POST['Ajouter'])){
    $data = "";
    $state = false;
    foreach($_POST as $k=>$v){
        if($k === "Ajouter"){
            continue;
        }
        if(empty($v)){
            echo "<div class=\"alert alert-warning\" role=\"alert\">
            Please Fill all the fields Please
        </div>";
        $state = true;
        break;
        }
        if($k === "price"){
            if(!is_numeric($_POST[$k])){
                echo "<div class=\"alert alert-warning\" role=\"alert\">
            The price must be number
            </div>";
            $state=true;
            break;
            }
        }
        if($k === "weight"){
            if(!is_numeric($_POST[$k])){
                echo "<div class=\"alert alert-warning\" role=\"alert\">
            The weight must be number
            </div>";
            $state=true;
            break;
            }
        }
        if(empty($data)){
            $ref = sprintf("%'012d",mt_rand(0, 999999999999));
            $data= "reference_number='$ref'";
        }
        $data.=",$k='$v'";
    
    }
    if($state === false){
        $data.=",status=0";
        $conn = connect_db();
        $result = $conn->query("INSERT INTO `Order` Set $data");
        // header("Location: index.php?Dash");
        echo "<script>window.location.replace(\"index.php?page=Dash\");</script>";
    }
    
    
    
}
?>



<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Informations sur l'expéditeur</h6>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nom de l'expediteur</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="sender_name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Adress de l'expediteur</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="sender_address">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contact de l'expediteur</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="sender_contact">
                    </div>
                    

            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Informations sur le Destinataire</h6>
            <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nom de l'expediteur</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="recipient_name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Adress de l'expediteur</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="recipient_address">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contact de l'expediteur</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="recipient_contact">
                    </div>
        </div>
        </div>
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Informations sur la Command</h6>
            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Prix de la commande</th>
                                        <th scope="col">Poids de la commande</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Prix" name="price"><span class="input-group-text" id="basic-addon2">DH</span></th>
                                        <td><input type="text" class="form-control" placeholder="Poids" name="weight"><span class="input-group-text" id="basic-addon2">Kg</span></th>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><button type="submit" name="Ajouter" class="btn btn-primary"> Ajouter</button></td>
                                    </tr>
                                </tbody>
                            </table>
            </div>
        </div>
</form>
</div>
</div>