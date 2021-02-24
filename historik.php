

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once ("db.php");
   

 
    $customername = htmlspecialchars(filter_var($_POST['customername'], FILTER_SANITIZE_STRING));
    $phone = htmlspecialchars(filter_var($_POST['phone'], FILTER_SANITIZE_STRING));
    $mail = htmlspecialchars(filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL));
    $adress = htmlspecialchars(filter_var($_POST['adress'], FILTER_SANITIZE_STRING));
    $product_id = htmlspecialchars($_POST['product_id']);


  $stmt = $conn->prepare("INSERT INTO customer (customername, phone, mail, adress)
  VALUES (:customername, :phone, :mail,  :adress)");

  
 $stmt->bindParam(':customername', $customername);
 $stmt->bindParam(':phone', $phone);
 $stmt->bindParam(':mail', $mail);
 $stmt->bindParam(':adress', $adress);
 $stmt->execute();    
  
  
    $customer_id = $conn->lastInsertId();

	echo $customer_id;

	$stmt = $conn->prepare( "INSERT INTO orders (customer_id, product_id)
	VALUES (:customer_id, :product_id)");

 $stmt->bindParam(':customer_id', $customer_id);
 $stmt->bindParam(':product_id', $product_id);
 $stmt->execute(); 
}



	
	
 if(isset($customername , $phone , $adress , $mail)) echo "<b><h3>Tack för din beställning! Din order har skickats iväg. Ditt order nr är : $product_id</h3> 
    <br>
    Här får du en kopia på din beställning: <br>
    <br>
    Namn: $customername <br>
    Telefonnummer: $phone <br>
    Epostadress: $mail <br>
    Leveransadress: $adress";
?>
<?php

require_once 'footer.php';

?>

