<?php include('../inc/fonction.php') ?>
<?php include('../inc/pdo/pdo.php') ?>
<?php
// tableau d'erreur
$title = 'New Vaccins';
$error = array();
// condition de soumission du formulaire
if (!empty($_POST['submitted'])) {
    // faille XSS
    $newvaccin = trim(strip_tags($_POST['newvaccin']));
    $newmaladie = trim(strip_tags($_POST['newmaladie']));
    // verif vaccin exist
    if (!empty($newvaccin)) {
        $sql = "SELECT nom_vaccin FROM vaccin1_vaccin WHERE nom_vaccin = :newvaccin";
        $query = $pdo -> prepare($sql);
        $query->bindValue(':newvaccin', $newvaccin, PDO::PARAM_STR);
        $query -> execute();
        $nomExistant = $query -> fetch();
        if (!empty($nomExistant)) {
            $error['newvaccin'] = 'Vaccin existant';
        }
    }
    // verif vaccin
    if (empty($newvaccin)) {
      $error['newvaccin'] = 'Veuillez renseigner un nom de vaccin !';
    }
    // verif maladie
    if (empty($newmaladie)) {
        $error['newmaladie'] = 'Veuillez renseigner un nom de maladie !';
    }
    // si pas d'erreurs
    if (count($error) == 0) {
        $sql = "INSERT INTO vaccin1_vaccin (nom_vaccin, nom_maladie) VALUES (:newvaccin, :newmaladie)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':newvaccin', $newvaccin, PDO::PARAM_STR);
        $query ->bindValue (':newmaladie', $newmaladie, PDO::PARAM_STR);
        $query ->execute();
        header ('location: listvaccins.php');
    }
}
?>
<?php include('inc/headerback.php');?>
<body>
    <?php include('inc/navback.php');?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Vaccins</h1>
                <!-- formulaire -->
                <form class="form-inscription" action="#" method="post">
                  <div class="form-group">
                    <label for="newvaccins">Nom du vaccin</label>
                    <span class="error"><?php if (!empty($error['newvaccin'])) {echo $error['newvaccin'];}?></span>
                    <input type="text" class="form-control" name="newvaccin" id="newvaccin" value="">
                    <label for="newmaladie">Nom de la maladie</label>
                    <span class="error"><?php if (!empty($error['newmaladie'])) {echo $error['newmaladie'];}?></span>
                    <input type="text" class="form-control" name="newmaladie" id="newmaladie" value="">
                  </div>
                    <input type="submit" class="btn btn-primary" name="submitted" id="" value="CONFIRMER">
                </form>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="asset/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="asset/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="asset/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="asset/sb-admin-2.js"></script>
<?php include 'inc/footerback.php';
