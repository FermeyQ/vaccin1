<?php include('inc/fonction.php') ?>
<?php include('inc/pdo/pdo.php') ?>
<?php
$title = 'S\'inscrire';
// FORMULAIRE SOUMIS
$error = array();
if (!empty($_POST['submitted'])) {
    // FAILLE XSS
    $name = trim(strip_tags($_POST['name']));
    $email = trim(strip_tags($_POST['email']));
    $password = trim(strip_tags($_POST['password']));
    $password2 = trim(strip_tags($_POST['password2']));
    // VALIDATION
    // validation name
    if (!empty($name)) {
        if (strlen($name) < 5) {
            $error['name'] = 'min 5 caracteres';
        } elseif (strlen($name) > 50) {
            $error['name'] = 'max 50 caracteres';
        } else {
            //    requete
            $sql = "SELECT name FROM vaccin1_user WHERE name = :name";
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
    // validation password
    if (!empty($password) && !empty($password2)) {
        if ($password != $password2) {
            $error['password'] = 'Vos mots de passe ne correspondent pas';
        }
        if (strlen($password) < 6) {
            $error['password'] = 'Votre mot de passe est trop court. (minimum 6 caractères)';
        }
    } else {
        $error['password'] = 'Veuillez entrer un mot de passe';
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
        header('location: connection.php');
    }
}
?>
<?php include 'inc/header.php' ?>
<h1>S'inscrire</h1>
<form class="form-inscription" action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Nom</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Entrer un nom" value="<?php if (!empty($_POST['name'])) {
    echo $_POST['name'];
}?>"
            placeholder="jeanjean">
        <span class="error"><?php if (!empty($error['name'])) {
    echo $error['name'];
}?></span>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer un email" value="<?php if (!empty($_POST['email'])) {
    echo $_POST['email'];
}?>"
            placeholder="jeanjean@gmail.com">
        <span class="error"><?php if (!empty($error['email'])) {
    echo $error['email'];
}?></span>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Entrer un mot de passe" value="">
        <span class="error"><?php if (!empty($error['password'])) {
    echo $error['password'];
}?></span>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Confirmer le mot de passe</label>
        <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Confirmer ce mot de passe" value="">
    </div>
    <input type="submit" name="submitted" class="btn btn-primary" value="S'inscrire">
</form>

<?php include 'inc/footer.php';
