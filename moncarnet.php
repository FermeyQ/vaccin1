<?php include 'inc/fonction.php' ?>
<?php include 'inc/pdo/pdo.php' ?>

<?php
$title = 'Mon carnet';
$error = array();
// requete affiche tableau vaccins
$sql = "SELECT * FROM vaccin1_vaccin";
$query = $pdo -> prepare($sql);
$query -> execute();
$users = $query ->fetchAll();
?>
<?php include('inc/header.php'); ?>
<h1>Programmer une vaccination</h1>

  <div class="programmer">
      <a href="mesvaccins.php">Mes vaccins programmées</a>
  </div>

<!-- tableau des vaccins a programmer -->
<div id="containerTable">
<table id="tableCarnet" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th>Nom du vaccin</th>
      <th>Nom de la maladie traitée</th>
      <th>Programmer ce vaccin</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($users as $user) {
    ?>
    <tr>
      <td><?php echo $user['nom_vaccin']?></td>
      <td><?php echo $user['nom_maladie']?></td>
      <td><?php echo '<a href="programmervaccins.php?id='. $user['id'].'"><i class="fa fa-calendar"></i></a>'?></td>
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
    var table = $('#tableCarnet').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel', 'pdf', 'print'],
        responsive: true,
        pageLength: 10
    });
});
</script>
