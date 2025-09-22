<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php require_once __DIR__ . "/../Views/templates/navbar.php" ?>

    <main>

        <h4 class="fs-2 mb-3">annonces</h4>
        <div class="container d-flex justify-content-around flex-wrap mt-5">

            <?php if (!empty($toutesLesAnnonces)) : ?>
                <?php foreach ($toutesLesAnnonces as $annonce) : ?>

                    <div class="card mb-4" style="width: 18rem;">
                        <img src="/uploads/<?= ($annonce['a_picture']) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"> <?= ($annonce['a_title']) ?></p>
                            <p class="card-text"> <?= ($annonce['a_price']) ?></p>
                            <p class="card-text"> <?= ($annonce['a_publication']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Aucune annonce trouvée.</p>
            <?php endif; ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>