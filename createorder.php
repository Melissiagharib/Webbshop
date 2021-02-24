<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once ("db.php");
   

 
    $customername = htmlspecialchars(filter_var($_POST['customername'], FILTER_SANITIZE_STRING));
    $phone = htmlspecialchars(filter_var($_POST['phone'], FILTER_SANITIZE_STRING));
    $mail = htmlspecialchars(filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL));
    $adress = htmlspecialchars(filter_var($_POST['adress'], FILTER_SANITIZE_STRING));
    $id = htmlspecialchars($_POST['product_id']);

}
   
$stmt = $conn->prepare("INSERT INTO Customer (customername, phone, mail, adress  )
VALUES (:customername,:phone, :mail , :adress)");




     if(empty($Name)){ 

     $message = "<div class'alert alert warning' role = 'warning'>
     <p> Skriv in ett gilitig namn  </p>
        </div>";   
    }
  


 $stmt->bindParam(':customername', $customername);
 $stmt->bindParam(':phone', $phone);
 $stmt->bindParam(':mail', $mail);
 $stmt->bindParam(':adress', $adress);
 $stmt->execute();    
  
    $stmt->execute();


    $last_id = $conn->lastInsertId();

    $message = "<div  class='alert alert-danger' role='alert'>
                    <p>$Name tack för ditt meddelande =$last_id</p>
                </div>";  
                
              


if(isset($message)) echo $message;

 