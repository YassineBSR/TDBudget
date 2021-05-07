<?php
require_once __DIR__ . '/librairies/database.php';
require 'functions.php';
$pdo = db_connect();

$error = false;

// Le formulaire a été soumis
if (!empty($_POST)) {

    // vérifie que le nom est bien renseigné
    if (empty($_POST['birth_date'])) {
        $error = true;
    }
    if (empty($_POST['first_name'])) {
        $error = true;
    }
    if (empty($_POST['last_name'])) {
        $error = true;
    }

    if (!$error) {
        $first_name = htmlentities($_POST['first_name']);
        $last_name = htmlentities($_POST['last_name']);
        $birth_date = htmlentities($_POST['birth_date']);
        if (adduser($pdo, $first_name, $last_name, $birth_date)) {
            $success = true;
        }
    }
}

require_once 'inc/header.php';
?>
<link rel="stylesheet" href="assets/css/style2.css">
<main class="text-center">
    <div class="container pt-5 ">
        <?php if (isset($success)) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>Utilisateur créé avec succès !</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-md-5 bg-light p-3">
                <form class="rounded" action="" method="post">
                    <div class="mb-3">
                        <label class="mb-3" for="first_name">Nom de l'utilisateurs</label>
                        <input name="first_name" class="form-control" id="first_name" type="text">
                        <p class="mb-0 text-danger"><?= $error ? 'Le champ est requis' : '' ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="mb-3" for="last_name">Prénom de l'utilisateurs</label>
                        <input name="last_name" class="form-control" id="last_name" type="text">
                        <p class="mb-0 text-danger"><?= $error ? 'Le champ est requis' : '' ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="mb-3" for="birth_date">Date de naissances</label>
                        <input name="birth_date" class="form-control" id="birth_date" type="date">
                        <p class="mb-0 text-danger"><?= $error ? 'Le champ est requis' : '' ?></p>
                    </div>
                    <a href="userlist.php"><input class="btn btn-primary" type="submit" value="Enregister"></a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/inc/footer.php';
