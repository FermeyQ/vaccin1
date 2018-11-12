<?php include('../inc/fonction.php') ?>
<?php include('../inc/pdo.php') ?>
<?php $title = 'List Vaccins';?>

<?php
$error = array();
$sql = "SELECT nom_vaccin, nom_maladie FROM vaccin1_vaccin";
$query = $pdo -> prepare($sql);
$query -> execute();
$users = $query ->fetchAll();
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
                </div>
                <!-- /.col-lg-12 -->
                <form action="#" method="post">
                <input type="submit" name="newvaccins" id="newvaccins" value="NEW USER">
                </form>
                <?php
                    foreach ($users as $user) {
                        echo $user['nom_vaccin']. ' / ';
                        echo $user['nom_maladie']; ?>
                <!-- formulaire -->
                <form action="#" method="post">
                    <label for="editusers"></label>
                    <input type="submit" name="editvaccins" id="editvaccins" value="EDIT">
                    <label for="editusers"></label>
                    <label for="deleteusers"></label>
                    <input type="submit" name="deletevaccins" id="deletevaccins" value="DELETE">
                </form>
                <?php
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

</body>

</html>