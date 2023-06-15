<!DOCTYPE html>
<html>
<head>
    <title>deleten op Leverancier ID</title>
</head>
<body>

<h2>deleten op Leverancier ID</h2>
    <form method="POST" action="leverancierdelet.php">
        <input type="text" name="levid" placeholder="Voer Leverancier ID in">
        <input type="submit" value="submit">
    </form>

<?php 

if(isset($_POST["submit"])){
	include 'classes/leverancier.php';
	

	$leverancier = new Leverancier();

	$levId = $_POST["levid"];
	

	$leverancier->deleteLeverancier($levId);
	echo '<script>alert("Leverancier verwijderd")</script>';
	echo "<script> location.replace('index.php'); </script>";
}
?>

</body>
</html>