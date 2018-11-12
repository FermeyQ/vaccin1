<?php include '../inc/fonction.php' ?>
<?php include '../inc/pdo.php' ?>
<?php
$error = array();
//form soumis
if (!empty($_POST['submitted'])){
  //protection XSS
  $nom_vaccin = trim(strip_tags($_POST['nom_vaccin']));
  //vérification email
  if (empty($nom_vaccin)) {
    $error['nom_vaccin']='Veuillez renseigner un vaccin valide';
  }else {
    $sql ="SELECT * FROM vaccin1_vaccin WHERE nom_vaccin = :nom_vaccin";
    $query = $pdo->prepare($sql);
    $query -> bindValue(':nom_vaccin',$nom_vaccin,PDO::PARAM_STR);
    $query -> execute();
    $vaccin = $query ->fetch();
    debug ($vaccin);
  }
}
?>
<?php
include ('inc/headerback.php');
?>

<body>
<?php
include ('inc/navback.php');
?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Vaccins</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <!-- formulaire-->
                    <form class="" action="" method="post">
                      <label for="nom_vaccin">Nom du vaccin *</label>
                      <span class="error"><?php if (!empty($error['nom_vaccin'])) {echo $error['nom_vaccin'];}?></span>
                      <input type="text" name="nom_vaccin" value="<?php if(!empty($_POST['nom_vaccin'])){echo $_POST['nom_vaccin'];} ?>">
                      <input type="submit" name="submitted" value="Modifier vaccin">
                    </form>
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

</body>

</html>
