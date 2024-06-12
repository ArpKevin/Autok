<?php
require("kapcsolat.php");

$kifejezes = isset($_POST['kifejezes']) ? mysqli_real_escape_string($dbconn, $_POST['kifejezes']) : "";
$sql = "SELECT * 
        FROM autok
        WHERE (
            fajta LIKE '%{$kifejezes}%'
            OR tipus LIKE '%{$kifejezes}%'
            OR gyartas LIKE '%{$kifejezes}%'
            OR km LIKE '%{$kifejezes}%'
            OR ara LIKE '%{$kifejezes}%'
        )";
$eredmeny = mysqli_query($dbconn, $sql);

$kimenet = "<table>
                <tr>
                    <th>Fajta</th>
                    <th>Tipus</th>
                    <th>Gyártás</th>
                    <th>KM</th>
                    <th>Ár</th>
                    <th>Művelet</th>
                </tr>";
while ($sor = mysqli_fetch_assoc($eredmeny)) {
   $kimenet .= "<tr>
   <td>{$sor['fajta']}</td>
   <td>{$sor['tipus']}</td>
   <td>{$sor['gyartas']}</td>
   <td>{$sor['km']}</td>
   <td>{$sor['ara']}</td>
   <td><a href=\"torles.php?id={$sor['id']}\">Törlés</a>
   | <a href=\"modositas.php?id={$sor['id']}\">Módosítás</a></td>
</tr>";
}
$kimenet .= "</table>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autók</title>
    <link rel="stylesheet" href="stilus.css">
</head>
<body>
    <div class="container">
        <h1>Autók</h1>
        <form action="" method="post">
            <input type="search" name="kifejezes" id="kifejezes">
        </form>
        <p><a href="felvitel.php">Új autó felvitele</a></p>

        <!--Ide kerül a PHP kimenet-->
        <?php print $kimenet;?>
    </div>
</body>
</html>
