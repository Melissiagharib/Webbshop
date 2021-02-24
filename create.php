<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once ("db.php");
   
    $Name = filter_var($_POST['Name'],FILTER_SANITIZE_STRING); 
    $Email = filter_var($_POST['Email'],FILTER_SANITIZE_EMAIL); 
    $Message = filter_var( $_POST['Message'],FILTER_SANITIZE_STRING);
}
   


     if(empty($Name)){ 

        $message = "<div class'alert alert warning' role = 'warning'>
        <p>   </p>
           </div>";   
       }
  
   else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {

        $message = "<div class'alert alert warning' role = 'warning'>
        <p> Skriv in ett gilitig Epost  </p>
           </div>";   
        } else { 

            $stmt = $conn->prepare("INSERT INTO Contactform (Name, Email, Message )
            VALUES (:Name , :Email , :Message)");

    $stmt->bindParam(':Name', $Name);
    $stmt->bindParam(':Email', $Email );
    $stmt->bindParam(':Message', $Message);

  
    $stmt->execute();


    $last_id = $conn->lastInsertId();

    $message = "<div  class='alert alert-danger' role='alert'>
                    <p>$Name tack för ditt meddelande =$last_id</p>
                </div>";  
                
              
}

if(isset($message)) echo $message;

