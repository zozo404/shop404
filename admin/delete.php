<?php
require("../config/commandesName.php");
$Name = getName('$pseudo');
session_start();

// double vérification 1. si elle existe mais c'est faux -> redirection 2. si elle existe mais c'est vide -> redirection
if (!isset($_SESSION['zozoy001']) || empty($_SESSION['zozoy001'])) {
  header("Location: ../login.php");
}
// on exige le ficher commande
require("../config/commandes.php");
$Produits = afficher();


if (isset($_POST['valider'])) {

  if (isset($_POST['idproduit'])) {

    // on verifite avant de faire la methode post si tous les champs ne sont pas vides et qu'ils sont des caractères numériques
    if (!empty($_POST['idproduit']) and is_numeric($_POST['idproduit'])) {

      $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));

      try {
        supprimer($idproduit);
      } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage() . "<br>";
      }
      header('Location: delete.php');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop 404 - Supprimer</title>
  <link rel="icon" type="image/x-icon" href="../imgs/ballon-dor.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />


</head>

<body class="bg-gray-700">
  <nav class=" border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900 sticky top-0">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
      <a href="../index.php" class="flex items-center">
        <img src="../imgs/ballon-dor.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Shop 404</span>
      </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
        </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto lg:flex lg:items-center lg:gap-12" id="navbar-default">
        <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="index.php" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Home</a>
          </li>
          <li>
            <a href="index.php" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Ajouter</a>
          </li>
          <li>
            <a href="delete.php" class="block py-2 pr-4 pl-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Supprimer</a>
          </li>
          <li>
            <a href="afficher.php" class="block py-2 pr-4 pl-3 text-gray-700 dark:text-gray-400 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Produits</a>
          </li>
          <li>
            <a href="editer.php" class="block py-2 pr-4 pl-3 text-gray-700 dark:text-gray-400 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Editer</a>
          </li>
          <li>
            <a href="deconnexion.php" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Se déconnecter</a>
          </li>
        </ul>
        <?php foreach ($Name as $pseudo) : ?>
          <p class="text-white">Bienvenue <?= $pseudo->pseudo ?></p>
        <?php endforeach ?>
      </div>
    </div>
  </nav>

  <div>
    <form class="mt-4" method="POST">
      <div class="flex flex-col items-center justify-center lg:justify-start">
        <!-- id du produit input -->
        <div class="mb-6">
          <input type="number" class="block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="idproduit" placeholder="Identifiant du produit" />
        </div>

        <div class="text-center">
          <button type="submit" name="valider" class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
            Supprimer le produit
          </button>
        </div>
    </form>
  </div>
  <div class="flex flex-wrap lg:flex-row items-center mt-5 gap-2 justify-center">
    <!-- card des produits et debut boucle-->
    <?php foreach ($Produits as $produit) : ?>
      <div class="w-60 max-h-80 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 mt-2">
        <div class="flex justify-center">
          <img class="w-11/12" src="../imgs/<?= $produit->image ?>" alt="<?= $produit->alt ?>" />
        </div>
        <div class="p-5">
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $produit->nom ?></h5>
          <p class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">id: <?= $produit->id ?></p>
          <div class="flex justify-between items-center py-2 px-3 text-sm font-medium text-center text-white">

          </div>
        </div>
      </div>

    <?php endforeach ?>
    <!-- fin boucle -->
  </div>
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</body>

</html>