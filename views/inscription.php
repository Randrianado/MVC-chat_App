<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Inscription</title>
</head>
<body>
    <form  action="../Controllers/userController.php?action=inscription" method="post" class="container Form_inscri">
                <h1> Inscrivez-vous! </h1>
                <label for="email">Nom d'utilisateur:</label>
                <input type="text" name="username"required>
                <label for="password">Mot de passe:</label>
                <input type="password" name="password" required>
                <button type="submit">s'inscrire</button>
    </form>
</body>
</html>