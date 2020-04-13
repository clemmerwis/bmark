<?php 
error_reporting(E_ALL); 

require_once 'vendor/autoload.php';
require_once 'classes/bmark.php';

$opts = getopt("c:n:u:");


$bmark = new Bmark($opts);
print_r($bmark->get_bmark());
?>
