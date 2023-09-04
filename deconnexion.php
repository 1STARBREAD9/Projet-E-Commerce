<?php
session_start();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion ou une autre page appropriée
header("Location: index.php");
exit();
?>
