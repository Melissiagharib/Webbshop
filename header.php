<?php
/**********************************************
 *       header.php
 *       Sidhuvud, inkluderas högst upp på alla 
 *       sidor som har en view (HTML-kod)
 **********************************************/

// Visa felmeddelanden vid development
// Ta bort dessa rader vid production
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
// include 'debug.php';
?>
<!doctype html>
<html lang="sv">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <title>Platinumcars</title>
</head>
  <body class="container">

 <?php
// starta session 
// session_start();
?> 
  
<div class="navtop">
                    </div>
                    <nav class="navbar navbar-dark bg-dark">
                    

            <!--Navbar 1-->
            <div class="nav1">
            <button type="button" class="btn btn-secondary"> 
                <li> <a class="meny" href="index.php">Hem<?php  ?></a> </li> </button>
                <li> <a class="meny" href="Kontakt.php">Kontakt<?php ?></a> </li> </button>
 
                <li> <a class="meny" href="kundvagn.php"> Kundvagn <? if(isset($_SESSION['KUNDVAGN'])){echo "(" . count($_SESSION['KUNDVAGN']) . ")";} ?></a> </li>
            </div>
            </nav>
            </button>
        </div>
        <div class="text-center">
<h1> Välkommen <BR> </h1>
<img src="./images/Bakgrund.jpg">
   <h4 class="rubrik">
   <BR> Här hittar du sveriges exklusiva bilar  <BR></h4>  </div>
    <?php
    // Om det finns ett meddelande i sessionen så visa här
	// Fördefinierade alerts via Bootstrap
	// https://www.w3schools.com/bootstrap/bootstrap_alerts.asp
	$alert = isset($_SESSION['INFOCAT']) ? $_SESSION['INFOCAT'] : "alert-info";
    if(isset($_SESSION['INFO'])){echo "<div class='alert ".$alert."'><strong>Info!</strong> " . $_SESSION['INFO'] . "</div>";unset($_SESSION['INFO']);} ?>

