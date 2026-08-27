```blade
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Nouveau message</title>
</head>

<body>

    <h2>Nouveau message depuis votre portfolio</h2>

    <p>
        <strong>Nom :</strong> {{ $nom }}
    </p>

    <p>
        <strong>Email :</strong> {{ $email }}
    </p>

    <p>
        <strong>Sujet :</strong> {{ $sujet ?: 'Aucun sujet' }}
    </p>

    <hr>

    <p>
        <strong>Message :</strong>
    </p>

    <p>
        {{ $contenu }}
    </p>

    <hr>

    <p>
        Vous avez reçu ce message depuis le formulaire de contact
        de votre portfolio.
    </p>

</body>

</html>
```
