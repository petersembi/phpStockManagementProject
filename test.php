<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<?php
require 'checkstock.php';

?>
<script type="text/javascript">
	
$(document).ready(function(){


   $.get('checkstock.php', function(data){
    

    alert(data);
    console.log(data);
     


  });

});
</script>
</body>
</html>