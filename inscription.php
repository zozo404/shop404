<?php
session_start();
// on inclut le fichier commandes avec un include
include "config/commandes.php";

// inscription
if (isset($_POST['valider'])) {

  if (isset($_POST['email']) and isset($_POST['password'])) {

    // on verifite avant de faire la methode post si tous les champs ne sont pas vides
    if (!empty($_POST['email']) and !empty($_POST['password'])) {

      $email = htmlspecialchars(strip_tags($_POST['email'], FILTER_VALIDATE_EMAIL));
      $password = password_hash(strip_tags($_POST['password']), PASSWORD_BCRYPT);
      try {
        addUser($email, $password);
      } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage() . "<br>";
      }
    }
  }
}
// fin inscription
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Shop 404</title>
  <link rel="icon" type="image/x-icon" href="imgs/ballon-dor.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />


</head>

<body class="bg-gray-700">
  <nav class=" border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900 sticky top-0">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
      <a href="index.php" class="flex items-center">
        <img src="imgs/ballon-dor.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
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
        </ul>
      </div>
    </div>
  </nav>
  <h1 class="text-center text-gray-300 text-6xl pt-4" style="font-family: 'Shadows Into Light', cursive;">M'inscrire</h1>
  <form class="mt-4" method="POST">
    <div class="flex flex-col items-center justify-center lg:justify-start">
      <!-- email input -->
      <div class="mb-6">
        <input type="email" class="block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="email" placeholder="Email" />
      </div>
      <!-- password input -->
      <div class="mb-6">
        <input type="password" class="block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="password" placeholder="Mot de passe" />
      </div>

      <div class="text-center pb-8">
        <!-- voir si button à la place de input fonctionne -->
        <input type="submit" name="valider" value="M'inscrire" class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" />
      </div>
  </form>
  <p class="text-gray-300">Si vous avez un compte, <a href="./login.php" class="text-orange-500">Connectez-vous ici !</a></p>
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

</body>

</html>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap');
</style>