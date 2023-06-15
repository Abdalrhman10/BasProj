<!DOCTYPE html>
<html>
<head>
    <title>deleten op Artikel ID</title>
</head>
<body>

<h2>deleten op Artikel ID</h2>
    <form method="POST" action="artikeldelet.php">
        <input type="text" name="artid" placeholder="Voer Artikel ID in">
        <input type="submit" value="submit">
    </form>

<?php 

if(isset($_POST["submit"])){
	include_once 'classes/artikel.php';
	

	$artikel = new Artikel;

	$artId = $_POST["artid"];
	

	$artikel->deleteArtikel($artId);
	echo '<script>alert("Artikel verwijderd")</script>';
	echo "<script> location.replace('index.php'); </script>";
}
?>

</body>
</html>