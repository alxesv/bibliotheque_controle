<?phP
require_once 'init.php';
// Selection pour remplir le tableau
$sql = "SELECT livre.titre as 'Titre', livre.synopsis as 'Synopsis', auteur.nom as 'Auteur', categorie.libelle as 'Catégorie', livre.id as 'id' FROM livre
INNER JOIN auteur ON livre.auteur_id = auteur.id
INNER JOIN livre_cat ON livre_cat.id_livre = livre.id
INNER JOIN categorie ON categorie.id = livre_cat.id_categorie
ORDER BY livre.titre";
$biblStatement = $db->prepare($sql);
$biblStatement->execute();
$biblio = $biblStatement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <h1 class='main_title'>Bibliothèque</h1>
    <a href="add.php" class ="addBook">Ajouter un livre !</a>

    <section class="bibl_section">
        <table class="bibl_table">
            <thead>
                <th>Titre</th>
                <th>Synopsis</th>
                <th>Auteur</th>
                <th>Catégorie</th>
            </thead>
            <tbody>
                <?php
                foreach ($biblio as $bkey => $bvalue){ ?>
                <tr>
                    <td><?=$bvalue['Titre']?></td>
                    <td><?=$bvalue['Synopsis']?></td>
                    <td><?=$bvalue['Auteur']?></td>
                    <td><?=$bvalue['Catégorie']?></td>
                    <td><a href="edit.php?id=<?=$bvalue['id']?>">Modifier</a></td>
                    <td><form method="POST" action ="delete.php"><input type="hidden" name="book_id" value="<?=$bvalue['id']?>"><input type="submit" name="delete" value="Supprimer" class="deleteButton"></form></td>
                <tr>
                <?php  
                }
                ?>
            </tbody>
        </table>
    </section>

</body>
</html>