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

    <?php require_once __DIR__ . "/../Views/templates/navbar.php" ?>

    <main>
        <div class="container mt-5 bg-secondary-subtle p-5 rounded">
            <h1 class="mb-5 mt-5">Votre profil</h1>
            <div class="row">
                <p><span class="fw-bold">Mail :</span> <?= $_SESSION['user']['email'] ?></p>
                <p><span class="fw-bold">Nom d'utilisateur :</span> <?= $_SESSION['user']['username'] ?></p>
                <p><span class="fw-bold">Date d'inscription :</span> <?= $_SESSION['user']['inscription'] ?></p>
                <p><span class="fw-bold">Votre ID :</span> <?= $_SESSION['user']['id'] ?></p>

                <div class="col-12 mb-4">
                    <a href="index.php?url=logout" class="btn btn-outline-danger">Se déconnecter</a>
                </div>

                <h4 class="fs-2 mb-5 mt-5">Mes annonces</h4>

                <div class="d-flex justify-content-around flex-wrap">

                    <?php if (!empty($annonces)) : ?>
                        <?php foreach ($annonces as $annonce) : ?>

                            <div class="card mb-4" style="width: 18rem;">
                                <img src="/uploads/<?= ($annonce['a_picture']) ?>" class="card-img-top w-100 h-100 object-fit-contain p-2" alt="...">
                                <div class="card-body">
                                    <p class="card-text"><span class="fw-bold">Titre : </span> <?= ($annonce['a_title']) ?></p>
                                    <p class="card-text"><span class="fw-bold">Prix : </span> <?= ($annonce['a_price']) ?></p>
                                    <p class="card-text"><span class="fw-bold">Date de publication : </span> <?= ($annonce['a_publication']) ?></p>
                                    <p class="card-text"><span class="fw-bold">Description : </span> <?= ($annonce['a_description']) ?></p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalId<?= ($annonce['a_id'])?>">
                                        Supprimer
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalId<?= ($annonce['a_id'])?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr de vouloir supprimer cette annonce ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Fermer</button>
                                                    <a class="btn btn-outline-dark" href="index.php?url=delete&a_id=<?= ($annonce['a_id']) ?>">Supprimer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Aucune annonce trouvée.</p>
                    <?php endif; ?>

                </div>
            </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>