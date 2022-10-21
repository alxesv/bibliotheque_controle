<?php
require_once 'init.php';
if(isset($_POST['add'])){
    $titre = '"' . $_POST['titre'] . '"';
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

    $addStatement = $db->prepare("INSERT INTO livre (`titre`, `synopsis`, `auteur_id`) VALUES ($titre, $syno, $finalAuteur)");
    $addStatement->execute();

    $bookIdStatement = $db->prepare("SELECT id from livre WHERE titre = $titre");
    $bookIdStatement->execute();
    $bookId = $bookIdStatement->fetchAll();
    $book_id = $bookId[0]['id'];

    $catLivreStatement = $db->prepare("INSERT INTO livre_cat (`id_categorie`, `id_livre`) VALUES ($categorie, $book_id)");
    $catLivreStatement->execute();
    header('Location:livres.php');

}
?>