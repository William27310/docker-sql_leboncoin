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

        <form class="row g-3 d-flex justify-content-center mt-5" action="index.php?url=register" method="post">

            <div class="card mt-5 mb-5 w-50" style="width: 18rem;">
                <div class="d-flex justify-content-center mt-5 mb-5">
                    <img src="/uploads/<?= $detailsAnnonce['a_picture'] ?>" class="card-img-top w-50 object-fit-contain p-2" alt="...">
                </div>
                <div class="card-body">
                    <span class="fw-bold">Titre : </span>
                    <input value="<?= $detailsAnnonce['a_title'] ?>">
                </div>

                <div class="card-body">
                    <span class="fw-bold">Prix : </span>
                    <input value="<?= $detailsAnnonce['a_price'] ?>">
                </div>


                <div class="card-body">
                    <span class="fw-bold">Description : </span>
                    <input value="<?= $detailsAnnonce['a_description'] ?>">
                </div>

                <div class="d-flex justify-content-between mt-5">
                    <div>
                        <a class="btn btn-outline-dark">Enregistrer</a>
                    </div>
                    <a class="btn btn-outline-dark" href="index.php?url=home">Annuler</a>
                </div>
            </div>
            </div>


    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>