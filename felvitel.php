<?php
if (isset($_POST['rendben'])) {
    $fajta = htmlspecialchars(trim($_POST['fajta']));
    $tipus = htmlspecialchars(trim($_POST['tipus']));
    $gyartas = htmlspecialchars(trim($_POST['gyartas']));
    $km = htmlspecialchars(trim($_POST['km']));
    $ara = htmlspecialchars(trim($_POST['ara']));

    $hibak = [];

    if (empty($fajta)) {
        $hibak[] = "Nem adott meg fajtát";
    }

    if (empty($tipus)) {
        $hibak[] = "Nem adott meg típust";
    }

    if (empty($gyartas) || !is_numeric($gyartas)) {
        $hibak[] = "Helytelen gyártási év";
    }

    if (empty($km) || !is_numeric($km)) {
        $hibak[] = "Helytelen kilométer érték";
    }

    if (empty($ara) || !is_numeric($ara)) {
        $hibak[] = "Helytelen ár";
    }

    if (isset($hibak)) {
        $kimenet = "<ul>";

        foreach ($hibak as $hiba) {
            $kimenet .= "<li>{$hiba}</li>";
        }

        $kimenet .= "</ul>";
    } else {
        require("kapcsolat.php");
        $sql = "INSERT INTO autok (fajta, tipus, gyartas, km, ara)
                VALUES ('{$fajta}', '{$tipus}', '{$gyartas}', '{$km}', '{$ara}')";
        mysqli_query($dbconn, $sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új autó felvitele</title>
    <link rel="stylesheet" href="stilus.css">
</head>
<body>
    <div class="container">
        <h1>Új autó felvitele</h1>
        <form action="" method="post">
            <!-- Hiba üzenetek a usernek -->
            <?php if (isset($kimenet)) print $kimenet; ?>
            <p>
                <label for="fajta">Fajta:</label>
                <input type="text" name="fajta">
            </p>
            <p>
                <label for="tipus">Típus:</label>
                <input type="text" name="tipus">
            </p>
            <p>
                <label for="gyartas">Gyártás:</label>
                <input type="text" name="gyartas">
            </p>
            <p>
                <label for="km">KM:</label>
                <input type="text" name="km">
            </p>
            <p>
                <label for="ara">Ár:</label>
                <input type="text" name="ara">
            </p>
            <input type="submit" value="Felvitel" name="rendben">
        </form>
        <p><a href="lista.php">Vissza a listához</a></p>
    </div>
</body>
</html>
