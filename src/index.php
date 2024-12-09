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
  <link href="output.css" rel="stylesheet">
</head>

<body class="bg-red-600 flex-col justify-center items-center">
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


    <div class="flex items-center px-8 justify-center w-full  ">
      <div class="flex-col">
        <form action="includes/add_book.inc.php" method="post">
          <div class="flex-col">
            <label for="nom_livre">Nom du livre</label>
            <input type="text" name="nom_livre" id="nom_livre" required>
          </div>
          <div class="flex-col">
            <label for="auteur_livre">Auteur du livre</label>
            <input type="text" name="auteur_livre" id="auteur_livre" required>
          </div>
          <div class="flex-col">
            <label for="annee_livre">Année du livre</label>
            <input type="number" name="annee_livre" id="annee_livre" required>
          </div>
          <div class="flex-col">
            <label for="tome_livre">Tome du livre</label>
            <input type="number" name="tome_livre" id="tome_livre" required>
          </div>
          <div class="flex-col">
            <label for="genre_livre">Genre du livre</label>
            <input type="text" name="genre_livre" id="genre_livre" required>
          </div>
          <div class="flex-col">
            <label for="etat_livre">Etat du livre</label>
            <form action="includes/add_book.inc.php" method="post">
              <input class="border-black" list="etat" name="etat_livre" id="etat_livre">
              <select name="etat_livre" id="etat_livre">
                <option value="Disponible">Disponible</option>
                <option value="Réservé">Réservé</option>
                <option value="Indisponible">Indisponible</option>

              </select>
          </div>
          <div class="flex-col">
            <button type="submit" name="add_book">Ajouter le livre</button>
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
        <tr class="mx-4 px-16">
          <td><?= $product['id_livre'] ?></td>
          <td><?= $product['nom_livre'] ?></td>
          <td><?= $product['auteur_livre'] ?></td>
          <td><?= $product['annee_livre'] ?></td>
          <td><?= $product['tome_livre'] ?></td>
          <td><?= $product['genre_livre'] ?></td>
          <td><?= $product['etat_livre'] ?></td>
          <form action="includes/delete_book.inc.php" method="post">
            <input type="hidden" name="id_livre" value="<?= $product['id_livre'] ?>">

            <button type="submit" name="delete_book">Supprimer</button>
          </form>
        </tr>
        </form>
      <?php endforeach; ?>
    </table>
  </div>

</body>

</html>