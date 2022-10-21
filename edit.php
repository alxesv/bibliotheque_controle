<?php
require_once 'init.php';
$livre_id = $_GET['id'];
$livreStatement = $db->prepare("SELECT livre.*, auteur.nom as 'auteur', categorie.id as 'cat_id', auteur.id as 'auteur_id' from livre INNER JOIN auteur ON livre.auteur_id = auteur.id INNER JOIN livre_cat ON livre_cat.id_livre = livre.id
INNER JOIN categorie ON categorie.id = livre_cat.id_categorie WHERE livre.id = $livre_id");
$livreStatement->execute();
$livre = $livreStatement->fetchAll();

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
    <title>Modifier</title>
    <link rel="stylesheet" href="assets/css/edit.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <main>
        <h1 class="main_title">Modifier <?=$livre[0]['titre']?></h1>
        <a href="livres.php" class="retour">Retour</a>
        <section>
            <form action="edit_form.php" method="POST" class="edit_form">

                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" value="<?=$livre[0]['titre']?>" required>

                <label for="synopsis">Synopsis :</label>
                <textarea type="text" name="synopsis" id="synopsis" required><?=$livre[0]['synopsis']?></textarea>

                <label for="auteur">Auteur :</label>
                <select name="auteur" id="auteur" required>
                <?php foreach ($author as $akey => $avalue){?>
                    <option value="<?=$avalue['id']?>" <?php if($avalue['id'] == $livre[0]['auteur_id']){ echo "selected"; } ?>><?=$avalue['nom']?></option>
                <?php };
                ?>
                <option value="new_auteur">Autre</option>
                <input type="text" name="new_auteur" id="new_auteur" class="disabled" placeholder="Nom de l'auteur">


                </select>
                <label for="cat">Catégorie :</label>
                <select name="cat" id="cat" required>
                <?php foreach ($categorie as $ckey => $cvalue){?>
                    <option value="<?=$cvalue['id']?>" <?php if($cvalue['id'] == $livre[0]['cat_id']){ echo "selected"; } ?>><?=$cvalue['libelle']?></option>
                <?php }
                ?>
                </select>
                <input type="hidden" name="book_id" value="<?=$livre_id?>">
                <input type="submit" value ="Modifier" name="edit"  class="submitButton">
            </form>
        </section>
    </main>
    <script>
        const select = document.getElementById('auteur');
        select.addEventListener('change', function () {
        if(select.value == "new_auteur"){
            document.getElementById('new_auteur').classList.remove('disabled');
            document.getElementById('new_auteur').setAttribute("required", "");
        }else{
            document.getElementById('new_auteur').classList.add('disabled');
            document.getElementById('new_auteur').removeAttribute("required");
        }
        })
    </script>
</body>
</html>