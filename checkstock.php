<?php

require 'dbh.php';


function checkStockNotStatus ($conn) {
	$sql = "SELECT * FROM mainbks WHERE bk_title='Finally Alive';";


$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
 
 if ($rows>0) {
 	
 	while ($fetchResult = mysqli_fetch_assoc( $result)) {
 		$currentStockBfTrans=$fetchResult['bks_Instock'];
 		$adminNotStatus=$fetchResult['admin_notified'];


 		// echo $currentStockBfTrans;
 		// echo "<br>";
 		// echo $adminNotStatus;
 	}
 

}

 return  array("currentStock"=>$currentStockBfTrans, "adminStatus"=>$adminNotStatus);
}


checkStockNotStatus($conn);


