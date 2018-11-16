<?php include('../inc/fonction.php') ?>
<?php include('../inc/pdo/pdo.php') ?>
<?php
$title = 'Liste des utilisateurs';
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
                    <h1 class="page-header">Liste des utilisateurs</h1>
                    <div id="containerTable">
                        <table id="tableUsers" class="table table-striped table-bordered" style="width:100%"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="form">Nom</th>
                                    <th class="form">Email</th>
                                    <th class="form">Role</th>
                                    <th class="form">Crée le</th>
                                    <th class="form">Modifié le</th>
                                    <th class="form">Modifier l'utilisateur</th>
                                    <th class="form">Effacer l'utilisateur</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user) {
    ?>
                                <tr>
                                    <td><?php echo $user['name']. '  '; ?>
                                    </td>
                                    <td><?php echo $user['email'].' '; ?>
                                    </td>
                                    <td><?php echo $user['role'] ?></td>
                                    <td><?php echo $user['created_at'] ?></td>
                                    <td><?php echo $user['modified_at'] ?></td>
                                    <td><?php echo '<a href = "editusers.php?id='. urlencode($user['id']) . '"><i class="fa fa-edit fa-fw"></i></a>'.' '; ?>
                                    <td><?php echo '<a href = "deleteusers.php?id='. urlencode($user['id']) . '"><i class="fa fa-trash fa-fw"></i></a>'.'<br>';
}?>
</tr>
                            </tbody>
                        </table>
                    </div>
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
    <?php include 'inc/footerback.php';?>
    <script>
$(document).ready(function(){
    var table = $('#tableUsers').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel', 'pdf', 'print'],
        responsive: true,
        pageLength: 10
    });
});
</script>
