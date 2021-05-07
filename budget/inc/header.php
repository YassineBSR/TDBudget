<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <title><?= $title ?></title>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
  <h1 class="text-center text-white">My Budget</h1>
  <nav class="navbar navbar-expand-sm bg-dark  justify-content-center">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link text-danger" href="taxreturn.php"><button class="btn btn-outline-warning">Déclaration de revenu</button> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="statdepense.php"><button class="btn btn-outline-warning"> Déclaration de dépense</button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="userlist.php"><button class="btn btn-outline-warning">Liste d'utilisateurs</button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="adduser.php"><button class="btn btn-outline-warning">Ajout d'utilisateurs</button></a>
      </li>
    </ul>
  </nav>