
    <?php


       if ($_SERVER ["REQUEST_METHOD"]== "POST"){
        ​require_once ("db.php"); 
        
        
        
            $customername = htmlspecialchars(filter_var($_POST['customername'], FILTER_SANITIZE_STRING));
            $phone = htmlspecialchars(filter_var($_POST['phone'], FILTER_SANITIZE_STRING));
            $mail = htmlspecialchars(filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL));
            $adress = htmlspecialchars(filter_var($_POST['adress'], FILTER_SANITIZE_STRING));
            $id = htmlspecialchars($_POST['product_id']);
        
        }
           
      
            $stmt = $conn->prepare("INSERT INTO 
            customer (customername, mail, phone, adress) 
            VALUE (:customername, :mail, :phone, :adress)");
        
         $stmt->bindParam(':customername', $customername);
         $stmt->bindParam(':phone', $phone);
         $stmt->bindParam(':mail', $mail);
         $stmt->bindParam(':adress', $adress);
         $stmt->execute();    
        
         $stmt = $conn->prepare("SELECT ID FROM customer WHERE mail = '$mail'");
          $stmt->execute();
         $customer = $stmt->fetch();
         $customerid = $customer[0];
        
          $stmt = $conn->prepare("SELECT ID FROM products WHERE ID = '$id'");
          $stmt->execute();
          $id = $stmt->fetch();
            $product_id = $id[0];
        
            $stmt = $conn->prepare("INSERT INTO orders (customer_id, product_id) VALUE
            (:customer_id, :product_id)");
        
         $stmt->bindParam(':customer_id', $customer_id);
         $stmt->bindParam(':product_id', $product_id);
           
         $stmt->execute();
           $lastorder = $conn->lastInsertId();


       