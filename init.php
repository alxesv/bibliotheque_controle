<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', 'On');
*/
try {
    $db = new PDO(
        'mysql:host=localhost;dbname=bibliotheque;charset=utf8',
        'root',
        'root'
    );
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
?>