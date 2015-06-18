<?php 


function CalcDistance($Subject, $Original){
  for($i=0;$i<count($Original);$i++) {
  	for($j=0;$j<count($Original[$i]);$j++) {
  		$Sum += pow($Subject[$j]-$Original[$i][$j],2);
  	}
  	$Distance[$i] = sqrt($Sum);
  	$Sum = 0;
  }
  
  return $Distance;
}



?>