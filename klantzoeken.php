<!DOCTYPE html>
<html>
<head>
    <title>Zoeken op klant ID</title>
</head>
<body>
    <h2>Zoeken op klant ID</h2>
    <form method="GET" action="klantzoeken.php">
        <input type="text" name="klantid" placeholder="Voer klant ID in">
        <input type="submit" value="Zoeken">
    </form>

    <?php
    if (isset($_GET['klantid'])) {
        $klantId = $_GET['klantid'];
        include_once 'classes/verkoop.php';
        $verkoop = new Verkoop();
        $result = $verkoop->searchCustomerById('klantid');

        if ($result) {
            echo "<h3>Klantgegevens:</h3>";
            echo "ID: " . $result['klantid'] . "<br>";
            echo "Naam: " . $result['klantnaam'] . "<br>";
            // Voeg hier andere velden toe die je wilt tonen
        } else {
            echo "Geen klant gevonden met het opgegeven ID.";
        }
    }
    ?>
</body>
</html>