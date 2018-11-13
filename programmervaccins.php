<?php include 'inc/fonction.php' ?>
<?php include 'inc/pdo.php' ?>

<?php $title = 'Mon carnet';?>

<?php
// requete recup info details
$id = $_GET['id'];
$sql = "SELECT * FROM vaccin1_vaccin WHERE id = $id";
$query = $pdo -> prepare($sql);
$query -> execute();
$details = $query ->fetchAll();

// requete envoie date bdd
$error = array();
if(!empty($_POST['submitted'])) {
    // code
} else {
    // error
}
?>
<?php include('inc/header.php'); ?>

<?php
foreach ($details as $detail) {
    echo $detail['nom_vaccin'];
    br();
    echo $detail['nom_maladie'];
}
?>
<br>
<!-- formulaire date du vaccin -->
<form action="" method="post">
<fieldset>
<legend>DATE</legend>
<label for="datevaccin">Date du vaccin</label>
<input type="date" name="datevaccin" id="datevaccin">
<input type="submit" name="submitted" value="Confirmer">
</fieldset>
</form>
<?php include('inc/footer.php') ?>
