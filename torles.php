<?php
if (isset($_GET['id'])) {
    //echo $_GET['id'];
    require("kapcsolat.php");
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM autok
            WHERE id= {$id}";

    if (mysqli_query($dbconn, $sql)) {
        echo "Sikeres törlés";
        exit();
    } else {
        echo "Hiba a törlés során: " . mysqli_error($dbconn);
    }
} else {
    header("Location: lista.php");
    exit();
}
?>
