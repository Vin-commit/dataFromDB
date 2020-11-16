﻿<?php
  include("./exit.php");
php?>

<!doctype html>
<html>
  <head>
    <title>Page de test de lecture en base de données</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex" />
    <link rel="icon" href="/Images/favicon.ico" />
    <link href="/style.css" rel="stylesheet" media="all" type="text/css">
  </head>
  <body>
    <?php

      // Définition des variables de connexion à la base MySQL :
      $host="********";
      $username_to_db="********";
      $password_to_db="********";
      $database_name="********";
      $table="********";

      // Connexion et sélection de la base
      $link = mysql_connect($host, $username_to_db, $password_to_db) or die ('Impossible de se connecter. ' . mysql_error());
      echo "Connected successfully to read some datas.\n\n";
      mysql_select_db ($database_name) or die ('Impossible de sélectionner la base de données');

      // Exécution des requêtes SQL
      $query = "SELECT * FROM " . $table;
      $result = mysql_query($query) or die('Échec de la requête : ' . mysql_error());


      // Affichage des résultats en HTML
        // Check ahead, before using it
        if (mysql_num_rows($result) > 0) {
          // Printing results in HTML
          echo "  <table border =\"1\" cellspacing=\"0\">";
          while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo "\t\t\n    <tr>";
            foreach ($line as $col_value) {
              echo "<td>Valeur stockée : <br><b>$col_value</b></td>";
	    }
            echo "</tr>";
          }
          echo "\n  </table>\n";
        }

      // Libération des résultats
      mysql_free_result($result);

      // Fermeture de la connexion
      mysql_close($link);

    php?>
    <p class=src><a href="/FichiersTexte/dataFromDB.txt">source php de la page</a></p>
  </body>
</html>
