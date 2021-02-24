<?php

 require_once ("db.php");
 require_once ("header.php");
 

 $stmt = $conn->prepare("SELECT * FROM Contactform");


 $stmt->execute();


 $result = $stmt->fetchAll();

 $table = "
    <table class='table table-hover'>
    <tr>
        <th>Namn</th>
        <th>Email</th>
        <th>Message</th>
        <th>Admin</th>
    </tr>
    ";
  
 foreach($result as $key => $value){


    $id = $value['id'];  

    $table .= "
        <tr>
            <td>$value[Name]</td>
            <td>$value[Email]</td>
            <td>$value[Message]</td>
            <td>
            <a href='delete.php?id=$value[id]'>Ta bort</a>
            <a href='deleteall.php?id=$value[id]'>Ta bort alla</a>
            </td>
        </tr>
    ";

 }
 $table .= "</table>";

 echo $table;

 require_once ("footer.php");
