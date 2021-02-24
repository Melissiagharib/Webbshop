<?php
/**********************************************
 *       show-products.php
 *       Skriptet visar alla produkter 
 *       i en Bootstrap-grid
 **********************************************/

 
// Logga in i databasen
require_once 'db.php';

// Skapa en SQL-sats
// Hämta alla gåvor från tabellen produkter
$stmt = $conn->prepare("SELECT * FROM products");

// Kör SQL
$stmt->execute();

// Starta en Bootstrap rad
echo "<div class='row'>";

// Iterera över resultatet med en while
// Lagra varje rad i $row

while($row = $stmt->fetch(PDO::FETCH_ASSOC))  {
//echo  "<pre>"; 
//print_r ($row); 
//echo  "</pre>"; 
// Hämta data från varje rad i tabellen
$id        = $row['id'];
$productname     = $row['productname'];
$price  = $row['price'];
$description = $row['description'];
$instock = $row [ 'instock' ];
$picturelink  = $row['picturelink'];


?>


<div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
<div class="card m-1">
<img class="card-img-top" src="images/<?php echo $picturelink; ?>">
  <div class="card-body">
    <h4 class="card-title"><?php echo $productname; ?></h4>
    <p class="card-text">
  Pris: <?php echo $price; ?><br>
  <?php echo $description; ?>  <a href="=<?php //echo $id ?>"></a>
    </p>

<?php
$kundvagn = isset($_SESSION['KUNDVAGN']) ? $_SESSION['KUNDVAGN'] : "";
if(array_key_exists($id, $kundvagn)){
	$antal=$_SESSION['KUNDVAGN'][$id]['antal']; ?>
	    <a href="add_product.php?id=<?php echo $id ?>&antal=1&wherefrom=index" 
       class="btn btn-outline-info">
       LÄGG TILL EN (<?php echo $antal; ?>)
    </a>
<?php } else { ?>
	    <a href="add_product.php?id=<?php echo $id ?>&antal=1&wherefrom=index" 
       class="btn btn-outline-info">
       LÄGG TILL I KUNDVAGN
    </a>	
<?php } ?>	
	
  </div>
</div>

<!-- Avsluta kolumnen -->
</div>
<?php 

// Avsluta while
} 

// Avsluta Bootstrap raden 
echo '</div>';