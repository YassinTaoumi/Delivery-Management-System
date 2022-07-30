<?php
$conn = connect_db();
$result = $conn->query("Select * FROM `User` where profile = ".$_GET['type']);
$data = $result->fetchAll(PDO::FETCH_ASSOC);


?>
<div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Tous Les Livreurs : </h6>
            <table class="table table-dark"  id="list">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom du Livreur</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Login</th>
                                        <th scope="col">Mot de pass</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data as $k=>$v){ ?>
                                        
                                        <tr>
                                        <td class="text-center"><strong><?php echo ucwords($v["FullName"])?></strong></td>
                                        <td class="text-center"><strong><?php echo ucwords($v["Addresse"])?></strong></td>
                                        <td class="text-center"><strong><?php echo ucwords($v["Username"])?></strong></td>
                                        <td class="text-center"><strong><?php echo ucwords(md5($v["password"]))?></strong></td>
                                        
							
                             <td >
                             <div class="btn-group">
		                        <a href="index.php?page=edit_User&id=<?php echo $v['UserId'] ?>&type=<?php echo $_GET['type'];?>" class="btn btn-primary btn-flat ">
		                          <i class="fas fa-edit"></i>
		                        </a>_
                            <a href="index.php?page=deleteUser&id=<?php echo $v['UserId'] ?>&type=<?php echo $_GET['type'];?>" class="btn btn-danger btn-flat">
                            <i class="fas fa-trash"></i></a>
	                      </div>
                             </td>
                            </tr>

                                    
                                        
                                    <?php } ?>
                                </tbody>
                            </table>
            </div>
        </div>
       