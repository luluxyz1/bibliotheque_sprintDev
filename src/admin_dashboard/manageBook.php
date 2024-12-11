<?php

require_once "../includes/dbh.inc.php";
require_once "../includes/config_session.inc.php";
require_once "../includes/admin/signup_view.inc.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["admin_username"])) {
  header("location: ../index.php");
  exit;
}


$products = $pdo->query("SELECT * FROM livre")->fetchAll();
$genres = $pdo->query("SELECT DISTINCT nom FROM genre")->fetchAll(PDO::FETCH_COLUMN);

$query_users = $pdo->query("SELECT id_user FROM users")->fetchAll();

$query_etat = $pdo->query("SELECT etat_livre FROM livre")->fetchAll();
$etats = array_unique(array_column($query_etat, "etat"));
?>


<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <link src="../output.js" rel="script">
  <title>Gestion des livres - Bibliothèque</title>
</head>

<body>

  <div class="flex flex-row bg-yellow-200 h-24 w-full">
    <div class="flex flex-col px-6">
      <h1 class="flex text-2xl py-3 underline font-bold ">Bibliothèque</h1>
      <h4 class="font-normal">Dashboard (Admin)</h4>
    </div>
    <div class="flex flex-row justify-center items-center mx-6">
      <a href="../admin_dashboard.php" class="hover:font-bold underline">Accueil</a>

    </div>

    <div class="flex flex-col justify-center mx-6 items-center">
      <a class="text-black hover:font-semibold hover:underline" href="manageBook.php">Livres</a>
    </div>

    <div class="flex justify-end items-center w-full mx-6">
      <div class="flex flex-col">
        <p class="font-thin">Bonjour, <?php echo $_SESSION['admin_username']; ?></p>
        <form class="flex justify-end" action="../includes/logout.inc.php" method="post">
          <button type="submit" class="hover:font-bold underline">Se déconnecter</button>
        </form>

      </div>
    </div>



  </div>


  <div class="flex-col flex justify-center items-center">
    <h1 class="text-4xl"> Bibliothèque </h1><br>

    <h1 class="text-2xl"> Ajouter un livre </h1>
  </div>


  <div class="flex flex-col justify-center items-center">
    <form class="flex-col flex w-64" action="../includes/add_book.inc.php" method="post">
      <input placeholder="Titre du livre" class="border-black border-2 m-1" type="text" name="nom_livre" id="nom_livre" required>
      <input placeholder="Auteur du livre" class="border-black border-2 m-1" type="text" name="auteur_livre" id="auteur_livre" required>
      <input placeholder="Année du livre" class="border-black border-2 m-1" type="number" name="annee_livre" id="annee_livre" required>
      <input placeholder="Tome du livre" class="border-black border-2 m-1" type="number" name="tome_livre" id="tome_livre" min="1" required>
      <select placeholder="Genre du livre" class="border-black border-2 m-1" name="genre_livre" id="genre_livre" required>
        <?php foreach ($genres as $genre) : ?>
          <option value="<?= $genre ?>"><?= $genre ?></option>
        <?php endforeach; ?>
      </select>
      <select placeholder="Etat du livre" class="border-black border-2 m-1" name="etat_livre" id="etat_livre" required>
        <option value="Disponible">Disponible</option>
        <option value="Indisponible">Indisponible</option>
        <option value="Reserve">Réservé</option>
      </select>

      <button class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">Ajouter le livre</button>
    </form>
    <?php if (isset($_SESSION['book_exists'])) : ?>
      <div class="flex justify-center items-center">
        <p class="text-red-600"><?= $_SESSION['book_exists'] ?></p>
      </div>
      <?php unset($_SESSION['book_exists']); ?>
    <?php endif; ?>
  </div>

  <div class="flex justify-center items-center">
    <table class="flex-col border-2 border-black justify-center items-center">
      <thead>
        <tr class="border-black border-2 ">
          <th>ID</th>
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
            <form action="../includes/update_book.inc.php" method="post">
              <td><input class="border-2 " type="text" name="id_livre" value="<?= $product["id_livre"] ?>" readonly></td>
              <td><input class="border-2 " type="text" name="nom_livre" value="<?= $product["nom_livre"] ?>" required></td>
              <td><input class="border-2 " type="text" name="auteur_livre" value="<?= $product["auteur_livre"] ?>" required></td>
              <td><input class="border-2 " type="text" name="annee_livre" value="<?= $product["annee_livre"] ?>" required></td>
              <td><input class="border-2 " type="text" name="tome_livre" value="<?= $product["tome_livre"] ?>" min="1" required></td>
              <td><select class="border-2" name="genre_livre" required>
                  <?php foreach ($genres as $genre) : ?>
                    <option value="<?= $genre ?>" <?= $product["genre_livre"] === $genre ? "selected" : "" ?>><?= $genre ?></option>
                  <?php endforeach; ?>
                </select>
              </td>
              <td>
                <input class="border-2 BORDER-black" type="text" name="etat_livre" value="<?= $product["etat_livre"] ?>" required>
              </td>
              <td>
                <input type="hidden" name="id_livre" value="<?= $product["id_livre"] ?>">
                <button class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">Modifier</button>
              </td>
            </form>
            <td class="flex justify-center items-center">
              <form action="../includes/delete_book.inc.php" method="post">
                <input type="hidden" name="id_livre" value="<?= $product["id_livre"] ?>">
                <button class="bg-red-600 border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">Supprimer</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>

    </table>
  </div>


</body>
<script src="../output.js"></script>

</html>