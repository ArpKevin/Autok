<?php
if (!isset($_REQUEST['id'])) {
    header("Location: lista.php");
    exit();
}

require("kapcsolat.php");

if (isset($_POST['rendben'])) {
    $fajta = htmlspecialchars(trim($_POST['fajta']));
    $tipus = htmlspecialchars(trim($_POST['tipus']));
    $gyartas = htmlspecialchars(trim($_POST['gyartas']));
    $km = htmlspecialchars(trim($_POST['km']));
    $ara = htmlspecialchars(trim($_POST['ara']));

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
        // módosítás
        $id = (int)$_POST['id'];
        $sql = "UPDATE autok
            SET fajta = '{$fajta}', tipus = '{$tipus}', gyartas = '{$gyartas}', km = '{$km}', ara = '{$ara}'
            WHERE id = {$id}";
        mysqli_query($dbconn, $sql);
        header("Location: lista.php");
        exit();
    }
}

// űrlap előzetes kitöltése
$id = (int)$_GET['id'];
$sql = "SELECT *
    FROM autok
    WHERE id = {$id}
";
$eredmeny = mysqli_query($dbconn, $sql);
$sor = mysqli_fetch_assoc($eredmeny);
// var_dump($sor);
$fajta = $sor['fajta'];
$tipus = $sor['tipus'];
$gyartas = $sor['gyartas'];
$km = $sor['km'];
$ara = $sor['ara'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autó adatainak módosítása</title>
    <link rel="stylesheet" href="stilus.css">
</head>
<body>
    <div class="container">
        <h1>Autó adatainak módosítása</h1>
        <form action="" method="post">
            <!-- Hiba üzenetek a usernek -->
            <?php if (isset($kimenet)) print $kimenet; ?>
            <input type="hidden" name="id" value="<?php print $id ?>">
            <p>
                <label for="fajta">Fajta:</label>
                <input type="text" name="fajta" value="<?php print $fajta ?>">
            </p>
            <p>
                <label for="tipus">Típus:</label>
                <input type="text" name="tipus" value="<?php print $tipus ?>">
            </p>
            <p>
                <label for="gyartas">Gyártás:</label>
                <input type="text" name="gyartas" value="<?php print $gyartas ?>">
            </p>
            <p>
                <label for="km">KM:</label>
                <input type="text" name="km" value="<?php print $km ?>">
            </p>
            <p>
                <label for="ara">Ár:</label>
                <input type="text" name="ara" value="<?php print $ara ?>">
            </p>
            <input type="submit" value="Módosítás" name="rendben">
        </form>
        <p><a href="lista.php">Vissza a listához</a></p>
    </div>
</body>
</html>