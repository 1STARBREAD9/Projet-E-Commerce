<?php
require_once("db.php");

if (isset($_POST['submit'])) {
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $email = $_POST['email'];
    $motDePasse = $_POST['password'];

    if (empty($nom) || empty($prenom) || empty($email) || empty($motDePasse)) {
        echo "Veuillez remplir tous les champs du formulaire.";
    } else {
    
    
     
   // Vérification de l'existence de l'enregistrement
    // Préparer et exécuter la requête de vérification
    $sql = "CALL Verifutilisateur(?)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("1", $_POST['email'], PDO::PARAM_STR); // "s" indique que la valeur est une chaîne de caractères
    // Exécution de la requête préparée
    $stmt->execute();
    // Vérifier si l'utilisateur existe déjà
    if ($stmt->rowCount() > 0) {
        echo "L'utilisateur avec cet email existe déjà.";
        exit;
    }
    
    // Hash du mot de passe
    $motDePasseHash = password_hash($motDePasse, PASSWORD_BCRYPT);

    // Insertion des données
    $sql = "INSERT INTO utilisateur (Prenom, Nom, Email, pdw) VALUES (:prenom, :nom, :email, :motDePasse)";
    echo $sql;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':motDePasse', $motDePasseHash);
    $stmt->execute();


    // Redirection vers une page de succès ou un autre traitement
    header("Location: PageConfirmation.php");
    exit;
}
} else {
    header("Location: InscriptionPage.php");
    exit;
}

$conn = null;
?>
