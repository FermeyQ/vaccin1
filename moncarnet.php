<?php include 'inc/fonction.php' ?>
<?php include 'inc/pdo.php' ?>



<?php $title = 'Mon carnet';?>
<?php
$sql = "SELECT * FROM vaccin1_user ";
$query = $pdo -> prepare($sql);
$query -> execute();
$users = $query ->fetchAll();

<?php include ('inc/header.php'); ?>


<?php include ('inc/footer.php') ?>
