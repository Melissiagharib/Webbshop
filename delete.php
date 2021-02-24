<?php
    

    require_once ("header.php");
    require_once ("db.php");

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