<script>
console.log("page working!");
	$(document).ready(function () {
		$('#checkstck').click(function (e) {
			e.preventDefault();
			$.ajax({
				method: "post",
				url: "checkstock.php",
				data: $('#displaydata').serialize(),
				dataType: "html",
				success: function (response) {
					$('#messagedisplay').html(response);
				}
				});
			
		})
	});

	</script>