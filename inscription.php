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
            $error['name'] = 'Min 5 caracteres';
        } elseif (strlen($name) > 50) {
            $error['name'] = 'Max 50 caracteres';
        }
    } else {
        $error['name'] = 'Veuillez entrer un nom';
    }
    // validation email
    if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Veuillez entrer un email';
        } else {
            //    requete
            $sql = "SELECT email FROM vaccin1_user WHERE email = :email";
            $query = $pdo->prepare($sql);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $useremail = $query->fetch();
            if (!empty($useremail)) {
                $error['email'] = 'Email deja utilisé';
            }
        }
    } else {
        $error['email'] = 'Veuillez entrer un email';
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

<div class="titreInsc">
  <h1>S'inscrire</h1>
</div>

<form class="form-inscription" action="" method="post">
    <div class="form-group">
        <label for="idText1">Nom</label>
        <input type="text" name="name" class="form-control" id="idText1" aria-describedby="emailHelp"
            placeholder="Entrer un nom" value="<?php if (!empty($_POST['name'])) {
    echo $_POST['name'];
}?>"
            placeholder="jeanjean">
        <span class="error"><?php if (!empty($error['name'])) {
    echo $error['name'];
}?></span>
    </div>
    <div class="form-group">
        <label for="idEmail1">Email</label>
        <input type="email" name="email" class="form-control" id="idEmail1" aria-describedby="emailHelp" placeholder="Entrer un email" value="<?php if (!empty($_POST['email'])) {
    echo $_POST['email'];
}?>"
            placeholder="jeanjean@gmail.com">
        <span class="error"><?php if (!empty($error['email'])) {
    echo $error['email'];
}?></span>
    </div>
    <div class="form-group">
        <label for="idPassword1">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="idPassword1" placeholder="Entrer un mot de passe" value="">
        <span class="error"><?php if (!empty($error['password'])) {
    echo $error['password'];
}?></span>
    </div>
    <div class="form-group">
        <label for="idPassword2">Confirmer le mot de passe</label>
        <input type="password" name="password2" class="form-control" id="idPassword2" placeholder="Confirmer ce mot de passe" value="">
    </div>
    <input type="submit" name="submitted" class="btn btn-primary" value="S'inscrire">
</form>

<?php include 'inc/footer.php';
