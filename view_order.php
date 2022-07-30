<?php
$conn = connect_db();
$qry = $conn->query("SELECT * FROM `Order` where id = ".$_GET['id'])->fetchAll(PDO::FETCH_ASSOC);
foreach($qry as $k => $v){
    foreach ($v as $key => $value){
        $$key = $value;
    }
}

?>
<div class="container-fluid pt-4 px-4" id="main">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="callout callout-info">
				<form method="POST" action="testPdf.php">
				<input type="text" value="<?php echo $reference_number;?>"name="ref" hidden>
					<dl>
						<dt><h5>Reference de la commande:</h5></dt>
						<dd> <h4><b><?php echo $reference_number ?></b></h4></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div  class="p-2 mb-2 bg-info text-dark">
					<b class="border-bottom border-primary">Information de l'expéditeur</b>
					<dl>
						<dt>Nom:</dt>
						<dd><?php echo ucwords($sender_name) ?></dd>
						<dt>Adress:</dt>
						<dd><?php echo ucwords($sender_address) ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo ucwords($sender_contact) ?></dd>
                    </dl>
				</div>
				<div class="p-2 mb-2 bg-info text-dark">
					<b class="border-bottom border-primary">Information du recepteur</b>
					<dl>
						<dt>Nom:</dt>
						<dd><?php echo ucwords($recipient_name) ?></dd>
						<dt>Adress:</dt>
						<dd><?php echo ucwords($recipient_address) ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo ucwords($recipient_contact) ?></dd>
					</dl>
				</div>
			</div>
			<div class="col-md-6">
				<div class="p-2 mb-2 bg-info text-dark">
					<b class="border-bottom border-primary">Information de la commande :</b>
						<div class="row">
							
							<div class="col-sm-6">
								<dl>
									<dt>Poid:</dt>
									<dd><?php echo $weight ?></dd>
									<dt>Prix:</dt>
									<dd><?php echo number_format($price,2) ?></dd>
								</dl>	
							</div>
						</div>
					<dl>
						
						<dt>Statut de la commande:</dt>
						<dd>
							<?php 
							switch ($status) {
								
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
						echo "<span class='btn btn-dark rounded-pill m-2'> <strong>attente de validation</strong> </span>";
						
						break;
							}

							?>
							<?php if($_SESSION['Profile']==='1'){ ?>
							<a class="btn btn-success rounded-pill m-2" href="index.php?page=edit_Status&ref=<?php echo $reference_number ?>&id=<?php echo $id;?>"><i class="fa fa-edit"></i> Modifier le Statut de la commande</a></button>
								<?php } ?>
					</dl>
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer display p-0 m-0">
		<button type="submit" class="btn btn-primary w-100 m-2" id="print">Imprimer le recue de la commande</button>
</div>
</form>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
<noscript>
	<style>
		table.table{
			width:100%;
			border-collapse: collapse;
		}
		table.table tr,table.table th, table.table td{
			border:1px solid;
		}
		.text-cnter{
			text-align: center;
		}
	</style>
</noscript>

</script>