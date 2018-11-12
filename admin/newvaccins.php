<?php include('../inc/fonction.php') ?>
<?php include('../inc/pdo.php') ?>
<?php $title = 'New Vaccins';?>

<<<<<<< HEAD



<?php include('inc/headerback.php');?>
<form action="" method="post">
  <input type="submit" name="submitted" value="envoyer">
</form>
=======
<?php
$error = array();
if (!empty($_POST['submitted'])) {
    // faille XSS
    $newvaccins = trim(strip_tags($_POST['newvaccins']));
    $newmaladie = trim(strip_tags($_POST['newmaladie']));
    if (!empty($newvaccins)) {
        $sql = "SELECT nom_vaccin FROM vaccin1_vaccin";
        $query = $pdo -> prepare($sql);
        $query -> execute();
        $nomExistant = $query -> fetch();
    }
    if (!empty($nomExistant)) {
        $error['nomExistant'] = 'Vaccin existant';
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
                </div>
                <!-- formulaire -->
                <form action="#" method="post">
                    <label for="newvaccins">Nom du vaccin</label>
                    <input type="text" name="newvaccins" id="newvaccins" value="">
                    <label for="newmaladie">Nom de la maladie</label>
                    <input type="text" name="newmaladie" id="newmaladie" value="">
                    <input type="submit" name="submitted" id="" value="CONFIRMER">
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

</body>

</html>
>>>>>>> 24af0dbc4f6ef8f3596503139ec477e472e5b380
