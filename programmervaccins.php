<?php include 'inc/fonction.php' ?>
<?php include 'inc/pdo/pdo.php' ?>

<?php
 $title = 'Mon carnet';
 $error = array();
// requete recup info details
$id = $_GET['id'];
$user_id = $_SESSION['user']['id'];
$sql = "SELECT * FROM vaccin1_vaccin WHERE id = :id";
$query = $pdo -> prepare($sql);
$query -> bindValue(':id',$id,PDO::PARAM_INT);
$query -> execute();
$details = $query ->fetchAll();
if (empty($details)) {
  header ('Location: 404.php');
}
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
<div class="maladie">
<?php
foreach ($details as $detail) {
    echo 'Vaccin : '.$detail['nom_vaccin'];
    br();
    echo 'Maladie traitée : '.$detail['nom_maladie'];
}
?>
</div>
<br>
<form class="form-inscription" action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Date du vaccin</label>
    <input type="date" name="datevaccin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
    <span><?php if (!empty($error['datevaccin'])){echo $error['datevaccin'];} ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Numéro de lot</label>
    <input type="text" name="numerodelot" class="form-control" id="exampleInputPassword1" value="">
    <span><?php if (!empty($error['numerodelot'])){echo $error['numerodelot'];} ?></span>
  </div>
  <input type="submit" name="submitted" class="btn btn-primary" value="Confirmer">
</form>

<?php include('inc/footer.php') ?>
