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
        <div class="container w-25 mt-5 bg-dark-subtle p-5 rounded">
            <form class="row g-3" action="index.php?url=login" method="post">
                <h1>Se connecter</h1>

                <!-- email -->
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <span class="text-danger"><?= $errors['email'] ?? "" ?></span>
                    </div>
                    <input type="email" class="form-control" id="inputEmail4" name="email" value="<?= $_POST['email'] ?? "" ?>">
                </div>

                <!-- mot de passe -->
                <div class="col-12 mb-5">
                    <div class="d-flex justify-content-between">
                        <label for="inputPassword4" class="form-label">Mot de passe</label>
                        <span class="text-danger"><?= $errors['motdepasse'] ?? "" ?></span>
                    </div>
                    <input type="password" class="form-control" id="inputPassword4" name="motdepasse" value="<?= $_POST['motdepasse'] ?? "" ?>">
                </div>

                <div class="col-12 d-flex align-items-center">
                    <button type="submit" class="btn border border-dark">Se connecter</button>
                    <a href="index.php?url=register" class="m-0 ms-3">Pas inscrit ?</a>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>