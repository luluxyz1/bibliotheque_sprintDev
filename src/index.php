<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new mysqli($servername, $username, $password);
  echo "Connected successfully";
} catch (Exception $e) {
  echo "Connection failed: " . $e->getMessage();
}
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

</body>

</html>