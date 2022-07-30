<?php

require_once('./fpdf/fpdf.php');
include 'Functions.php';
$conn = connect_db();
$date = date("Y/m/d h:m");
$qry = $conn->query("SELECT * FROM `Order` where reference_number = ".$_POST['ref'])->fetchAll(PDO::FETCH_ASSOC);
foreach($qry as $k => $v){
    foreach ($v as $key => $value){
        $$key = $value;
    }
}
//Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
$pdf = new FPDF('P', 'mm', 'A4');

//Ajouter une nouvelle page
$pdf->AddPage();

// entete
// $pdf->Image('en-tete.png', 10, 5, 130, 20);

// Saut de ligne
$pdf->Ln(4);


// Police Arial gras 16
$pdf->SetFont('Arial', 'B', 16);

// Titre
$pdf->Cell(0, 10, 'Lams Goods Express Delivery', 'TB', 1, 'C');

// Saut de ligne
$pdf->Ln(1);

// Début en police Arial normale taille 10

$pdf->SetFont('Courier', 'B', 12);
$h = 7;
$pdf->Cell(0, 10, 'Expediteur: '.$sender_name.'                      Date: '.$date, 'B', 1, 'L');

// $pdf->Cell(0, 10, 'Date :', 'TB', 1, 'C');

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', 'BIU');
$pdf->Write($h, "\n");

//Ecriture normal
$pdf->SetFont('Courier', 'B', 12);

$pdf->Write(10,  "Nom et Prenom :\t\t\t\t\t");
$pdf->SetX(60);
$pdf->SetFont('Courier', '', 12);
$pdf->Write(10,  "$recipient_name \n");
$pdf->SetFont('Courier', 'B', 12);
$pdf->Write(10,  "Adresse :\t\t\t\t\t");
$pdf->SetX(60);
$pdf->SetFont('Courier', '', 12);
$pdf->Write(10,  "$recipient_address \n");
$pdf->SetFont('Courier', 'B', 12);
$pdf->Write(10,  "Contact :\t\t\t\t\t");
$pdf->SetX(60);
$pdf->SetFont('Courier', '', 12);
$pdf->Write(10,  "$recipient_contact \n");
$pdf->Cell(0, 10, '', 'B', 1, 'L');
$pdf->SetFont('Courier', 'B', 12);
$pdf->Write(10,  "Reference :\t\t\t\t\t");
$pdf->SetX(60);
$pdf->SetFont('Courier', '', 12);
$pdf->Write(10,  "$reference_number\n");
$pdf->SetFont('Courier', 'B', 12);
$pdf->Write(10,  "Prix :");
$pdf->SetX(60);
$pdf->SetFont('Courier', '', 12);
$pdf->Write(10,  "$price DH\n");
$pdf->Cell(0, 10, '', 'B', 1, 'L');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Write(7,  "Lams Goods \nDelivery Express");
$pdf->SetX(60);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Write(2,  "Site Web : ");
$pdf->SetFont('Arial', '', 12);
$pdf->Write(2,  "www.LamsGoods.ma");



$pdf->SetX(140);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Write(2,  "Contact : ");
$pdf->SetFont('Arial', '', 12);
$pdf->Write(2,  "+212612-705454");





//Afficher le pdf
$pdf->Output('', '', true);
?>
?>