<?php
/**********************************************
 *       remove_produkt.php
 *       Tar bort produkt från kundvagnen
 *       
 **********************************************/

// starta session 
session_start();
 
// Samla in GET id
$id = isset($_GET['id']) ? $_GET['id'] : "";

if(array_key_exists($id, $_SESSION['KUNDVAGN'])){
	
	// Ta bort produkten från kundvagnen
	unset($_SESSION['KUNDVAGN'][$id]);
	$_SESSION['INFO']="Produkten har tagits bort från kundvagnen";
	$_SESSION['INFOCAT']="alert-info";
}

// Skicka tillbaka till kundvagnen
header('Location: kundvagn.php');
	
?>	

 <?php
    

    require_once ("header.php");
    require_once ("databas.php");

 if(isset($_GET['id'])){

$id = $_GET['id'];


echo "<h2>Ta bort</h2>";

$sql = "DELETE FROM Contactform WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$rowCount = $stmt->rowCount();

$message = "<div class='alert alert-danger' role='alert'>
                <p>$rowCount Meddelande har raderats!</p>
            </div>";  

           echo $message;
           

        }     

?>
<a href="index.php"><button>Till huvudmeny</button></a>
