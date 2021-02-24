<?php
/**********************************************
 *       add_product.php
 *       Lägger till produkt i kundvagnen
 *       
 **********************************************/

// starta session 
session_start();
 
// Samla in GET
$id = isset($_GET['id']) ? $_GET['id'] : "";
$antal = isset($_GET['antal']) ? $_GET['antal'] : 1;
$wherefrom = isset($_GET['wherefrom']) ? $_GET['wherefrom'] : "index";
 
// Lägg till antal i Arrayen
$kundvagn_item=array(
    'antal'=>$antal
);
 
// Kontrollera om sessionen 'KUNDVAGN' redan finns
if(!isset($_SESSION['KUNDVAGN'])){
    $_SESSION['KUNDVAGN'] = array();
}
 
// Kontrollera om produkten redan finns i kundvagnen
// Uppdatera då antalet istället
if(array_key_exists($id, $_SESSION['KUNDVAGN'])){
	$ExistAntal=$_SESSION['KUNDVAGN'][$id]['antal'];
	$NewAntal=$antal + $ExistAntal;
	$_SESSION['KUNDVAGN'][$id]['antal']=$NewAntal;
	
	// Ta bort produkten från kundvagnen
	unset($_SESSION['KUNDVAGN'][$id]);
 
	// add the item with updated quantity
	$_SESSION['KUNDVAGN'][$id]=array(
    'antal'=>$NewAntal
	);	
	
	// Sätt info-texten
	$_SESSION['INFO']="Kundvagnen har uppdaterats med önskad produkt";
	
	// Skicka tillbaka till samma sida som de kom ifrån
    if ($wherefrom == "index") {header('Location: index.php'); }
	if ($wherefrom == "produkt") {header('Location: order_form.php?id=' . $id); }
}
 
// Om produkten inte finns i kundvagnen så lägg till den
else{
	
    $_SESSION['KUNDVAGN'][$id]=$kundvagn_item;
 
 	// Sätt info-texten
	$_SESSION['INFO']="Kundvagnen har uppdaterats med önskad produkt";
 
 	// Skicka tillbaka till samma sida som de kom ifrån
    if ($wherefrom == "index") {header('Location: index.php'); }
	if ($wherefrom == "product") {header('Location: order_form.php?id=' . $id); }
}
?>