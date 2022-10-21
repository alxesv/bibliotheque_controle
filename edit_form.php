<?php
require_once 'init.php';
if(isset($_POST['edit'])){
    $book_id = $_POST['book_id'];
    $title = '"' . $_POST['titre'] . '"';
    $syno = '"' . $_POST['synopsis'] . '"';
    $auteur = $_POST['auteur'];
    if(isset($_POST['new_auteur'])){
    $new_auteur = '"' . $_POST['new_auteur'] . '"';
    }
    $categorie = $_POST['cat'];
    
    if($_POST['auteur'] == 'new_auteur'){
        $insertAuthorStatement = $db->prepare("INSERT into auteur (`nom`) VALUES ($new_auteur)");
        $insertAuthorStatement->execute();
        $finalAuteurStatement = $db->prepare("SELECT id FROM auteur WHERE nom = $new_auteur");
        $finalAuteurStatement->execute();
        $finalAuteurArray = $finalAuteurStatement->fetchAll();
        $finalAuteur = $finalAuteurArray[0]['id'];
    }else{
        $finalAuteur = $auteur;
    }

    $updateLivreStatement = $db->prepare("UPDATE livre SET titre = $title, synopsis = $syno, auteur_id = $finalAuteur WHERE id = $book_id");
    $updateLivreStatement->execute();

    $updateCatStatement = $db->prepare("UPDATE livre_cat SET id_categorie = $categorie WHERE id_livre = $book_id");
    $updateCatStatement->execute();

    header('Location:livres.php');
}

?>