<?php 

// ****************************************************************************************
// Date: 06-03-2018
// Author: Ariel Alejandro Wagner
// 
// To convert CSV an script INSERT INTO statement. 
// ****************************************************************************************
// Fecha: 06-03-2018
// Autor: Ariel Alejandro Wagner
// 
// Archivo para convertir CSV a un estamento INSERT INTO de script.
// ****************************************************************************************

// ****************************************************************************************
// Function for convert CSV a file to INSERT INTO statemant. 
// Función para convertir un archivo CSV como un estamento INSERT INTO
// ****************************************************************************************
function readToFileCSV($file, $tablename) {
	 $fp = fopen($file, "r"); 
	 $r = 0; $crgw = ''; $rgw = '';
	 while (($regs = fgetcsv($fp, 1000, ";")) !== FALSE) {            
		$rg = '';     
		foreach($regs as $k => $v) {
			$rg .= "'".utf8_encode($v)."', ";
		}
		if ($r == 0) {	
			$rg = str_replace("'", "", $rg);
			$crgw = 'INSERT INTO '.$tablename.' '.'('.substr($rg, 0, (strlen($rg) - 2)).') VALUES ';
		} else { 
			$rgw .= '('.substr($rg, 0, (strlen($rg) - 2)).'), ';
		} 
		$r++;
	 }
	 fclose($fp); 
	 $result = $crgw . substr($rgw, 0, (strlen($rgw) - 2)); 
	 return $result.';';	 
}

// ****************************************************************************************
// $file = CSV file name and path. For example: C:\\xampp\\htdocs\\clients\\filename.csv
// $tablename = Name of the table of the INSERT INTO statement. 
// readToCSV() - The function used to convert the CSV file to INSERT INTO statement. 
// $var = readToCSV($file, $tablename);
// ****************************************************************************************
// $file = Ruta y nombre de archivo CSV. Por ejemplo: C:\\xampp\\htdocs\\clients\\filename.csv 
// $tablename = Name of the table of the INSERT INTO statement. 
// readToCSV() - The function used to convert the CSV file to INSERT INTO statement. 
// $var = readToCSV($file, $tablename);
// ****************************************************************************************
$file = 'C:\\xampp\\htdocs\\www\\garcia\\agenda\\agclientescom.csv'; 
$tablename = 'agclientescom';
$display = readToFileCSV($file, $tablename);

// ****************************************************************************************
// Show this convert. For example,  you can use tool 
// "copy & paste" and after, you can use in your 
// database management for execute this script. 
// ****************************************************************************************
// Show this convert. For example,  you can use tool 
// "copy & paste" and after, you can use in your 
// database management for execute this script. 
// ****************************************************************************************
echo $display;

// ****************************************************************************************

?>