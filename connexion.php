<?php
session_start();

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez les informations de connexion
    $username = $_POST["nom"];
    $password = $_POST["password"];

    // Connexion à la base de données (remplacez les paramètres par les vôtres)
    $servername = "localhost";
    $username = "votre_nom_utilisateur";
    $password = "votre_mot_de_passe";
    $dbname = "taxi";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    // Vérifiez les informations de connexion dans la base de données
    $sql = "SELECT * FROM utilisateur WHERE NOM_USER='$username' AND MDP_USER='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Démarrez une session et enregistrez le nom d'utilisateur
        $_SESSION["loggedin"] = true;
        $_SESSION["nom"] = $username;
        header("location: index.php"); // Redirigez l'utilisateur vers la page d'accueil
    } else {
        // Affichez un message d'erreur si les informations de connexion sont incorrectes
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

    // Fermer la connexion
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Connexion</h1>
        <nav>
            <ul>
                <li><a href="index.html #header">Accueil</a></li>
                <li><a href="index.html #contact">Contact</a></li>
                <li><a href="index.html #flotte">Flotte</a></li>
                <li><a href="index.html #services">Services</a></li>
                <li><a href="reservation.php">Réserver un taxi</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="gestion_utilisateur.php">Gérer un utilisateur</a></li>
            </ul>
        </nav>
    </header>
    <h2>Connexion</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nom">Nom d'utilisateur :</label>
        <input type="text" name="nom" id="nom">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>