<?php 
require_once 'config.php';
require_once 'vendor/autoload.php';
$opts = getopt("c:n:u:");

$helper = new Sample();
$helper->log($helper->isIndex());
$helper->log(USERNAME);
eval(\Psy\sh());
$bmark = new Bmark($opts);
$helper->log("Script Completed");
?>
