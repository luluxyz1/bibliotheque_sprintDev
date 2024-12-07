<?php
session_start();


require_once('includes/dbh.inc.php');

$query_products = "SELECT id_livre, nom_livre, auteur_livre, annee_livre, tome_livre, genre_livre, etat_livre FROM livre";
$stmt_products = $pdo->query($query_products);
$products = $stmt_products->fetchAll();

?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
</head>

<body class=" flex-col justify-center items-center">
  <!-- Titre page -->
  <div class="py-5">
    <h1 class="text-4xl font-bold text-center">
      ADMIN - Bibliothèque
    </h1>
  </div>
  <!-- Boutons -->
  <div class="bg-blue-500 py-5">
    <div class="flex justify-center">
      <h1 class=" font-bold underline text-3xl">
        Ajout des livres
      </h1>
    </div>

    <div class="flex justify-center items-end w-full h-full ">
      <div class="flex items-center px-8 justify-center w-full  ">
        <div class="flex-col">
          <a class="flex justify-center w-48 my-5 bg-green-500 text-white font-bold py-2 px-4 rounded">
            Ajouter un livre
          </a>
          <button class="flex justify-center w-48 my-5 bg-green-500 text-white font-bold py-2 px-4 rounded">
            Supprimer un livre
          </button>
          <button class="flex justify-center w-48 my-5 bg-green-500 text-white font-bold py-2 px-4 rounded">
            Modifier un livre
          </button>
        </div>

      </div>
    </div>

  </div>
  <!-- Liste des livres -->
  <div>
    <p> Liste des livres : </p>
    <table class="flex  justify-center">
      <tr class="mx-4  justify-center bg-red-600">
        <th>Id</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Année</th>
        <th>Tome</th>
        <th>Genre</th>
        <th>Etat</th>
      </tr>
      <?php foreach ($products as $product) : ?>
        <tr class="mx-4 px-16 bg-black">
          <td><?= $product['id_livre'] ?></td>
          <td><?= $product['nom_livre'] ?></td>
          <td><?= $product['auteur_livre'] ?></td>
          <td><?= $product['annee_livre'] ?></td>
          <td><?= $product['tome_livre'] ?></td>
          <td><?= $product['genre_livre'] ?></td>
          <td><?= $product['etat_livre'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>

</body>

</html>