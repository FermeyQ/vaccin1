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
                    foreach ($vaccins as $vaccin) {
                        echo '<span>Nom du vaccin : </span>' . $vaccin['nom_vaccin']. ' / ';
                        echo '<span>Nom de la(les) maladie traitée(s) : </span>' . $vaccin['nom_maladie'] .'<br>';
                        echo '<a href = "editvaccins.php?id='. urlencode($vaccin['id']) . '">Edit vaccins</a>'.' ';
                        echo '<a href = "deletevaccins.php?id='. urlencode($vaccin['id']) . '">Delete vaccins</a><br>';
                      }?>
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
<?php include 'inc/footerback.php' ?>
