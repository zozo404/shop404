<?php
require("../config/commandes.php");
$Produits=afficher();
require("../config/commandesName.php");
$Name=getName('$pseudo');
session_start();

// double vérification 1. si elle existe mais c'est faux -> redirection 2. si elle existe mais c'est vide -> redirection
if(!isset($_SESSION['zozoy001'])){
  header("Location: ../login.php");
}
if(empty($_SESSION['zozoy001'])){
  header("Location: ../login.php");
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop 404 - Produits</title>
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
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="hidden w-full md:block md:w-auto lg:flex lg:items-center lg:gap-12" id="navbar-default">
                <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                    <a href="../index.php" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Home</a>
                    </li>
                    <li>
                    <a href="index.php" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Ajouter</a>
                    </li>
                    <li>
                    <a href="delete.php" class="block py-2 pr-4 pl-3  text-gray-700 dark:text-gray-400 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Supprimer</a>
                    </li>
                    <li>
                    <a href="afficher.php" class="block py-2 pr-4 pl-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Produits</a>
                    </li>
                    <li>
                    <a href="deconnexion.php" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Se déconnecter</a>
                    </li>
                </ul>
                <?php foreach($Name as $pseudo): ?>
                <p class="text-white">Bienvenue <?=$pseudo->pseudo ?></p>
                <?php endforeach ?>
            </div>
        </div>
    </nav>
    
    <div class="flex lg:flex-row items-center mt-5 justify-center">
        <table class="table-fixed w-4/5">
            <thead class="text-gray-100 border-b border-slate-500">
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Images</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody class="text-gray-100 text-center ">
                <!-- debut boucle foreach -->
                <?php foreach($Produits as $produit): ?>
                <tr class="border-b border-slate-500">
                    <td><?= $produit->id ?></td>
                    <td><?= $produit->nom ?></td>
                    <td class="flex justify-center py-4"><img src="../imgs/<?= $produit->image ?>" alt="<?= $produit->alt ?>" class="w-36"></td>
                    <td><?= $produit->prix ?> €</td>
                    <td class="text-start"><?=substr($produit->description,0,100);?>...</td>
                    <td class="text-center"><a href="editer.php">Editer</a></td>
                </tr>
                <?php endforeach; ?>
                <!-- fin boucle foreach -->
            </tbody>
        </table>
    </div>
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</body>
</html>