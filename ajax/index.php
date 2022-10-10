<!DOCTYPE html>
<html>
<head>
	<title>Display database data on click</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!script type="text/javascript" src="jquery.js"><!/script>


</head>
<body>

	<h1 class="heading">Admin page</h1>
<div class="controlbtns" id="checkstck">Check Stock</div>
<div class="controlbtns">generate report</div>
<div class="controlbtns">check balances</div>
<div class="controlbtns">check orders</div>
<div class="controlbtns">check burning orders</div>
<div class="controlbtns">Check current programs</div>
<div class="controlbtns">Check books</div>


<h2 id="messagedisplay"></h2>
<div id="displaydata">
	
</div>
<?php require('main.js'); ?>
<script type="text/javascript">
	
</script>
</body>
</html>