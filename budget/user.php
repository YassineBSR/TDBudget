<?php
require_once __DIR__ . '/librairies/database.php';
require 'functions.php';
$pdo = db_connect();


$user_id = htmlentities($_GET['user_id']);

$utils = users_det($pdo, $user_id);

$deletes = delete_money($pdo, $exp_id);


if (isset($_GET['exp_id'])) {
    $exp_id = (int) $_GET['exp_id'];

    if (delete_money($pdo, $exp_id) && (delete_money($pdo, $exp_id) > 0)) {
        $success = true;
    }
}

require_once 'inc/header.php';
?>
<link rel="stylesheet" href="assets/css/style2.css">
<div class="pt-5">
    <a href="userlist.php"><input class="btn btn-primary" type="button" value="Retour"></a>
</div>

<div class="container pt-5">

    <table class="table table-striped table-hover text-center table-dark table-bordered">
        <thead>
            <tr>
                <th>Revenu</th>
                <th>Dépense</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utils as $util) : ?>
                <tr>
                    <td><?= $util['inc_amount'] ?></td>
                    <td><?= $util['exp_amount'] ?></td>
                    <td><a href="?exp_id=<?= $deletes['exp_id'] ?>"><i class="fas fa-trash text-danger"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require_once __DIR__ . '/inc/footer.php';
