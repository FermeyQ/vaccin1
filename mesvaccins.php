<?php include 'inc/fonction.php' ?>
<?php include 'inc/pdo/pdo.php' ?>
<?php include 'inc/request.php' ?>
<?php
$title = 'Mes vaccins';
$user_id = $_SESSION['user']['id'];
// $sql = "SELECT * FROM vaccin1_user_vaccin WHERE user_id = $user_id ";
// $query = $pdo -> prepare($sql);
// $query -> execute ();
// $vaccins = $query -> fetchAll ();
$vaccins = getAllVaccinsOfThisUser($user_id);
?>
<?php include 'inc/header.php' ?>
<div id="containerTable">
<table id="tableMesVaccins" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th>Nom du vaccin</th>
      <th>Nom de la maladie traitée</th>
      <th>Date de vaccination prévue</th>
      <th></th>
    </tr>
  </thead>
  <?php foreach ($vaccins as $vaccin) {
    $vaccin_id = $vaccin['vaccin_id'];
    $sql = "SELECT * FROM vaccin1_vaccin WHERE id = $vaccin_id ";
    $query = $pdo -> prepare($sql);
    $query -> execute ();
    $unique = $query -> fetch ();
    ?>
  <tbody>
    <tr>
      <td><?php echo $unique['nom_vaccin']; ?></td>
      <td><?php echo $unique['nom_maladie']; ?></td>
      <td><?php echo $vaccin['date'];?></td>
      <td><?php echo '<a href="deletevaccins.php?id='. $unique['id'].'">Annuler ce vaccin</a>'?></td>
    </tr>
    <?php
} ?>
</tbody>
</table>
</div>
<br>
<?php include('inc/footer.php');?>
<script>
$(document).ready(function(){
    var table = $('#tableMesVaccins').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel', 'pdf', 'print'],
        responsive: true,
        pageLength: 10
    });
});
</script>
