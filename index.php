<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Hey! Welcome</h1>
<?php
require 'dbh.php';
 

//variables for books bought and added stock
$boughtBksFinallyAlive = 60;
$AddedBksFinallyAlive = 30;

//selection of Finally alive Book  details from the database.
$sql = "SELECT * FROM books WHERE bookTitle = 'Finally Alive';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

//fetch books in stock
if ($resultCheck>0) {
	while ( $row = mysqli_fetch_assoc($result )) {
		$currentStock = $row['inStock']; //
		
	}
}

//print out current stock
echo "Current Stock before Transactions: ". $currentStock;
echo "<br>";


//FUNCTIONS

//function for buying books; returns stock remaining after the purchase;
 function bksBoughtFinallyAlive($currentStock, $boughtBksFinallyAlive, $conn) {
		 $currentStock = $currentStock - $boughtBksFinallyAlive;
		  echo "<br>";
		 $sql = "UPDATE books SET bookTitle='Finally Alive', inStock =" .$currentStock ." WHERE  bookTitle = 'Finally Alive';";
		 $result = mysqli_query($conn, $sql);
		 
		  if (mysqli_query($conn,  $sql)) {
		 	echo "Record updated successfully!";
		 	echo "Current stock: ". $currentStock;
		 } else {
		 	echo "Error updating record: ". mysqli_error($conn);
		 }

 		return $currentStock;
 }

//function for adding stock. returns stock  after the stock addition
  function bksAddedFinallyAlive($newStock, $AddedBksFinallyAlive, $conn) {
		 $newStock = $newStock + $AddedBksFinallyAlive;
		  echo "<br>";
		 $sql = "UPDATE books SET bookTitle='Finally Alive', inStock =" .$newStock ." WHERE  bookTitle = 'Finally Alive';";
		 $result = mysqli_query($conn, $sql);
		 
		  if (mysqli_query($conn, $sql)) {
		 	echo "Record updated successfully!";
		 	echo "New stock: ". $newStock;
		 } else {
		 	echo "Error updating record: ". mysqli_error($conn);
		 }

		 return $newStock;
 
 }



 $newStock = bksBoughtFinallyAlive($currentStock, $boughtBksFinallyAlive,$conn);
   bksAddedFinallyAlive($newStock, $AddedBksFinallyAlive, $conn);






  //bksBoughtFinallyAlive($currentStock, $boughtBksFinallyAlive) ;

?>
</body>
</html>