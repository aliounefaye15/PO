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
            <h4 class="mb-0">Tableau de bord</h4>
          </li>
          
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-search d-none d-md-block mr-0">
            <form action="" method="post" class="input-group">
              <input type="text" class="form-control" placeholder="Search..." aria-label="search" aria-describedby="search" name="motcle" required>
              <div class="input-group-prepend">
                <button class="input-group-text" id="search" type="submit" name="btnsubmit">
                  <i class="typcn typcn-zoom"></i>
                </button>
              </div>
            </form>
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


      <?php include('../MENU2.php') ?>

      <!-- partial -->

      <div class="container-fluid">
        <div class="card">
          <div class="card-body">

            <h3 class=" text-center">LISTE DES APPRENANTS PRESENT</h3>

            <div class="table-responsive">
              <table class="table table-hover">
                <?php
                /* barre de recherche*/
                if (isset($_POST['btnsubmit'])) {
                  $mc = $_POST['motcle'];
                  $req_recuperation = " select* from etudiant where Nom Like '%$mc%' OR Matricule Like '%$mc%' ";
                } else {
                  $req_recuperation = " select* from etudiant";
                }
                /* affichage des liste*/

                $resultat = mysqli_query($conecole, $req_recuperation);
                $nbr = mysqli_num_rows($resultat);
                echo "<p><b> Total des etudiants enrigistres:" . $nbr . "</b></p>";
                ?>
                <thead>
                  <tr class="table-info">
                    <th>
                      Matricule
                    </th>
                    <th>
                      Nom
                    </th>
                    <th>
                      Prénom
                    </th>
                    <th>
                      DateNaisse
                    </th>
                    <th>
                      Adresse
                    </th>
                    <th>
                      annee
                    </th>
                    <th>
                      Sexe
                    </th>
                    <th>
                      MODIFIER
                    </th>
                    <th>
                      SUPPRIMER
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($ligne = mysqli_fetch_assoc($resultat)) {
                  ?>
                <tbody>
                  <td><?php echo $ligne['Matricule']; ?></td>
                  <td><?php echo $ligne['Nom']; ?></td>
                  <td><?php echo $ligne['Prenom']; ?></td>
                  <td><?php echo $ligne['DateNais']; ?></td>
                  <td><?php echo $ligne['Adrresse']; ?></td>
                  <td><?php echo $ligne['Niveau']; ?></td>
                  <td><?php echo $ligne['Sexe']; ?></td>
                  <td><a href="modifEtud.php?id=<?php echo $ligne['Matricule']; ?>" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a></td>
                  <td><a href="supprimerEtud.php?id=<?php echo $ligne['Matricule']; ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                  </tr>
                </tbody>
              <?php
                  }
              ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('../FOOTER2.php') ?>
</body>

</html>