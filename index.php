<?php 
error_reporting(E_ALL); 

require_once 'vendor/autoload.php';
require_once 'classes/bmark.php';

$opts = getopt("c:n:u:");

// $cat = "BS4";
// $name = "headings (huge font, super small font, etc...)";
// $url = 'https://www.w3schools.in/bootstrap4/typography/';


$bmark = new Bmark($opts);
echo "Script Completed";
?>
