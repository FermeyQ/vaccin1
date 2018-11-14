<?php include('../inc/fonction.php') ?>
<?php include('../inc/pdo/pdo.php') ?>
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
                    <div class="form">
                        <table id="tableCarnet" class="table table-striped table-bordered dt-responsive nowrap"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="form">Vaccin</th>
                                    <th class="form">Maladie</th>
                                    <th class="form"></th>
                                    <th class="form"></th>
                                </tr>
                            </thead>
                            <?php
                    foreach ($vaccins as $vaccin) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $vaccin['nom_vaccin']. '  '; ?>
                                    </td>
                                    <td><?php echo $vaccin['nom_maladie'].'  '; ?>
                                    </td>
                                    <td><?php echo '<a href = "editvaccins.php?id='. urlencode($vaccin['id']) . '">Edit vaccins</a>'.' '; ?>
                                    <td><?php echo '<a href = "deletevaccins.php?id='. urlencode($vaccin['id']) . '">Delete vaccins</a>'.'<br>';
                    }?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
    <script>
    $(document).ready(function() {
      $('#tableCarnet').DataTable();
    });
    </script>
    <?php include 'inc/footerback.php';?>
