<?php include '../inc/fonction.php' ?>
<?php include '../inc/pdo.php' ?>
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
 <?php
 include ('inc/headerback.php'); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Back-Office</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="../index.php"><i class="fa fa-edit fa-fw"></i>Clients</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="newusers.php">New Users</a>
                                </li>
                                <li>
                                    <a href="editusers.php">Edit Users</a>
                                </li>
                                <li>
                                    <a href="deleteusers.php">Delete Users</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Vaccins<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="newvaccins.php">New Vaccins</a>
                                </li>
                                <li>
                                    <a href="editvaccins.php">Edit Vaccins</a>
                                </li>
                                <li>
                                    <a href="deletevaccins.php">Delete Vaccins</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

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
