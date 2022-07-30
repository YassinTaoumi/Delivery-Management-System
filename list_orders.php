<?php
$conn = connect_db();
$result = $conn->query("Select * FROM `Order` order by date_created");
$data = $result->fetchAll(PDO::FETCH_ASSOC);


?>
<div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Tous Les commandes</h6>
            <table class="table table-dark"  id="list">
                                <thead>
                                    <tr>
                                        <th scope="col">Reference de la commande</th>
                                        <th scope="col">Nom de l'expéditeur</th>
                                        <th scope="col">Nom du recepteur</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data as $k=>$v){ ?>
                                        
                                        <tr>
                                        <td class="text-center"><strong><?php echo ucwords($v["reference_number"])?></strong></td>
                                        <td class="text-center"><strong><?php echo ucwords($v["sender_name"])?></strong></td>
                                        <td class="text-center"><strong><?php echo ucwords($v["recipient_name"])?></strong></td>
                                        <td class="text-center"><strong><?php echo ucwords($v["price"])."DH"?></strong></td>
                                        <td class="text-center">
                                        <?php 
							switch ($v['status']) {
								case '1':
									echo "<span class='btn btn-info rounded-pill m-2'> <strong>affecte a un livreur</strong></span>";
									break;
								case '3':
									echo "<span class='btn btn-success rounded-pill m-2'> <strong>Livré</strong></span>";
									break;
								case '4':
									echo "<span class='btn btn-warning rounded-pill m-2'> <strong>Client injoignable</strong></span>";
                  break;
                case '5':
                  echo "<span class='btn btn-danger rounded-pill m-2'> <strong>Annulee</strong></span>";
                  break;
                case '2':
                  echo "<span class='btn btn-light rounded-pill m-2'> <strong>En cours de livraison</strong></span>";
                  break;
								default:
                echo "<span class='btn btn-info rounded-pill m-2'> <strong>attente de validation</strong> </span>";
									
									break;
							}

							?>
                             </td>
                             <td >
                             <div class="btn-group">
                             <a href="index.php?page=view_order&id=<?php echo $v['id'] ?>" class="btn btn-info btn-flat ">
		                          <i class="fas fa-eye"></i>
                             </a>
		                        <a href="index.php?page=edit_order&id=<?php echo $v['id'] ?>" class="btn btn-primary btn-flat ">
		                          <i class="fas fa-edit"></i>
		                        </a>
                            <a href="index.php?page=delete_order&id=<?php echo $v['id'] ?>" class="btn btn-danger btn-flat">
                            <i class="fas fa-trash"></i></a>
	                      </div>
                             </td>

                                        </tr>

                                    
                                        
                                    <?php } ?>
                                </tbody>
                            </table>
            </div>
        </div>
       