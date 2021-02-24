<?php
/**********************************************
 *       index.php
 *       startsida
 *       
 **********************************************/

 // Starta en session
session_start();
 
// Hämta sidhuvud
require_once 'header.php';

// Visa alla produkter
require_once 'products.php';


// Hämta sidfot
require_once 'footer.php';

