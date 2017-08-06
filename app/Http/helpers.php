<?php 


	function myfunction() {
		
	}

	function dayPercentile($month){

		$daysInmonths29 = array('02');
		$daysInmonths30 = array('04', '06', '09', '11');
		$daysInmonths31 = array('01', '03', '05', '07', '08', '10', '12');

	    if(in_array($month, $daysInmonths29)) {
	    	$percentile = 100/29;
	    } elseif (in_array($month, $daysInmonths30)) {
	    	$percentile = 100/30;
	    } elseif (in_array($month, $daysInmonths31)) {
	    	$percentile = 100/31;
	    }

	    return $percentile;
	}