<?php
	header('Content-Type: text/plain');

	require ('vendor/autoload.php');

	
try {

$company = new \Sunat\Sunat( true, true );

	//$numero = "10467942820";
	
	$ruc = ( isset($_REQUEST["nruc"]))? $_REQUEST["nruc"] : false;
	$search1 = $company->search( $ruc );
	
	echo $search1->json();

	
} catch (Exception $e) {

echo "Error: ".$e->getMessage();

	
}




	
?>
