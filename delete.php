<?php
session_start(); // Démarrez la session si ce n'est pas déjà fait
require 'core/class/contact.php';

if (isset($_SERVER['HTTP_REFERER'])) {
    $_SESSION['previous_url'] = $_SERVER['HTTP_REFERER'];
} else {
    // Par défaut, si l'URL précédente n'est pas disponible, redirigez vers une URL par défaut.
    $_SESSION['previous_url'] = 'index.php';
}

if (isset($_GET['idContact'])) {
    Contact::deleteContact($_GET['idContact']);
    header('Location: ' . $_SESSION['previous_url']);
}

?>