<?php
// Souvent on identifie cet objet par la variable $conn ou $db
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
$req = $con->prepare('SELECT * FROM utilisateur WHERE Id=?');
$req->execute(array($edit)); 

if(isset($_POST['valider'])){
    $id= $_POST['txtid'];
    $username= htmlspecialchars($_POST['txtusername']);
    $password= htmlspecialchars($_POST['txtpassword']);
    

  
    $req1 = $con->prepare('Update utilisateur SET UserName=?,MotPass=?  WHERE Id=?');
    $req1->execute(array($username, $password,$edit));
    echo "<script type=\"text/javascript\"> 
    alert (\"  Information mise a jour avec succes!\") ;
    </script> ";
    echo '<meta http-equiv="refresh" content="1;url=Utilisateur.php" />';
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
                        <h3 class="text-center">Formulaire Ajout Utilisateurs</h3>
                        <?php while ($res = $req->fetch()) { ?>

                            <form class="forms-responsive"  action="" method="post">
                            <div class="form-group row">
                                <label for="inputtext" class="col-sm-3 col-form-label">Id</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="number" name="txtid"value ="<?php echo $res ['Id'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputTexte4" class="col-sm-3 col-form-label">UserName</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="text" name="txtusername"value ="<?php echo $res ['UserName'] ?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputpassword" class="col-sm-3 col-form-label">MotPass</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="text" name="txtpassword"value ="<?php echo $res ['MotPass'] ?>" >
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