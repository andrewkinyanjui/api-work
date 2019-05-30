<?php

function con($test,$del){


	 $one= explode("|",$test);
	 	$names= preg_replace("/[^a-zA-Z]/", " ", $one[0]);
	 	#$names= explode("-",$one[0]);
	 	$hon = preg_replace("/[Engineer]/", "(Er.)", $names);
	 	$numero= preg_replace("/[,]/", " ", $one[1]);
	 	$tru= explode(",",$one[1]);
	 	$sum = $tru[0] + $tru[1] + $tru[2];
	 	$return = "$names "."$numero"." $sum ";

	 	echo $return;
} 


	echo con("Engeener-Wairuri-Kamau|20.00,15,6","|");



?>