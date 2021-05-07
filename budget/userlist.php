<?php
require_once __DIR__ . '/librairies/database.php';
require 'functions.php';
$pdo = db_connect();
$users = users_list($pdo);
$error = [];
require_once 'inc/header.php';
?>
<link rel="stylesheet" href="assets/css/style2.css">
<div class="container pt-5">
    <table class="table table-striped table-hover text-center table-dark table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['user_id'] ?></td>
                    <td><a href="user.php?user_id=<?= $user['user_id'] ?>"><?= $user['first_name'] ?></a></td>
                    <td><?= $user['last_name'] ?></td>
                    <td><?= $user['birth_date'] ?></td>
                    <td><a href="usermodif.php?user_id=<?= $user['user_id'] ?>"><i class="far fa-edit"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="wrapper">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="title text-center text-white mb-5">
            <h1>Votre budget</h1>
        </div>
        <div class="chart-wrapper">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets/js/script.js"></script>


<?php require_once __DIR__ . '/inc/footer.php';
