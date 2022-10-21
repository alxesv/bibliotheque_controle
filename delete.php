<?php
require_once 'init.php';
include 'data_fetch.php';


if(isset($_POST['delete'])){
    $book_id = $_POST['book_id'];
    $deleteStatement = $db->prepare("DELETE FROM livre WHERE id = $book_id;");
    $deleteStatement->execute();

    $catDeleteStatement = $db->prepare("DELETE FROM livre_cat WHERE id_livre = $book_id");
    $catDeleteStatement->execute();
    header('Location:livres.php');
}
?>