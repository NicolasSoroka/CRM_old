<?php
$test = array();
$ej1 = array(1,1,1,1);
$ej2 = array(2,2,2,2);
$ej3 = array(3,3,3,3);

array_push($test, $ej1);
array_push($test, $ej2);
array_push($test, $ej3);
array_splice($test, 0, 1); 

?>