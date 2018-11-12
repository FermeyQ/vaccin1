<?php include('../inc/fonction.php') ?>
<?php include('../inc/pdo.php') ?>
<?php $title = 'List Users';?>

<?php
$error = array();
$sql = "SELECT name, email FROM vaccin1_user";
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
                    <h1 class="page-header">List User</h1>
                </div>
                <?php
                    foreach ($users as $user) {
                        echo $user['name']. ' / ';
                        echo $user['email']; ?>
                <!-- formulaire -->
                <form action="#" method="post">
                    <label for="editusers"></label>
                    <input type="submit" name="editusers" id="editusers" value="EDIT">
                    <label for="deleteusers"></label>
                    <input type="submit" name="deleteusers" id="deleteusers" value="DELETE">
                </form>
                <?php
                    }?>
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
