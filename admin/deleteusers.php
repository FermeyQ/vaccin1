<?php
include ('inc/headerback.php');
?>

<?php
// FORMULAIRE SOUMIS
$error = array();
if (!empty($_POST['submitted'])) {
// FAILLE XSS
    $name = trim(strip_tags($_POST['name']));
    $email = trim(strip_tags($_POST['email']));

// VALIDATION
    // validation name
    if (!empty($name)) {
        if (strlen($name) < 5) {
            $error['name'] = 'min 5 caracteres';
        } elseif (strlen($name) > 50) {
            $error['name'] = 'max 50 caracteres';
        } else {
            //    requete
            $sql = "SELECT name FROM user WHERE name = :name";
            $query = $pdo->prepare($sql);
            $query->bindValue(':name', $name, PDO::PARAM_STR);
            $query->execute();
            $username = $query->fetch();
            if (!empty($username)) {
                $error['name'] = 'name deja utilisé';
            }
        }
    } else {
        $error['name'] = 'renseigner un name';
    }

// validation email
    if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'renseigner un email';
        } else {
            //    requete
            $sql = "SELECT email FROM vaccin1_user WHERE email = :email";
            $query = $pdo->prepare($sql);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $useremail = $query->fetch();
            if (!empty($useremail)) {
                $error['email'] = 'email deja utilisé';
            }
        }
    } else {
        $error['email'] = 'renseigner un email';
    }

// SI AUCUNE ERROR
    if (count($error) == 0) {
        $success = true;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = generateRandomString(120);
        $sql = "INSERT INTO vaccin1_user (name,email,token,password,role,created_at) VALUES (:name,:email,'$token',:password,'user',NOW())";
        $query = $pdo->prepare($sql);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $hash, PDO::PARAM_STR);
        $query->execute();
        header ('location: moncarnet.php');
    }
}
?>

<body>
<?php
include ('inc/navback.php');
?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Delete Users</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <!-- formulaire name-->
                    <form action="#" method="post">
                        <label for="name">Nom Utilisateur a supprimer :</label>
                        <span class="error"><?php if (!empty($error['name'])) {echo $error['name'];}?></span>
                        <input type="text" name="name" id="name" value="<?php if (!empty($_POST['name'])) {echo $_POST['name'];}?>">
                        <input type="submit" value="Confirmer">
                        <br>

                    <!-- formulaire email-->
                        <label for="email">Email utilisateur a supprimer :</label>
                        <span class="error"><?php if (!empty($error['email'])) {echo $error['email'];}?></span>
                        <input type="text" name="email" id="email" value="<?php if (!empty($_POST['email'])) {echo $_POST['email'];}?>">
                        <input type="submit" value="Confirmer">

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