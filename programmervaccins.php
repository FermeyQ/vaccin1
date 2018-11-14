<?php include 'inc/fonction.php' ?>
<?php include 'inc/pdo/pdo.php' ?>

<?php
 $title = 'Mon carnet';
 $error = array();
// requete recup info details
$id = $_GET['id'];
$user_id = $_SESSION['user']['id'];
$sql = "SELECT * FROM vaccin1_vaccin WHERE id = $id";
$query = $pdo -> prepare($sql);
$query -> execute();
$details = $query ->fetchAll();
// requete envoie date bdd
$error = array();
if(!empty($_POST['submitted'])) {
  $datevaccin = trim(strip_tags($_POST['datevaccin']));
  $numerodelot = trim(strip_tags($_POST['numerodelot']));
    if (!empty($datevaccin)) {
    } else {
      $error['datevaccin'] = 'Veuillez choisir une date';
    }
    if (!empty($numerodelot)) {
    } else {
      $error['numerodelot'] = 'Veuillez renseigner un numéro de lot';
    }
    if (count($error)==0) {
      $sql = "INSERT INTO vaccin1_user_vaccin (user_id,vaccin_id,date,created_at,numero_de_lot) VALUES ($user_id,$id,:datevaccin,NOW(),:numerodelot)";
      $query =$pdo->prepare($sql);
      $query ->bindValue(':datevaccin',$datevaccin);
      $query ->bindValue(':numerodelot',$numerodelot);
      $query->execute();
      header ('location: mesvaccins.php');
    }
}
?>
<?php include('inc/header.php'); ?>
<a href="mesvaccins.php">Mes vaccins programmées</a>
<br>
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
<span><?php if (!empty($error['datevaccin'])){echo $error['datevaccin'];} ?></span>
<input type="date" name="datevaccin" id="datevaccin" value="">
<label for="numerodelot">Numéro de lot</label>
<span><?php if (!empty($error['numerodelot'])){echo $error['numerodelot'];} ?></span>
<input type="text" name="numerodelot" value="">
<input type="submit" name="submitted" value="Confirmer">
</fieldset>
</form>
<?php include('inc/footer.php') ?>
