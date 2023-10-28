
<?php
// Souvent on identifie cet objet par la variable $conn 
try {
    $con= new PDO(
        'mysql:host=;dbname=ecole;charset=utf8',
        'root',
        '',
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)
    );
} catch (Exception $e){
    die ('error:' . $e->getMessage());
}
$edit=$_GET['id'];
$req = $con->prepare('SELECT * FROM etudiant WHERE Matricule=?');
$req->execute(array($edit));

if(isset($_POST['valider'])){
   
    $nom=htmlspecialchars ($_POST['txtnom']);
    $prenom=htmlspecialchars ($_POST['txtprenom']);
    $datenaiss= htmlspecialchars($_POST['dateE']);
    $adresse=htmlspecialchars ($_POST['txtadresse']);
    $niveau=htmlspecialchars ($_POST['cboniveau']);
    $sexe=htmlspecialchars ($_POST['txtsexe']);

    $req1 = $con->prepare('Update etudiant SET Nom=?,Prenom=?,DateNais=?,Adrresse=?,Niveau=?,Sexe=? WHERE Matricule=?');
    $req1->execute(array($nom,$prenom,$datenaiss,$adresse,$niveau,$sexe,$edit));
    echo "<script type=\"text/javascript\"> 
    alert (\"  Information mise a jour avec succes!\") ;
    </script> ";
    echo '<meta http-equiv="refresh" content="1;url=Etudiants.php" />';
       }
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../connexion.php');
?>
<?php include('../Header2.php') ?>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->

 
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close typcn typcn-times"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial:../../partials/_sidebar.html -->


      <?php include('../MENU2.php') ?>

      <!-- partial -->

      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center">Formulaire Ajout Etudiants</h3>
            <?php while ($res = $req->fetch()) { ?>
            <form class="forms-responsive" action="" method="post">
              <div class="form-group row">
                <label for="inputTexte4" class="col-sm-3 col-form-label">Matricule</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="text" name="txtmatricule"value ="<?php echo $res ['Matricule'] ?>"readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTexte4" class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="text" name="txtnom"value ="<?php echo $res ['Nom'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTexte4" class="col-sm-3 col-form-label">Prénom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="text" name="txtprenom"value ="<?php echo $res ['Prenom'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="InputDate" class="col-sm-3 col-form-label">DateNaiss</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="DateDeNaissance" name="dateE"value ="<?php echo $res ['DateNais'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTexte4" class="col-sm-3 col-form-label">Adrresse</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="text" name="txtadresse"value ="<?php echo $res ['Adrresse'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTexte4" class="col-sm-3 col-form-label">annee</label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="cboniveau"value ="<?php echo $res ['Niveau'] ?>">
                    <option value ="<?php echo $res ['Niveau'] ?>">1er annee</option>
                    <option value="6eme">1ere an</option>
                    <option value="5eme">2eme an</option>
                    
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputradio4" class="col-sm-3 col-form-label">Sexe</label>
                <div class="col-sm-9">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txtsexe" value="Masculin" id="flexRadioDefault1"value ="<?php echo $res ['Sexe'] ?>">
                    <label class="form-check-label" for="flexRadioDefault1">
                      HOMME
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txtsexe" value="Feminin" id="flexRadioDefault2"value ="<?php echo $res ['Sexe'] ?>" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                      FEMME
                    </label>
                  </div>
                </div>
              </div>

              <button class="btn btn-dark" type="submit" name="valider">Modifier</button>
             
            </form>
            <?php
             }
   ?>
          </div>
        </div>
        <?php include('../FOOTER2.php') ?>
      </div>
   
</body>

</html>