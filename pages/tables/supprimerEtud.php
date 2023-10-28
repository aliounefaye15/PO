
<?php
require_once('../connexion.php');

if (isset($_GET['id'])) {
    $supression = $_GET['id'];
    $req_delete = "DELETE FROM etudiant WHERE Matricule='$supression' ";
    $resultat = mysqli_query($conecole, $req_delete);
}

if ($resultat) {
    echo "<script type=\"text/javascript\">
      alert (\"suppression reusie\");
      </script> ";
    echo '<meta http-equiv="refresh" content="1;url=Etudiants.php" />';
} else {
    echo "<script type=\"text/javascript\"> 
    alert (\" Echec de la suppression\") ;
    </script> ";
}
?>