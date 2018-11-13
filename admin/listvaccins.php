<?php include('../inc/fonction.php') ?>
<?php include('../inc/pdo.php') ?>
<?php
$title = 'List Vaccins';
$error = array();
$sql = "SELECT * FROM vaccin1_vaccin";
$query = $pdo -> prepare($sql);
$query -> execute();
$vaccins = $query ->fetchAll();
?>
<?php include('inc/headerback.php');?>

<body>
    <?php include('inc/navback.php');?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List Vaccins</h1>
                <!-- /.col-lg-12 -->
                <a href="newvaccins.php">New vaccins</a>
                <br>
                <?php
<<<<<<< HEAD
                    foreach ($vaccins as $vaccin) {
                        echo '<span>Nom du vaccin : </span>' . $vaccin['nom_vaccin']. ' / ';
                        echo '<span>Nom de la(les) maladie traitée(s) : </span>' . $vaccin['nom_maladie'] .'<br>';
                        echo '<a href = "editvaccins.php?id='. urlencode($vaccin['id']) . '">Edit vaccins</a>'.' ';
                        echo '<a href = "deletevaccins.php?id='. urlencode($vaccin['id']) . '">Delete vaccins</a><br>';
                      }?>
=======
                    foreach ($users as $user) {
                        echo '<span>Nom du vaccin : </span>' . $user['nom_vaccin']. ' / ';
                        echo '<span>Nom de la maladie traitée : </span>' . $user['nom_maladie'] .'<br>';
                        echo '<a href = "editvaccins.php?id='. $user['id'] . '">Edit vaccins</a><br>';
                    }?>
>>>>>>> 748a3b2971f5502110d32c82d178c0867c40f1f1
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
<<<<<<< HEAD
<?php include 'inc/footerback.php' ?>
=======

</body>

</html>
>>>>>>> 748a3b2971f5502110d32c82d178c0867c40f1f1
