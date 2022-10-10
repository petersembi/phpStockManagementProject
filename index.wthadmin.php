<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Hey! Welcome</h1>
<?php
require 'dbh.php';
 
 //function check stock and notification status, display on front end. This function can be called anytime we want to check the stock status. 
// function checkStockNotStatus ($conn) {
// 	$sql = "SELECT * FROM mainbks WHERE bk_title='Finally Alive';";

// $result = mysqli_query($conn, $sql);
// $rows = mysqli_num_rows($result);
 
//  if ($rows>0) {
 	
//  	while ($fetchResult = mysqli_fetch_assoc( $result)) {
//  		$currentStockBfTrans=$fetchResult['bks_Instock'];
//  		$adminNotStatus=$fetchResult['admin_notified'];

//  		// echo $currentStock;
//  		// echo "<br>";
//  		// echo $adminNotStatus;
//  	}
 

// }

//  return  array($currentStockBfTrans,$adminNotStatus);
// }
// checkStockNotStatus ($conn);
// $statusArray= checkStockNotStatus ($conn);
// $added_Stock=200;
// $currentStockBfTrans = $statusArray[0];
// $adminStatus = $statusArray[1];
// echo "current stock before transactions: ".$currentStockBfTrans;
//function addStock: adds stock and updates database
function addStock($conn,$added_Stock,$currentStockBfTrans) {
	$sql = "UPDATE mainbks SET admin_notified=0, bks_Instock=$added_Stock + $currentStockBfTrans WHERE bk_title='Finally Alive';";
	mysqli_query($conn,$sql);
//.$currentStock + $added_Stock.
$sql = "SELECT * FROM mainbks WHERE bk_title='Finally Alive';";

$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
 
 if ($rows>0) {
 	
 	while ($fetchResult = mysqli_fetch_assoc( $result)) {
 		$currentStockBfTrans=$fetchResult['bks_Instock'];
 		$adminNotStatus=$fetchResult['admin_notified'];

 		// echo $currentStock;
 		// echo "<br>";
 		// echo $adminNotStatus;
 	}
 } 

 return  array($currentStockBfTrans,$adminNotStatus);

}
//  $statusArray= addStock($conn,$added_Stock,$currentStockBfTrans);
// $added_Stock=2000;
// $currentStockAftAdd = $statusArray[0];
// $adminStatus = $statusArray[1];
// echo "<br>";
// echo "Admin notified: ". $adminStatus ."<br>";
// echo "Current stock after adding stock: ".$currentStockAftAdd."<br>";
// echo "Admin notified: ".$adminStatus;

//function for reducing stock;

// function subtractStock($conn,$subtracted_Stock,$currentStockAftAdd) {
// 	$sql = "UPDATE mainbks SET  bks_Instock=$currentStockAftAdd - $subtracted_Stock   WHERE bk_title='Finally Alive';";
// 	mysqli_query($conn,$sql);
// //.$currentStock + $added_Stock.
// $sql = "SELECT * FROM mainbks WHERE bk_title='Finally Alive';";

// $result = mysqli_query($conn, $sql);
// $rows = mysqli_num_rows($result);
 
//  if ($rows>0) {
 	
//  	while ($fetchResult = mysqli_fetch_assoc( $result)) {
//  		$currentStockAftAdd=$fetchResult['bks_Instock'];
//  		$adminNotStatus=$fetchResult['admin_notified'];

//  		// echo $currentStock;
//  		// echo "<br>";
//  		// echo $adminNotStatus;
//  	}
//  }
//  //echo $adminNotStatus;
//  if ($currentStockAftAdd<30 && $adminNotStatus==0) {

// 	echo "stock less than 30. Admin not yet notified.<br>";
// 	echo "Admin is being notified...!<br>";
// //mail fun
// 	$sql = "UPDATE mainbks SET admin_notified=1 WHERE bk_title='Finally Alive';";

// 	if (!mysqli_query($conn,$sql)) {
// 		echo mysqli_error();
// 	}
// 			$sql = "SELECT * FROM mainbks WHERE bk_title='Finally Alive';";

// 		$result = mysqli_query($conn, $sql);
// 		$rows = mysqli_num_rows($result);
		 
// 		 if ($rows>0) {
		 	
// 		 	while ($fetchResult = mysqli_fetch_assoc( $result)) {
// 		 		$currentStockAftAdd=$fetchResult['bks_Instock'];
// 		 		$adminNotStatus=$fetchResult['admin_notified'];

// 		 		// echo $currentStock;
// 		 		// echo "<br>";
// 		 		// echo $adminNotStatus;
// 		 	}
// 		 }
// 	//mysqli_query($conn,$sql);


// 	echo $adminNotStatus;
// 	echo "Admin notified!<br>";
// 	$sql = "SELECT * FROM mainbks WHERE bk_title='Finally Alive';";

// $result = mysqli_query($conn, $sql);
// $rows = mysqli_num_rows($result);
 
//  if ($rows>0) {
 	
//  	while ($fetchResult = mysqli_fetch_assoc( $result)) {
//  		$currentStockAftAdd=$fetchResult['bks_Instock'];
//  		$adminNotStatus=$fetchResult['admin_notified'];

//  		// echo $currentStock;
//  		// echo "<br>";
//  		// echo $adminNotStatus;
//  	}
//  }

// } elseif ($currentStockAftAdd<30 && $adminNotStatus==1) {
// 	echo "Stock less than 30. Admin already notified!";
// }
 
// $sql = "SELECT * FROM mainbks WHERE bk_title='Finally Alive';";

// $result = mysqli_query($conn, $sql);
// $rows = mysqli_num_rows($result);
 
//  if ($rows>0) {
 	
//  	while ($fetchResult = mysqli_fetch_assoc( $result)) {
//  		$currentStockAftAdd=$fetchResult['bks_Instock'];
//  		$adminNotStatus=$fetchResult['admin_notified'];

//  		// echo $currentStock;
//  		// echo "<br>";
//  		// echo $adminNotStatus;
//  	}
//  }
//  return  array($currentStockAftAdd,$adminNotStatus);

// }
// // $subtracted_Stock = 8;
// $statusArray= subtractStock($conn,$subtracted_Stock,$currentStockAftAdd);

// $currentStockAftAdd = $statusArray[0];
// $adminStatus = $statusArray[1];
// echo "<br>";
// echo "Admin notified: ". $adminStatus ."<br>";
// echo "Current stock after substracting stock: ".$currentStockAftAdd."<br>";
// echo "Admin notified: ".$adminStatus;


?>
<form action="index.wthadmin.php" method="post">
	<button name="status_btn">Check Status</button>
</form>
<?php

if (isset( $_POST['status_btn'])) {
//$bksToBuy =  $_POST['copiesToBuy'].value;
//$bksToBuy = $_POST['copiesToBuy'];
//subtractStock($conn,$bksToBuy,$currentStockAftAdd) ;
$statusArray= checkStockNotStatus ($conn);

$currentStockAftAdd = $statusArray[0];
echo "current stock ".$currentStockAftAdd."<br>";
}

?>
<br>
<br>
<form  action="index.wthadmin.php" method="post">
	<input type="text" name="copiesToBuy" placeholder="Enter Copies to buy">

	<button name="booksToBuy_btn">Buy Books</button>
</form>
<?php

if (isset( $_POST['booksToBuy_btn'])) {
//$bksToBuy =  $_POST['copiesToBuy'].value;
$bksToBuy = $_POST['copiesToBuy'];
$statusArray= checkStockNotStatus ($conn);

$currentStockAftAdd = $statusArray[0];
//subtractStock($conn,$bksToBuy,$currentStockAftAdd) ;
$statusArray= subtractStock($conn,$bksToBuy,$currentStockAftAdd);

$currentStockAftAdd = $statusArray[0];
echo "current stock after buying: ".$currentStockAftAdd."<br>";

$statusArray= checkStockNotStatus ($conn);

$currentStockAftAdd = $statusArray[0];
}

?>
<br>
<br>
<form  action="index.wthadmin.php" method="post">
	<input type="text" name="copiesToAdd" placeholder="Enter Copies to add">
	<button name="stocktoadd_btn">Add Stock</button>
</form>
<?php

if (isset($_POST['stocktoadd_btn'])) {
//$bksToBuy =  $_POST['copiesToBuy'].value;
$bksToAdd = $_POST['copiesToAdd'];
//$statusArray= checkStockNotStatus ($conn);

$currentStockAftAdd = $statusArray[0];
//subtractStock($conn,$bksToBuy,$currentStockAftAdd) ;
//subtractStock($conn,$bksToBuy,$currentStockAftAdd);
$statusArray = addStock($conn,$bksToAdd,$currentStockAftAdd);

$currentStockAftAdd = $statusArray[0];
echo "current stock after adding stock: ".$currentStockAftAdd."<br><br>";
}

$statusArray= checkStockNotStatus ($conn);

$currentStockAftAdd = $statusArray[0];
?>
<br>
<br>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
	
$(document).ready(function(){

   $.get('checkstock.php', function(data){
    alert("Data: " + data );
    console.log(JSON.stingify(data));
  });

});
</script>

</body>
</html>