<?php
$conn = connect_db();
$nbLivre = $conn->query("Select count(*) as nb from `Order` where Status = '3'")->fetch(PDO::FETCH_ASSOC)['nb'];
$waiting = $conn->query("Select count(*) as nb from `Order` where Status = '0'")->fetch(PDO::FETCH_ASSOC)['nb'];
$affected = $conn->query("Select count(*) as nb from `Order` where Status = '1'")->fetch(PDO::FETCH_ASSOC)['nb'];
$Annule = $conn->query("Select count(*) as nb from `Order` where Status = '5'")->fetch(PDO::FETCH_ASSOC)['nb'];
$nbLiv = $conn->query("Select count(*) as nb from `User` where Profile = '2'")->fetch(PDO::FETCH_ASSOC)['nb'];
$nbVen = $conn->query("Select count(*) as nb from `User` where Profile = '3'")->fetch(PDO::FETCH_ASSOC)['nb'];
echo <<<EOT
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Commandes Livrées</h6>
                            <div class="mn-2">
                            <button type="button" class="btn btn-secondary m-2">
                            <img src="./img/checked.png" alt="checked icon" height="200" width="200">
                            </button>
                            <button type="button" class="btn btn-secondary m-2">
                            <h1 class="display-2">$nbLivre</h1>
                            </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Commandes En attente de validation</h6>
                            <div class="mn-2">
                            <button type="button" class="btn btn-secondary m-2">
                            <img src="./img/stopwatch.png" alt="checked icon" height="200" width="200">
                            </button>
                            <button type="button" class="btn btn-secondary m-2">
                            <h1 class="display-2">$waiting</h1>
                            </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Commandes Affecter a un Livreur</h6>
                            <div class="mn-2">
                            <button type="button" class="btn btn-secondary m-2">
                            <img src="./img/add-contact.png" alt="checked icon" height="200" width="200">
                            </button>
                            <button type="button" class="btn btn-secondary m-2">
                            <h1 class="display-2">$affected</h1>
                            </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Commandes Annulees</h6>
                            <div class="mn-2">
                            <button type="button" class="btn btn-secondary m-2">
                            <img src="./img/multiply.png" alt="checked icon" height="200" width="200">
                            </button>
                            <button type="button" class="btn btn-secondary m-2">
                            <h1 class="display-2">$Annule</h1>
                            </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Nombres des Livreurs</h6>
                            <div class="mn-2">
                            <button type="button" class="btn btn-secondary m-2">
                            <img src="./img/delivery-man.png" alt="checked icon" height="200" width="200">
                            </button>
                            <button type="button" class="btn btn-secondary m-2">
                            <h1 class="display-2">$nbLiv</h1>
                            </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Nombres des Vendeurs</h6>
                            <div class="mn-2">
                            <button type="button" class="btn btn-secondary m-2">
                            <img src="./img/investor.png" alt="checked icon" height="200" width="200">
                            </button>
                            <button type="button" class="btn btn-secondary m-2">
                            <h1 class="display-2">$nbVen</h1>
                            </button>
                            </div>
                        </div>
                    </div>
                   
            </div>
            <!-- Other Elements End -->



EOT;

?>