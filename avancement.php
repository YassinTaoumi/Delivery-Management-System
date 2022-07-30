<?php
$state = false;
$conn = connect_db();
if(isset($_POST['search'])){
    $state = true;
    $history = $conn->query("SELECT orderId,order_track.Date_created,order_track.Status FROM `Order` INNER JOIN `order_track` where id = orderId AND reference_number=".$_POST['ref']);
	$status_arr = array("En attente de validation d'admin","Affecte a un Livreur","En cours de livraison","Livre","Client injoignable","Annule");
  $data = $history->fetchAll(PDO::FETCH_ASSOC);       
}

?>
<style>

.container {
  width: 1100px;
  margin: 0 auto;
}

.progress-meter {
  padding: 0;
}

ol.progress-meter {
  padding-bottom: 9.5px;
  list-style-type: none;
}
ol.progress-meter li {
  display: inline-block;
  text-align: center;
  text-indent: -19px;
  height: 36px;
  width: 15%;
  font-size: 12px;
  border-bottom-width: 4px;
  border-bottom-style: solid;
}
ol.progress-meter li:before {
  position: relative;
  float: left;
  text-indent: 0;
  left: -webkit-calc(50% - 9.5px);
  left: -moz-calc(50% - 9.5px);
  left: -ms-calc(50% - 9.5px);
  left: -o-calc(50% - 9.5px);
  left: calc(50% - 9.5px);
}
ol.progress-meter li.done {
  font-size: 12px;
}
ol.progress-meter li.done:before {
  content: "\2713";
  height: 19px;
  width: 19px;
  line-height: 21.85px;
  bottom: -28.175px;
  border: none;
  border-radius: 19px;
}
ol.progress-meter li.todo {
  font-size: 12px;
}
ol.progress-meter li.todo:before {
  content: "\2B24";
  font-size: 17.1px;
  bottom: -26.95px;
  line-height: 18.05px;
}
ol.progress-meter li.done {
  color: white;
  border-bottom-color: yellowgreen;
}
ol.progress-meter li.done:before {
  color: white;
  background-color: yellowgreen;
}
ol.progress-meter li.todo {
  color: silver;
  border-bottom-color: silver;
}
ol.progress-meter li.todo:before {
  color: silver;
}

</style>
<div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
            <form method="POST" action="">
            <div class="input-group rounded">
            
  <input type="search" class="form-control rounded" placeholder="Entrer la reference de la commande" aria-label="Search" aria-describedby="search-addon" name="ref"/>
  <button class="input-group-text border-0" id="search-addon" name="search">
    <i class="fas fa-search"></i>
  </button>
</div>
</form>
</div>
</div>
<?php if ($state){ ?>
  <div class="container-fluid pt-4 px-4">
<div class="container">
  <ol class="progress-meter">
    <?php foreach($data as $k=>$v){
    $v['Date_created'] = date("M d, Y h:i A",strtotime($v['Date_created']));
    $v['Status'] = $status_arr[$v['Status']];
    echo"<li class=\"progress-point done\"><h6>".$v['Status']."</h6></li>";
  }?>
  <?php 
  for($i=count($data)+2;$i<6;$i++){
    echo"<li class=\"progress-point todo\"><h6>".$status_arr[$i]."</h6></li>";
  }
  ?>
  
  </ol>
  
</div>
  </div>
<?php } ?>