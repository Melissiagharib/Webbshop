<?php
/**********************************************
 *       kundvagn.php
 *       Visar innehållet i kundvagnen
 *       
 **********************************************/

 // Starta en session
 session_start();
 
// Hämta sidhuvud
require_once 'header.php';

// Visa alla produkter i kundvagnen

if(count($_SESSION['KUNDVAGN'])>0){
	
	// Logga in i databasen
	require_once 'db.php';
	

	// Skapa en SQL-sats
	// Hämta alla  från tabellen produkter
	$stmt = $conn->prepare("SELECT * FROM products");

	// Kör SQL
	$stmt->execute();

	// Starta en Bootstrap rad
	echo "<div class='container'>";
	
	// Initiera en totalsumma på ordern
	$totalSumma	= 0;
	$orderArray = 0;
	$antal = 0;
	$order = "";
    $order = array();

	
	?>
				<div class="row">
				<div class="col-md-3"><h4>Produkt</h4></div>
				<div class="col-md-3"><h4>Pris</h4></div>
				<div class="col-md-3"><h4>Belopp</h4></div>	
				<div class="col-md-3"><h4>Ändra</h4></a></div>
			  </div>
			  <?php
	// Iterera alla produkter i databasen med while
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	
		// Lagra datat i variabler
		$id			= $row['id'];
		$productname = $row['productname'];
		$price 		= $row['price'];

		// Visa endast de produkter som finns i kundvagnen
		if(array_key_exists($id, $_SESSION['KUNDVAGN'])){
			
			// Skapa en sträng för möjlig order
			//$order = $order.$id.",".$antal.";";
			
			$quantity = $_SESSION['KUNDVAGN'][$id]['antal'];
			
			// Räkna ut summa på ordern
		//	$productsSumma = $price * $quantity;
		//	$quantitySumma = $quantitySumma + $productSumma;
?>
			  <div class="row">
				<div class="col-md-3"><?php echo $quantity ?> st <?php echo $productname ?></div>
				<div class="col-md-3"><?php echo $price ?> kr</div>
						
				<div class="col-md-3"><a href="remove_product.php?id=<?php echo $id ?>">Ta bort</a></div>
			  </div>
			  <?php
		}
	}
?>
			  <div class="row">
				<div class="col-md-3">&nbsp;</div>
				<div class="col-md-3"> </div>
				<div class="col-md-3"> </div>				
				<div class="col-md-3"> </div>
			  </div>
			  <div class="row">
				<div class="col-md-3"></div>

				
				</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-3"> </div>
				<div class="col-md-3"> </div>				
				<div class="col-md-3"> </div>
			  </div>
			</div>  
			<?php
	// OM det inte finns något i kundvagnen
} else {
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-warning'>";
            echo "Det finns inga produkter i din kundvagn";
        echo "</div>";
    echo "</div>";
}
?>

	
<form action="historik.php" method="post" class="row">
        <div class="col-md-6 form-group">
            <input name="customername" type="text" required
            class="form-control" placeholder="Namn">
        </div>        
        <div class="col-md-6 form-group">
            <input name="mail" type="email" required
            class="form-control" placeholder="Epost">
			</div> 
			<div class="col-md-6 form-group">
            <input name="phone" type="text" required
            class="form-control" placeholder="Nummer">
        </div>       
        <div class="col-md-12 form-group">
            <input name="adress" cols="30" rows="5" required
            class="form-control" placeholder="Adress">
        </div>
		<div class="col-md-12 form-group">
            <input name="product_id" value= "<?php echo $id ?>" 
           type="hidden">
        </div>
        <div class="col-md-4 form-group">
            <input type="submit" value="Skicka beställning"
            class="btn btn-success form-control">
            
        </div>
    </form>
	<?php
// Hämta sidfot
require_once 'footer.php';
?>


				


