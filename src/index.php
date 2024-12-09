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
  <link src="output.js" rel="script">
</head>

<body>

  <h1 class="text-4xl"> Bibliothèque </h1>
  <h1 class="text-2xl"> Ajouter un livre </h1>
  <div class="flex">
    <form class="flex-col flex w-64" action="includes/add_book.inc.php" method="post">
      <input placeholder="Titre du livre" class="border-black border-2 m-1" type="text" name="nom_livre" id="nom_livre" required>
      <input placeholder="Auteur du livre" class="border-black border-2 m-1" type="text" name="auteur_livre" id="auteur_livre" required>
      <input placeholder="Année du livre" class="border-black border-2 m-1" type="number" name="annee_livre" id="annee_livre" required>
      <input placeholder="Tome du livre" class="border-black border-2 m-1" type="number" name="tome_livre" id="tome_livre" required>
      <input placeholder="Genre du livre" class="border-black border-2 m-1" type="text" name="genre_livre" id="genre_livre" required>
      <select placeholder="Etat du livre" class="border-black border-2 m-1" name="etat_livre" id="etat_livre" required>
        <option value="Disponible">Disponible</option>
        <option value="Réservé">Réservé</option>
        <option value="Indisponible">Indisponible</option>
      </select>
      <button class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">Ajouter</button>
  </div>

  <div class="w-full">
    <table class="w-1/2 flex-col justify-center items-center">
      <thead class="w-full">
        <tr class="border-black border-2 w-full ">
          <th class="w-full">Titre</th>
          <th class="w-full">Auteur</th>
          <th class="w-full">Année</th>
          <th class="w-full">Tome</th>
          <th class="w-full">Genre</th>
          <th class="w-full">Etat</th>
          <th class="w-full">Actions</th>
        </tr>
      </thead>
      <tbody class="w-full">
        <?php foreach ($products as $product) : ?>
          <tr class="flex ">
            <td class="border-black border-2 "><?= $product['nom_livre'] ?></td>
            <td class="border-black border-2 "><?= $product['auteur_livre'] ?></td>
            <td class="border-black border-2 "><?= $product['annee_livre'] ?></td>
            <td class="border-black border-2 "><?= $product['tome_livre'] ?></td>
            <td class="border-black border-2 "><?= $product['genre_livre'] ?></td>
            <td class="border-black border-2 "><?= $product['etat_livre'] ?></td>
            <td class="border-black border-2 ">
              <form action="includes/delete_book.inc.php" method="post">
                <input type="hidden" name="id_livre" value="<?= $product['id_livre'] ?>">
                <button type="submit">Supprimer</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>

    </table>
  </div>


</body>
<script src="output.js"></script>

</html>