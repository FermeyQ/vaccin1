<?php include ('../inc/fonction.php') ?>
<?php include ('../inc/pdo.php') ?>
<?php $title = 'New Vaccins';?>
<?php
$error = array();
if (!empty($_POST['submitted'])) {
// FAILLE XSS
    $nom_vaccin = trim(strip_tags($_POST['nom_vaccin']));
    $nom_maladie = trim(strip_tags($_POST['nom_maladie']));

// VALIDATION
    // validation nom vaccin
    if (!empty($nom_vaccin)) {
        if (strlen($nom_vaccin) < 5) {
            $error['nom_vaccin'] = 'min 5 caracteres';
        } elseif (strlen($nom_vaccin) > 50) {
            $error['nom_vaccin'] = 'max 50 caracteres';
        } else {
            //    requete
            $sql = "SELECT nom_vaccin FROM vaccin1_vaccin WHERE nom_vaccin = :nom_vaccin";
            $query = $pdo->prepare($sql);
            $query->bindValue(':nom_vaccin', $nom_vaccin, PDO::PARAM_STR);
            $query->execute();
            $vaccin_name = $query->fetch();
            if (!empty($vaccinname)) {
                $error['nom_vaccin'] = 'vaccin deja utilisé';
            }
        }
    } else {
        $error['nom_vaccin'] = 'renseigner un vaccin';
    }

// validation nom maladie
    if (empty($nom_maladie)) {
            $error['nom_maladie'] = 'renseigner une maladie';
    }
    if (count($error) == 0) {
        $sql = "INSERT INTO vaccin1_vaccin (nom_vaccin,nom_maladie) VALUES (:nom_vaccin,:nom_maladie)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':nom_vaccin', $nom_vaccin, PDO::PARAM_STR);
        $query->bindValue(':nom_maladie', $nom_maladie, PDO::PARAM_STR);
        $query->execute();
    }
  }
?>
 <?php include ('inc/headerback.php');?>
<body>
<?php include ('inc/navback.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">New Vaccins</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <!-- formulaire-->
                    <form action="" method="post">
                        <label for="nom_vaccin">nom du vaccin</label>
                        <span><?php if (!empty($error['nom_vaccin'])) {
                          echo $error['nom_vaccin'];
                        } ?></span>
                        <input type="text" name="nom_vaccin" id="nom_vaccin" value="">
                        <label for="nom_maladie">nom de la maladie traitée</label>
                        <span class="error"><?php if (!empty($error['nom_maladie'])) {echo $error['nom_maladie'];}?></span>
                        <input type="text" name="nom_maladie" id="nom_maladie" value="">
                        <input type="submit" name="submitted" value="Confirmer">
                    </form>
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

</body>

</html>
