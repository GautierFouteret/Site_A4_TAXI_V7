<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<header>
        <h1>Gestion des utilisateurs</h1>
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

<?php
// Connexion à la base de données
$servername = "localhost";
$username = "nom_utilisateur";
$password = "mot_de_passe";
$dbname = "taxi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérer la liste des utilisateurs
$sql = "SELECT ID_UTILISATEUR, NOM_USER, PRENOM_USER, MDP_USER, COURRIEL_USER FROM utilisateur";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les utilisateurs sous forme de tableau
    echo "<table><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Mot de passe</th><th>Email</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["ID_UTILISATEUR"]."</td><td>".$row["NOM_USER"]."</td><td>".$row["PRENOM_USER"]."</td><td>".$row["MDP_USER"]."</td><td>".$row["COURRIEL_USER"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 résultats";
}

$conn->close();
?>

</body>
</html>
