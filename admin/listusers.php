<?php include('../inc/fonction.php') ?>
<?php include('../inc/pdo.php') ?>
<?php
$title = 'List User';
$error = array();
$sql = "SELECT * FROM vaccin1_user";
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
                    <?php
                        foreach ($users as $user) {
                            echo $user['name']. ' / ';
                            echo $user['email'] .'<br>';
                            echo '<a href = "editusers.php?id='. urlencode($user['id']) . '">Edit users</a>'.' ';
                            echo '<a href = "deleteusers.php?id='. urlencode($user['id']) . '">Delete users</a><br>';
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
<?php include 'inc/footerback.php';
