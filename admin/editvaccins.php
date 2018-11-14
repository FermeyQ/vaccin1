<?php include('../inc/fonction.php') ?>
<?php include('../inc/pdo/pdo.php') ?>
<?php
$title = 'Edit vaccins';
$error = array();
$id = $_GET['id'];
if (!empty($id) && is_numeric($_GET['id'])) {
    $id = urldecode($_GET['id']);
    $sql ="SELECT * FROM vaccin1_vaccin WHERE id = $id";
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $vaccin = $query -> fetch();
}
if (!empty($_POST['submitted'])) {
    // faille XSS
    $editvaccins = trim(strip_tags($_POST['editvaccin']));
    $editmaladie = trim(strip_tags($_POST['editmaladie']));
    // verif vaccin exist
    if (empty($editvaccins)) {
        $error['editvaccin'] = 'Veuillez renseigner un nom de vaccin !';
    }
    // verif maladie
    if (empty($editmaladie)) {
        $error['editmaladie'] = 'Veuillez renseigner un nom de maladie !';
    }
    // si pas d'erreurs
    if (count($error) == 0) {
        $sql = "UPDATE vaccin1_vaccin SET nom_vaccin = :editvaccins, nom_maladie = :editmaladie WHERE id=$id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':editvaccins', $editvaccins, PDO::PARAM_STR);
        $query ->bindValue(':editmaladie', $editmaladie, PDO::PARAM_STR);
        $query ->execute();
        header('Location: listvaccins.php');
    }
}
?>
<?php include('inc/headerback.php') ?>

<body>
    <?php include('inc/navback.php');?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Vaccins</h1>
                    <a href="listvaccins.php">Retour à la liste</a>

                    <form class="form-inscription" action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Modifier le vaccin</label>
                            <input type="text" name="editvaccin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $vaccin['nom_vaccin'] ?>">
                            <span><?php if (!empty($error['editvaccin'])) {
    echo $error['editvaccin'];
} ?></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">modifier la maladie</label>
                            <input type="text" name="editvaccin" class="form-control" id="exampleInputPassword1" value="<?php echo $vaccin['nom_maladie'] ?>">
                            <span><?php if (!empty($error['editmaladie'])) {
    echo $error['editmaladie'];
} ?></span>
                        </div>
                        <input type="submit" name="submitted" class="btn btn-primary" value="Modifier">
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
