<?php
require_once 'pd.php';

$query = $bdd->query("SELECT * FROM entreprise");

while ($row = $query->fetch()) {
    echo $row['NOM'] ;
}
?>