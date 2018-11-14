<?php include 'inc/fonction.php' ?>
<?php include 'inc/pdo/pdo.php' ?>
<?php
$title = 'Annuler un vaccin';
$id = $_SESSION['user']['id'];
$sql = "SELECT * FROM vaccin1_user_vaccin WHERE user_id = $id";
$query = $pdo -> prepare($sql);
$query -> execute ();
$vaccinsprogramme = $query -> fetchAll ();
foreach ($vaccinsprogramme as $vaccinprogramme) {
  $vaccin = $vaccinprogramme['vaccin_id'];
}
$sql = "SELECT * FROM vaccin1_vaccin WHERE id = $vaccin";
$query = $pdo -> prepare($sql);
$query -> execute ();
$vaccins_nom = $query -> fetch ();
$vaccin_nom = $vaccins_nom['nom_vaccin'];
$vaccin_nom .= ' '.$vaccins_nom['nom_maladie'];
if (!empty($_POST['submitted'])) {
  $sql = "DELETE FROM vaccin1_user_vaccin WHERE id=$id ";
  $query = $pdo ->prepare($sql);
  $query -> execute();
  header('Location:mesvaccins.php');
}
?>
<?php include 'inc/header.php' ?>
<a href="mesvaccins.php">Retour à la liste</a>
<form action="" method="post">
  <span>VOULEZ-VOUS VRAIMENT SUPPRIMER CE VACCIN '<?php echo $vaccin_nom . ' ' . $vaccinprogramme['date'] ?>'</span>
  <input type="submit" name="submitted" value="Supprimer">
</form>
</table>
<br>
<script>
$(document).ready(function() {
  $('#tableCarnet').DataTable();
});
</script>
<?php include('inc/footer.php');?>
