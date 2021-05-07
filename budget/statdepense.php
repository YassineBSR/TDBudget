<?php
require_once __DIR__ . '/librairies/database.php';
require 'functions.php';
$pdo = db_connect();

$error = [];

$lists = users_list($pdo);
// Le formulaire a été soumis
if (!empty($_POST)) {

    // vérifie que le nom est bien renseigné


    if (!$error) {
        $exp_amount = htmlentities($_POST['exp_amount']);
        $user_id = htmlentities($_POST['user_id']);
        $exp_date = htmlentities($_POST['exp_date']);
        $exp_label = htmlentities($_POST['exp_label']);
        if (addexp($pdo, $exp_amount, $user_id, $exp_date, $exp_label)) {
            $success = true;
        }
    }
}
require_once 'inc/header.php';
?>
<link rel="stylesheet" href="assets/css/style2.css">
<main class="text-center">
    <div class="container pt-5">
        <?php if (isset($success)) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p> Déclaration de dépense a étè créé avec succès !</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center ">
            <div class="col-md-5 bg-light p-3">

                <form class="form-horizontal text-dark" method="post">
                    <div class="mb-3">
                        <label class="mb-3" for="textinput">Vos Dépense (en euros)</label>
                        <input id="exp_amount" name="exp_amount" type="text" placeholder="Ex: 2500" class="form-control input-md">
                        <p class="mb-0 text-danger"><?= $error ? 'Le champ est requis' : '' ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="mb-3" for="selectbasic">Utilisateur</label>
                        <select id="user_id" name="user_id" class="form-control">
                            <?php foreach ($lists as $list) : ?>

                                <option value="<?= $list['user_id'] ?>"><?= $list['last_name'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <p class="mb-0 text-danger"><?= $error ? 'Le champ est requis' : '' ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="mb-3" for="textinput">Date</label>
                        <input id="exp_date" name="exp_date" type="date" placeholder="Ex:11-01-2001" class="form-control input-md">
                        <p class="mb-0 text-danger"><?= $error ? 'Le champ est requis' : '' ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="col-md-4 control-label" for="selectbasic">Type de dépense</label>
                        <input id="exp_label" name="exp_label" type="text" placeholder="Ex: Achat" class="form-control input-md">
                        <p class="mb-0 text-danger"><?= $error ? 'Le champ est requis' : '' ?></p>
                    </div>
                    <div class="mb-3">
                        <input class="btn btn-primary" type="submit" value="Enregister">
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>


<?php require_once __DIR__ . '/inc/footer.php';
