<?php include('../inc/fonction.php') ?>
<?php include('../inc/pdo.php') ?>
<?php
$title = 'Edit vaccins';
$error = array();
$id = $_GET['id'];
if (!empty($id) && is_numeric($_GET['id'])) {
  $id = urldecode($_GET['id']);
  $sql ="SELECT * FROM vaccin1_user WHERE id = $id";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $user = $query -> fetch();
}
if (!empty($_POST['submitted'])) {
    // faille XSS
    $editname = trim(strip_tags($_POST['editname']));
    $editemail = trim(strip_tags($_POST['editemail']));
    // verif vaccin exist
    if (empty($editname)) {
        $error['editname'] = 'Veuillez renseigner un nom !';
    }
    // verif maladie
    if (empty($editemail)) {
        $error['editemail'] = 'Veuillez renseigner un email !';
    }
    // si pas d'erreurs
    if (count($error) == 0) {
        $sql = "UPDATE vaccin1_user SET name = :editname, email = :editemail WHERE id=$id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':editname', $editname, PDO::PARAM_STR);
        $query ->bindValue (':editemail', $editemail, PDO::PARAM_STR);
        $query ->execute();
        header ('Location:listusers.php');
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
                  <h1 class="page-header">New Vaccins</h1>
                  <a href="listvaccins.php">Retour à la liste</a>
                  <form action="" method="post">
                    <label for="editname">Modifier le nom</label>
                    <span><?php if (!empty($error['editname'])) {echo $error['editname'];} ?></span>
                    <input type="text" name="editname" value="<?php echo $user['name'] ?>">
                    <label for="editemail">modifier l' email'</label>
                    <span><?php if (!empty($error['editemail'])) {echo $error['editemail'];} ?></span>
                    <input type="text" name="editemail" value="<?php echo $user['email'] ?>">
                    <input type="submit" name="submitted" value="Modifier">
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
