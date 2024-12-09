<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  die();
}

require_once('includes/dbh.inc.php');




$query_products = "SELECT id_livre, nom_livre, auteur_livre, annee_livre, tome_livre, genre_livre, etat_livre FROM livre";
$stmt_products = $pdo->query($query_products);
$products = $stmt_products->fetchAll();


// Lister tous les genres dispo dans la base de données

$query_genres = "SELECT nom FROM genre";
$stmt_genres = $pdo->query($query_genres);
$genres = $stmt_genres->fetchAll(PDO::FETCH_COLUMN, 0);
$genres = array_unique($genres);


?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="output.css" rel="stylesheet">
  <link src="output.js" rel="script">
  <title>Gestion des livres - Bibliothèque</title>
</head>

<body>

  <div class="flex-col flex justify-center items-center">
    <h1 class="text-4xl"> Bibliothèque </h1><br>
    <a href="logout.php" class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade">Déconnexion</a>
    <h1 class="text-2xl"> Ajouter un livre </h1>
  </div>


  <div class="flex justify-center items-center">
    <form class="flex-col flex w-64" action="includes/add_book.inc.php" method="post">
      <input placeholder="Titre du livre" class="border-black border-2 m-1" type="text" name="nom_livre" id="nom_livre">
      <input placeholder="Auteur du livre" class="border-black border-2 m-1" type="text" name="auteur_livre" id="auteur_livre">
      <input placeholder="Année du livre" class="border-black border-2 m-1" type="number" name="annee_livre" id="annee_livre">
      <input placeholder="Tome du livre" class="border-black border-2 m-1" type="number" name="tome_livre" id="tome_livre" min="1">
      <select placeholder="Genre du livre" class="border-black border-2 m-1" name="genre_livre" id="genre_livre">
        <?php foreach ($genres as $genre) : ?>
          <option value="<?= $genre ?>"><?= $genre ?></option>
        <?php endforeach; ?>
      </select>
      <select placeholder="Etat du livre" class="border-black border-2 m-1" name="etat_livre" id="etat_livre">
        <option value="Disponible">Disponible</option>
        <option value="Réservé">Réservé</option>
        <option value="Indisponible">Indisponible</option>
      </select>

      <button class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">Ajouter le livre</button>
    </form>
  </div>

  <div class="flex justify-center items-center">
    <table class="flex-col border-2 border-black justify-center items-center">
      <thead>
        <tr class="border-black border-2 ">
          <th>Id</th>
          <th>Titre</th>
          <th>Auteur</th>
          <th>Année</th>
          <th>Tome</th>
          <th>Genre</th>
          <th>Etat</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product) : ?>
          <tr>
            <td><input class="border-2 BORDER-black" type="text" name="id_livre" value="<?= $product["id_livre"] ?>"></td>
            <td><input class="border-2 BORDER-black" type="text" name="nom_livre" value="<?= $product["nom_livre"] ?>"></td>
            <td><input class="border-2 BORDER-black" type="text" name="auteur_livre" value="<?= $product["auteur_livre"] ?>"></td>
            <td><input class="border-2 BORDER-black" type="text" name="annee_livre" value="<?= $product["annee_livre"] ?>"></td>
            <td><input class="border-2 BORDER-black" type="text" name="tome_livre" value="<?= $product["tome_livre"] ?>" min="1"></td>
            <td><input class="border-2 BORDER-black" type="text" name="genre_livre" value="<?= $product["genre_livre"] ?>"></td>
            <td><input class="border-2 BORDER-black" type="text" name="etat_livre" value="<?= $product["etat_livre"] ?>"></td>
            <td class="flex justify-center items-center">
              <form action="includes/delete_book.inc.php" method="post">
                <input type="hidden" name="id_livre" value="<?= $product["id_livre"] ?>">
                <button class="bg-red-600 border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">Supprimer</button>
              </form>
              <form action="includes/update_book.inc.php" method="post">
                <input type="hidden" name="id_livre" value="<?= $product["id_livre"] ?>">
                <button class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">Modifier</button>
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