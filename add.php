<?php
require_once 'init.php';

$catStatement = $db->prepare("SELECT * from categorie");
$catStatement->execute();
$categorie = $catStatement->fetchAll();

$authStatement = $db->prepare("SELECT * from auteur");
$authStatement->execute();
$author = $authStatement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    <link rel="stylesheet" href="assets/css/edit.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <h1 class="main_title">Ajouter un livre</h1>
<a href="livres.php" class="retour">Retour</a>
<section>
            <form action="add_form.php" method="POST" class="edit_form">

                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" required>

                <label for="synopsis">Synopsis :</label>
                <textarea type="text" name="synopsis" id="synopsis" required></textarea>

                <label for="auteur">Auteur :</label>
                <select name="auteur" id="auteur" required>
                <?php foreach ($author as $akey => $avalue){?>
                    <option value="<?=$avalue['id']?>"><?=$avalue['nom']?></option>
                <?php };
                ?>
                <option value="new_auteur" selected>Nouveau</option>
                <input type="text" name="new_auteur" id="new_auteur" class="" placeholder="Nom de l'auteur" required>


                </select>
                <label for="cat">Catégorie :</label>
                <select name="cat" id="cat" required>
                    <option value="" selected disabled hidde >Choisissez votre catégorie</option>
                <?php foreach ($categorie as $ckey => $cvalue){?>
                    <option value="<?=$cvalue['id']?>"><?=$cvalue['libelle']?></option>
                <?php }
                ?>
                </select>
                <input type="submit" value ="Ajouter" class="submitButton" name="add">
            </form>
        </section>
        <script>
        const select = document.getElementById('auteur');
        select.addEventListener('change', function () {
        if(select.value == "new_auteur"){
            document.getElementById('new_auteur').classList.remove('disabled');
            document.getElementById('new_auteur').setAttribute("required", "");

        }else{
            document.getElementById('new_auteur').classList.add('disabled');
            document.getElementById('new_auteur').removeAttribute("required")
        }
        })
    </script>
</body>
</html>