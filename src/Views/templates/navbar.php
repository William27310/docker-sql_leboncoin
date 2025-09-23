<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person" />
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <nav class="navigateur_un d-flex align-items-center justify-content-between p-2">
        <p class="fw-bold fs-2 m-0">
            <a href="index.php?url=home" class="text-decoration-none text-white Titre">Le Bon Coin</a>
        </p>

        <div class="d-flex gap-2">
            <button type="button" class="btn btn-warning"><a href="index.php?url=create" class="text-decoration-none text-white">Déposer une annonce</a></button>
            <a href="index.php?url=profil" type="button" class="text-decoration-none text-white btn btn-warning d-flex flex-column align-items-center">
                <span class="material-symbols-outlined">person</span>
                <small>Profil</small>
            </a>
        </div>
    </nav>

    <nav class="bg-warning p-2">
        <div class="d-flex justify-content-around">
            <button type="button" class="btn btn-outline-light"><a class="text-decoration-none text-white" href="index.php?url=register">S'inscrire</a></button>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" aria-label="Search" />
                <button class="btn btn-outline-light text-white" type="submit">Rechercher</button>
            </form>
            <button type="button" class=" btn btn-outline-light"><a class="text-decoration-none text-white" href="index.php?url=login">Se connecter</a></button>
        </div>
    </nav>

</body>

</html>