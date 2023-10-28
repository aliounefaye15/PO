<?php
require_once('pages/connexion.php');
?>
<!DOCTYPE html>
<html lang="en">


<?php include('pages/Header1.php') ?>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/isep.jpg" alt="logo">
              </div>
              <h4>Bonjour</h4>
              <h6 class="font-weight-light"> Veuillez entrer vos identifiants pour vous connecter</h6>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="txtname" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="txtpsswd" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" name="btnlogin" class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn">Connexion</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Valider les informations
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Mot de passe oublié?</a>
                </div>
                <?php

                if (isset($_POST['btnlogin'])) {
                  $req = "SELECT * FROM utilisateur WHERE UserName='" . $_POST['txtname'] . "' AND MotPass='" . $_POST['txtpsswd'] . "'";

                  if ($resultat = mysqli_query($conecole, $req)) {
                    $ligne = mysqli_fetch_assoc($resultat);
                    if ($ligne != 0) {
                      echo '<meta http-equiv="refresh" content="1;url =accueil.php" />';
                    } else {
                      echo "<font color='#F0001D'> Nom utilisateur ou Mot de passe Invalide, Veuillez réessayer Svp";
                    }
                  }
                }
                ?>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <?php include('pages/FOOTER1.php') ?>
</body>

</html>