

<?php








require __DIR__.'/vendor/autoload.php';

$test1 = "test" ;
$test2 = "test" ;
$test3 = "test" ;


$array = array('premier' => 'N° 1', 'deuxieme' => 'N° 2', 'troisieme' => 'N° 3');

foreach ($array as $key => $value)
    echo 'Cet élément a pour clé "' . $key . '" et pour valeur "' . $value . '"<br />';


$std = new stdClass()  ;
$std->testd = "fdfdhf" ;



$instane = new \Cli\nadir() ;
$instane->setName('nadir');

$instane->setName('nadiddddr');
