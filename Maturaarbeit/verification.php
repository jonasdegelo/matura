<?php
$title="Willkommen";
include 'header.php';
include 'db.php';

if(isset($_SESSION['id'])){
	$username = $row['username'];
	$confirm_code = $row['confirm_code'];
	$confirm_link = "/includes/confirmed.inc.php?username=".$username."&code=".$confirm_code;
	//$confirm_link = "/includes/confirmed.inc.php?username=".$username."&code=".$confirm_code;

	echo $_SESSION['message'];
	echo "<p>Bestaetige deine E-Mail Adresse</p>";
	echo "<a href=".$confirm_link.">E-Mail Adresse bestätigen</a><br>";
}
?>


</body>
</html>
