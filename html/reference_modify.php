<?php
	$num = $_GET["num"];
	$page = $_GET["page"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	$con = mysqli_connect("localhost", "docdo21", "dhckstjr1!", "docdo21");
	$sql = "update reference set subject ='$subject' , content='$content'";
	$sql .= " where num=$num";
	mysqli_query($con,$sql);
	mysqli_close($con);

	echo "
	<script>
		location.href = 'reference_list.php?page=$page';
	</script>
	";
?>