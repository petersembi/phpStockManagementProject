
<?php
require 'dbh.php';


function subtractStock($conn,$subtracted_Stock,$currentStockAftAdd) {
	$sql = "UPDATE mainbks SET  bks_Instock=$currentStockAftAdd - $subtracted_Stock   WHERE bk_title='Finally Alive';";
	mysqli_query($conn,$sql);
//.$currentStock + $added_Stock.
$sql = "SELECT * FROM mainbks WHERE bk_title='Finally Alive';";

$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
 
 if ($rows>0) {
 	
 	while ($fetchResult = mysqli_fetch_assoc( $result)) {
 		$currentStockAftAdd=$fetchResult['bks_Instock'];
 		$adminNotStatus=$fetchResult['admin_notified'];

 		// echo $currentStock;
 		// echo "<br>";
 		// echo $adminNotStatus;
 	}
 }
 //echo $adminNotStatus;
 if ($currentStockAftAdd<30 && $adminNotStatus==0) {

	echo "stock less than 30. Admin not yet notified.<br>";
	echo "Admin is being notified...!<br>";
//mail fun
	$sql = "UPDATE mainbks SET admin_notified=1 WHERE bk_title='Finally Alive';";

	if (!mysqli_query($conn,$sql)) {
		echo mysqli_error();
	}
			$sql = "SELECT * FROM mainbks WHERE bk_title='Finally Alive';";

		$result = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($result);
		 
		 if ($rows>0) {
		 	
		 	while ($fetchResult = mysqli_fetch_assoc( $result)) {
		 		$currentStockAftAdd=$fetchResult['bks_Instock'];
		 		$adminNotStatus=$fetchResult['admin_notified'];

		 		// echo $currentStock;
		 		// echo "<br>";
		 		// echo $adminNotStatus;
		 	}
		 }
	//mysqli_query($conn,$sql);


	echo $adminNotStatus;
	echo "Admin notified!<br>";
	$sql = "SELECT * FROM mainbks WHERE bk_title='Finally Alive';";

$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
 
 if ($rows>0) {
 	
 	while ($fetchResult = mysqli_fetch_assoc( $result)) {
 		$currentStockAftAdd=$fetchResult['bks_Instock'];
 		$adminNotStatus=$fetchResult['admin_notified'];

 		// echo $currentStock;
 		// echo "<br>";
 		// echo $adminNotStatus;
 	}
 }

} elseif ($currentStockAftAdd<30 && $adminNotStatus==1) {
	echo "Stock less than 30. Admin already notified!";
}
 
$sql = "SELECT * FROM mainbks WHERE bk_title='Finally Alive';";

$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
 
 if ($rows>0) {
 	
 	while ($fetchResult = mysqli_fetch_assoc( $result)) {
 		$currentStockAftAdd=$fetchResult['bks_Instock'];
 		$adminNotStatus=$fetchResult['admin_notified'];

 		// echo $currentStock;
 		// echo "<br>";
 		// echo $adminNotStatus;
 	}
 }
 return  array($currentStockAftAdd,$adminNotStatus);

}
// $subtracted_S