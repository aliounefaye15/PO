<!DOCTYPE html>
<html lang="en">

<?php
require_once('../connexion.php');
?>
<?php include('../Header2.php') ?>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo-mini.svg" alt="logo" /></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </nav>
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Tableau De Bord</h4>
          </li>
         
        </ul>
      </div>
    </nav>
 
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


      <?php include('../MENU1.php') ?>

      <!-- partial -->

      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center">Formulaire Ajout Etudiants</h3>

            <form class="forms-responsive" action="" method="post">
              <div class="form-group row">
                <label for="inputTexte4" class="col-sm-3 col-form-label">Matricule</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="text" name="txtmatricule">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTexte4" class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="text" name="txtnom">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTexte4" class="col-sm-3 col-form-label">Prénom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="text" name="txtprenom">
                </div>
              </div>
              <div class="form-group row">
                <label for="InputDate" class="col-sm-3 col-form-label">DateNaiss</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="DateDeNaissance" name="dateE">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTexte4" class="col-sm-3 col-form-label">Adrresse</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="text" name="txtadresse">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTexte4" class="col-sm-3 col-form-label">Niveau</label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="cboniveau">
                    <option selected>selectionner un niveau</option>
                    <option value="6eme">6eme</option>
                    <option value="5eme">5eme</option>
                    <option value="4eme">4eme</option>
                    <option value="3eme">3eme</option>
                    <option value="2nde">2nde</option>
                    <option value="1ere">1ere</option>
                    <option value="Terminale">Terminale</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputradio4" class="col-sm-3 col-form-label">Sexe</label>
                <div class="col-sm-9">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txtsexe" value="Masculin" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      HOMME
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txtsexe" value="Feminin" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                      FEMME
                    </label>
                  </div>
                </div>
              </div>

              <button class="btn btn-dark" type="submit" name="valider">Ajouter</button>
              <?php 
      if(isset($_POST['valider'])){
       $matricule= $_POST['txtmatricule'];
       $nom= $_POST['txtnom'];
       $prenom= $_POST['txtprenom'];
       $datenaiss= $_POST['dateE'];
       $adresse= $_POST['txtadresse'];
       $niveau= $_POST['cboniveau'];
       $sexe= $_POST['txtsexe'];

       $req_add="INSERT INTO etudiant (Matricule,Nom,Prenom,DateNais,Adrresse,Niveau,Sexe)
       Values('$matricule','$nom','$prenom','$datenaiss','$adresse','$niveau','$sexe')";
         $resultat=mysqli_query($conecole,$req_add);
         if ($resultat){
          echo '<meta http-equiv="refresh" content="1;url=../tables/Etudiants.php" />';
         } else{
          echo "Insertion non effectué";
         }
      }
        ?>
            </form>
          </div>
        </div>
        <?php include('../FOOTER2.php') ?>
      </div>
   
</body>

</html>