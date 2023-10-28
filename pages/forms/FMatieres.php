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
                        <h4 class="mb-0">Dashboard</h4>
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
                        <h3 class="text-center">Formulaire Ajout Matieres</h3>

                        <form class="forms-responsive"  action="" method="post">
                            <div class="form-group row">
                                <label for="inputnumero" class="col-sm-3 col-form-label">Numero</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="number" name="txtnumero">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputTexte4" class="col-sm-3 col-form-label">NomMat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="text" name="txtnommat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputnumero" class="col-sm-3 col-form-label">VolumeH</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="text" name="txtvolumeh">
                                </div>
                            </div>


                            <button class="btn btn-dark" type="submit" name="valider">Ajouter</button>
                            <?php 
        if(isset($_POST['valider'])){
         $numero= $_POST['txtnumero'];
         $nommat= $_POST['txtnommat'];
         $volumeh= $_POST['txtvolumeh'];
         
  
         $req_add="INSERT INTO matiere(Numero,NomMat,VolumeH)
         Values('$numero','$nommat','$volumeh')";
           $resultat=mysqli_query($conecole,$req_add);
           if ($resultat){
            echo '<meta http-equiv="refresh" content="1;url=../tables/Matieres.php" />';
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

            <!-- End custom js for this page-->
           
</body>
<!-- partial:../../partials/_sidebar.html -->




<!-- partial -->

</html>