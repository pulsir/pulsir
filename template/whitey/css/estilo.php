<?php

class estilo {


	function put_together($file){
		$temp_file = file_get_contents($file);
		$no = substr_count($temp_file, '[[include: ');
		//echo 'no:'.$no;
		for($i=0;$i<$no;$i++){
			$location_include = strpos($temp_file, '[[include: ');
			//echo 'lo: '.$location_include;
			$value = substr($temp_file, $location_include+strlen('[[include: '));
			//echo 'va: '.$value.'<br>';
			$where = strlen($value) - strpos($value, ']]');
			$file_to_include = substr($value, 0, -$where);
			//echo 'fi: '.$file_to_include.'<br>';
			$line = '[[include: '.$file_to_include.']]';
			$included = $this->put_together($file_to_include);
			$temp_file = str_replace($line, $included, $temp_file);
		}
		$varno = substr_count($temp_file, '[[var: ');
		for($i=0;$i<$varno;$i++){
			$location_include = strpos($temp_file, '[[var: ');
			$value = substr($temp_file, $location_include+strlen('[[var: '));
			$where = strlen($value) - strpos($value, ']]');
			$variable_to_include = substr($value, 0, -$where);
			$line = '[[var: '.$variable_to_include.']]';
			$included = $this->get_variable($variable_to_include);
			$temp_file = str_replace($line, $included, $temp_file);
		}
		return $temp_file;
	}

	 function get_variable($property) {
    	$fcont = file_get_contents('variables.elcss');
    	$loc_property = strpos($fcont, $property);
    	$propval = substr($fcont, $loc_property);
   		$loc_endline = strpos($propval, ';');
    	$propertyline = substr($propval, 0, $loc_endline);
    	$pnv = $property.': ';
    	$strip = strlen($pnv);
    	$propertyvalue = substr($propertyline, $strip);
    	return $propertyvalue;
 	 }

  	function minify($file){
  		//this function is based on code by Manas Tungare, http://manas.tungare.name/software/css-compression-in-php/
  		$file = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $file);
  		$file = str_replace(': ', ':', $file);
  		$file = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $file);
  		return $file;
  	}

}